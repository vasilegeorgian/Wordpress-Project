<?php

namespace DevOwl\RealCookieBanner\presets\middleware;

use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\AbstractCookiePreset;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Middleware to enable `'needs': ['wp-plugin:elementor', 'wp-plugin:elementor-pro']` in cookie and content blocker presets.
 */
class DisablePresetByNeedsMiddleware {
    const WP_PLUGIN_PREFIX = 'wp-plugin:';
    const WP_THEME_PREFIX = 'wp-theme:';
    /**
     * Pass preset metadata with attributes and disable the preset when none of the given plugins is active.
     *
     * @param array $preset
     * @param AbstractCookiePreset|AbstractBlockerPreset $instance
     */
    public function middleware(&$preset, $instance) {
        if (isset($preset['needs']) && !isset($preset['disabled']) && $instance !== null) {
            $type = $instance instanceof \DevOwl\RealCookieBanner\presets\AbstractCookiePreset ? 'cookie' : 'blocker';
            $foundActive = self::check($preset['needs'], $preset['id'], $type);
            $preset['disabled'] = !$foundActive;
            unset($preset['needs']);
        }
        return $preset;
    }
    /**
     * Check by an array of dependencies if one is active.
     *
     * @param string[] $needs
     * @param string $presetIdentifier
     * @param string $type Can be `cookie` or `blocker`
     * @param string $slug Automatically gets filled with the found slug
     */
    public static function check($needs, $presetIdentifier, $type, &$slug = null) {
        foreach ($needs as $dep) {
            if (\DevOwl\RealCookieBanner\Utils::startsWith($dep, self::WP_PLUGIN_PREFIX)) {
                $slug = \substr($dep, \strlen(self::WP_PLUGIN_PREFIX));
                if (\DevOwl\RealCookieBanner\Utils::isPluginActive($slug)) {
                    /**
                     * Allows you to deactivate a false-positive plugin preset.
                     *
                     * Example: Someone has RankMath SEO active, but deactivated the GA function.
                     *
                     * Attention: This filter is only applied for active plugins!
                     *
                     * @hook RCB/Blocker/SkipIfActive
                     * @param {boolean} $isActive
                     * @param {string} $plugin The active plugin (can be slug or file)
                     * @param {string} $identifier The preset identifier
                     * @param {string} $type Can be `cookie` or `blocker`
                     * @return {boolean}
                     * @since 2.6.0
                     */
                    if (apply_filters('RCB/Presets/Active', \true, $slug, $presetIdentifier, $type)) {
                        return \true;
                    }
                }
            } elseif (\DevOwl\RealCookieBanner\Utils::startsWith($dep, self::WP_THEME_PREFIX)) {
                $slug = \substr($dep, \strlen(self::WP_THEME_PREFIX));
                if (\DevOwl\RealCookieBanner\Utils::isThemeActive($slug)) {
                    return \true;
                }
            }
        }
        return \false;
    }
    /**
     * Generate the `needs` keyword for a set of slugs.
     *
     * @param string[] $slugs
     * @param string $type
     */
    public static function generateNeedsForSlugs($slugs, $type = self::WP_PLUGIN_PREFIX) {
        foreach ($slugs as &$slug) {
            $slug = \sprintf('%s%s', $type, $slug);
        }
        return $slugs;
    }
}
