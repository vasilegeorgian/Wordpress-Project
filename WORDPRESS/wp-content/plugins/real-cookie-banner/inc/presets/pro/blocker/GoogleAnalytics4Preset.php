<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset as PresetsGoogleAnalytics4Preset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics (V4) blocker preset.
 */
class GoogleAnalytics4Preset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\GoogleAnalytics4Preset::IDENTIFIER;
    const VERSION = 1;
    const HOSTS_GROUP_SCRIPT_PROPERTY = [
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION => '"G-*"',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_PROPERTY_ID_NAME
        ],
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION => "'G-*'",
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_PROPERTY_ID_NAME
        ]
    ];
    /**
     * The `/g/collect` route of GA is usually only used with JavaScript, but it could be in HTML, too,
     * due to the fact it can be used with `<noscript`. It resolves both logical must groups as it can
     * be standalone (e.g. PixelYourSite integration).
     */
    const HOSTS_GROUP_COLLECTOR = [
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                '*google-analytics.com/g/collect*',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS => [
                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_SCRIPT_NAME,
                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_PROPERTY_ID_NAME
            ],
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                ['queryArg' => 'tid', 'regexp' => '/^G-/']
            ]
        ]
    ];
    // Documented in AbstractPreset
    public function common() {
        $name = 'Google Analytics';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'description' => 'Analytics 4',
            'attributes' => [
                'rules' => \array_merge(
                    self::HOSTS_GROUP_SCRIPT_PROPERTY,
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'gtag(',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_PROPERTY_ID_NAME
                        ]
                    ],
                    \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_SCRIPT,
                    self::HOSTS_GROUP_COLLECTOR,
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*googletagmanager.com/gtag/js?*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_SCRIPT_NAME,
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                                ['queryArg' => 'id', 'isOptional' => \true, 'regexp' => '/^G-/']
                            ]
                        ]
                    ],
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*googletagmanager.com/gtag/js?*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS => [
                                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_SCRIPT_NAME,
                                \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::HOSTS_GROUP_PROPERTY_ID_NAME
                            ],
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                                ['queryArg' => 'id', 'isOptional' => \false, 'regexp' => '/^G-/']
                            ]
                        ]
                    ]
                )
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/google-analytics.png')
        ];
    }
}
