<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset as PresetsFacebookPostPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook (Post) blocker preset.
 */
class FacebookPostPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\FacebookPostPreset::IDENTIFIER;
    const VERSION = 2;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Facebook (Post)';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'description' => __('includes videos', RCB_TD),
            'attributes' => [
                'rules' => \array_merge(
                    // [Plugin Comp] Jetpack Facebook Embed
                    ['*/wp-content/plugins/jetpack/_inc/build/facebook-embed*'],
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*facebook.com/plugins/post.php*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\FacebookPixelPreset::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*facebook.com/plugins/video.php*',
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
                                'div[class="fb-post"]',
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
