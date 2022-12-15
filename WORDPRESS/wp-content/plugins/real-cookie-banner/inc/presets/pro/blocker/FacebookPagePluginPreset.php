<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset as PresetsFacebookPagePluginPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Page Plugin blocker preset.
 */
class FacebookPagePluginPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\FacebookPagePluginPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Facebook Page Plugin';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => [
                'rules' => \array_merge(
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*facebook.com/plugins/page.php*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*fbcdn.net*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'div[class="fb-page"]',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        // [Plugin Comp] Elementor PRO
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'div[class*="elementor-widget-facebook-page"]',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ]
                    ],
                    \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_SCRIPT
                )
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/facebook.png')
        ];
    }
}
