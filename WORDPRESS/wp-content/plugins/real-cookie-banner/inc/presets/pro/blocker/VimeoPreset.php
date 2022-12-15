<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\pro\VimeoPreset as ProVimeoPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Vimeo blocker preset.
 */
class VimeoPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\VimeoPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Vimeo';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => [
                'rules' => [
                    '*player.vimeo.com*',
                    '*vimeocdn.com*',
                    '*vimeo.com/showcase*',
                    // [Plugin Comp] Elementor
                    'div[data-settings:matchesUrl()]',
                    // [Plugin Comp] Elementor with https://vimeo.com/\d+ URLs instead of player.vimeo.com
                    'div[data-settings*="vimeo.com"]',
                    // [Plugin Comp] Thrive Architect
                    'div[data-url*="vimeo.com"]',
                    // [Plugin Comp] Premium Addons for Elementor
                    'div[class*="elementor-widget-premium-addon-video-box"][data-settings*="vimeo"]',
                    // [Plugin Comp] tagDiv Composer
                    'div[class*="td_wrapper_playlist_player_vimeo"]',
                    // [Plugin Comp] https://wordpress.org/plugins/wp-video-lightbox/
                    'a[href*="vimeo.com"][rel="wp-video-lightbox"]',
                    // [Plugin Comp] https://github.com/luwes/lite-vimeo-embed
                    'lite-vimeo[videoid]',
                    // [Plugin Comp] https://avada.theme-fusion.com/design-elements/lightbox-element/
                    'a[href*="vimeo.com"][class*="awb-lightbox"]',
                    // [Plugin Comp] https://elementor.com/help/lightbox/
                    'div[data-elementor-lightbox*="vimeo.com"]',
                    // [Plugin Comp] Impreza + WP Bakery
                    'div[class*="w-video"][onclick*="vimeo.com"]'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/vimeo.png')
        ];
    }
}
