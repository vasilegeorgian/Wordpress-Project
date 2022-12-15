<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset as PresetsFacebookPixelPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Facebook Pixel blocker preset.
 */
class FacebookPixelPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\FacebookPixelPreset::IDENTIFIER;
    const VERSION = 1;
    const HOSTS_GROUP_SDK_FUNCTION_NAME = 'sdk-function';
    const HOSTS_GROUP_SDK_SCRIPT = ['*connect.facebook.net*'];
    // Documented in AbstractPreset
    public function common() {
        $name = 'Facebook Pixel';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => [
                'rules' => \array_merge(
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'fbq(\'',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'fbq("',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        // <noscript> <img> tag
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'img[alt="fbpx"]',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'img[alt="facebook_pixel"]',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SDK_FUNCTION_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*facebook.com/tr*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SDK_FUNCTION_NAME,
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                                ['queryArg' => 'noscript', 'regexp' => '/^1$/']
                            ]
                        ]
                    ],
                    self::HOSTS_GROUP_SDK_SCRIPT
                )
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/facebook.png')
        ];
    }
}
