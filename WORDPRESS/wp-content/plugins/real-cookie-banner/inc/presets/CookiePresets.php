<?php

namespace DevOwl\RealCookieBanner\presets;

use DevOwl\RealCookieBanner\presets\free\GoogleFontsPreset;
use DevOwl\RealCookieBanner\presets\free\JetPackCommentsPreset;
use DevOwl\RealCookieBanner\presets\free\RealCookieBannerPreset;
use DevOwl\RealCookieBanner\presets\free\WordPressCommentsPreset;
use DevOwl\RealCookieBanner\presets\free\WordPressUserLoginPreset;
use DevOwl\RealCookieBanner\presets\free\YoutubePreset;
use DevOwl\RealCookieBanner\presets\free\JetpackSiteStatsPreset;
use DevOwl\RealCookieBanner\presets\free\GravatarPreset;
use DevOwl\RealCookieBanner\presets\free\WordPressEmojisPreset;
use DevOwl\RealCookieBanner\settings\Blocker;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\free\ElementorPreset;
use DevOwl\RealCookieBanner\presets\free\FontAwesomePreset;
use DevOwl\RealCookieBanner\presets\free\WordPressPluginEmbed;
use DevOwl\RealCookieBanner\scanner\ScanPresets;
use DevOwl\RealCookieBanner\view\ConfigPage;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Predefined presets for cookies.
 */
class CookiePresets extends \DevOwl\RealCookieBanner\presets\Presets {
    const CLASSES = [
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::REAL_COOKIE_BANNER =>
            \DevOwl\RealCookieBanner\presets\free\RealCookieBannerPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_USER_LOGIN =>
            \DevOwl\RealCookieBanner\presets\free\WordPressUserLoginPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_COMMENTS =>
            \DevOwl\RealCookieBanner\presets\free\WordPressCommentsPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::JETPACK_COMMENTS =>
            \DevOwl\RealCookieBanner\presets\free\JetPackCommentsPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_FONTS =>
            \DevOwl\RealCookieBanner\presets\free\GoogleFontsPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::YOUTUBE =>
            \DevOwl\RealCookieBanner\presets\free\YoutubePreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::JETPACK_SITE_STATS =>
            \DevOwl\RealCookieBanner\presets\free\JetpackSiteStatsPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GRAVATAR =>
            \DevOwl\RealCookieBanner\presets\free\GravatarPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_EMOJIS =>
            \DevOwl\RealCookieBanner\presets\free\WordPressEmojisPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::ELEMENTOR =>
            \DevOwl\RealCookieBanner\presets\free\ElementorPreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FONTAWESOME =>
            \DevOwl\RealCookieBanner\presets\free\FontAwesomePreset::class,
        \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_PLUGIN_EMBED =>
            \DevOwl\RealCookieBanner\presets\free\WordPressPluginEmbed::class
    ];
    const PRESETS_TYPE = 'cookie';
    /**
     * C'tor.
     */
    public function __construct() {
        parent::__construct(self::PRESETS_TYPE);
    }
    // Documented in Presets
    public function getClassList($force = \false) {
        /**
         * Filters available presets for cookies.
         *
         * @hook RCB/Presets/Cookies
         * @param {string[]} $presets All available presets. `[id => <extends AbstractCookiePreset>::class]`
         * @returns {string[]}
         */
        $list = apply_filters('RCB/Presets/Cookies', self::CLASSES);
        if ($this->needsRecalculation() || $force) {
            $this->persist($this->fromClassList($list));
        }
        return $list;
    }
    // Documented in Presets
    public function persist($items) {
        $persist = parent::persist($items);
        if ($persist) {
            /**
             * Available presets for cookies got persisted.
             *
             * @hook RCB/Presets/Cookies/Persisted
             * @param {array[]} $presets All available presets as array
             * @since 2.6.0
             */
            do_action('RCB/Presets/Cookies/Persisted', $items);
        }
        return $persist;
    }
    // Documented in Presets
    public function getOtherMetaKeys() {
        return ['contentBlockerTemplates', 'extended'];
    }
    // Documented in Presets
    public function expandResult(&$rows) {
        (new \DevOwl\RealCookieBanner\scanner\ScanPresets())->expandResult($rows);
    }
    /**
     * Create a cookie from a cookie preset.
     *
     * @param int $identifier
     * @param int|false $group Pass `false` if you do not want to set the cookie group
     * @param int $updatePostId Do not create the new preset, instead update it
     */
    public function createFromPreset($identifier, $group, $updatePostId = null) {
        $preset = $this->getWithAttributes($identifier);
        if ($preset !== \false) {
            $attributes = $preset['attributes'];
            $name = $attributes['name'];
            $purpose = $attributes['purpose'];
            unset($attributes['name'], $attributes['group'], $attributes['purpose']);
            // Cast some attributes
            foreach ($attributes as $key => $value) {
                switch ($key) {
                    case \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS:
                        $attributes[$key] = wp_slash(\json_encode($value));
                        break;
                    default:
                        break;
                }
            }
            $postarr = [
                'post_title' => $name,
                'post_content' => $purpose,
                'meta_input' => \array_merge(
                    [
                        \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID => $identifier,
                        \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_VERSION => $preset['version']
                    ],
                    $attributes
                )
            ];
            if ($updatePostId !== null) {
                $post = get_post($updatePostId);
                if ($post === null) {
                    return \false;
                }
                $result = wp_update_post(\array_merge(['ID' => $post->ID], $postarr), \true);
            } else {
                $result = wp_insert_post(
                    \array_merge(
                        ['post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME, 'post_status' => 'publish'],
                        $postarr
                    ),
                    \true
                );
                $post = $result;
            }
            if (is_wp_error($result)) {
                return $result;
            }
            return $group === \false
                ? \true
                : wp_set_object_terms($post, $group, \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME);
        }
        return \false;
    }
    // Documented in Presets
    public function fromClassList($clazzes) {
        $result = [];
        $existingCookies = self::getCookiesWithPreset();
        $existingBlockers = \DevOwl\RealCookieBanner\presets\BlockerPresets::getBlockerWithPreset();
        foreach ($clazzes as $id => $clazz) {
            /**
             * Instance.
             *
             * @var AbstractCookiePreset
             */
            $instance = new $clazz();
            $preset = $instance->common();
            $preset['instance'] = $instance;
            if (!isset($preset['tags'])) {
                $preset['tags'] = [];
            }
            $result[$id] = $preset;
        }
        $this->applyMiddleware($existingCookies, $existingBlockers, $result);
        foreach ($result as &$preset) {
            unset($preset['instance']);
        }
        return $result;
    }
    /**
     * See filter `RCB/Presets/Cookies/MiddlewareCallbacks`.
     *
     * @param WP_Post[] $existingCookies
     * @param WP_Post[] $existingBlockers
     * @param array $result
     */
    public function applyMiddleware($existingCookies, $existingBlockers, &$result) {
        /**
         * Inject some middleware directly to the content blocker preset. This can be useful to
         * enhance the preset with functionalities like `extends`.
         *
         * @hook RCB/Presets/Cookies/MiddlewareCallbacks
         * @param {callable[]} $callbacks
         * @returns {callable[]}
         * @since 2.11.1
         */
        $callbacks = apply_filters('RCB/Presets/Cookies/MiddlewareCallbacks', []);
        foreach ($callbacks as $callback) {
            foreach ($result as &$preset) {
                \call_user_func_array($callback, [
                    &$preset,
                    $preset['instance'] ?? null,
                    $existingCookies,
                    $existingBlockers,
                    &$result,
                    $this
                ]);
            }
        }
    }
    /**
     * Get all available cookies with a preset.
     */
    public static function getCookiesWithPreset() {
        return \DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getOrdered(
            null,
            \false,
            get_posts(
                \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                    [
                        'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                        'numberposts' => -1,
                        'nopaging' => \true,
                        'meta_query' => [
                            [
                                'key' => \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID,
                                'compare' => 'EXISTS'
                            ]
                        ],
                        'post_status' => ['publish', 'private', 'draft']
                    ],
                    'cookiesWithPreset'
                )
            )
        );
    }
    /**
     * Get the URL to create a new cookie from a preset identifier.
     *
     * @param string $identifier
     */
    public static function getCreateUrl($identifier) {
        return admin_url(
            \sprintf(
                'admin.php?page=%s#/cookies/%d/new?force=%s',
                \DevOwl\RealCookieBanner\view\ConfigPage::COMPONENT_ID,
                \DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getEssentialGroup()->term_id,
                $identifier
            )
        );
    }
}
