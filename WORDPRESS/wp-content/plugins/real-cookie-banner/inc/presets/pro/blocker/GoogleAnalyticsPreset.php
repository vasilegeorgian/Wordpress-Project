<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset as PresetsGoogleAnalyticsPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Google Analytics (Universal Analytics) blocker preset.
 */
class GoogleAnalyticsPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\GoogleAnalyticsPreset::IDENTIFIER;
    const VERSION = 1;
    const HOSTS_GROUP_PROPERTY_ID_NAME = 'property-id';
    const HOSTS_GROUP_SCRIPT_NAME = 'script';
    const HOSTS_GROUP_SCRIPT = [
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                '*google-analytics.com/analytics.js*',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                self::HOSTS_GROUP_SCRIPT_NAME
        ],
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                '*google-analytics.com/ga.js*',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                self::HOSTS_GROUP_SCRIPT_NAME
        ],
        // Comp: RankMath
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                'script[id="google_gtagjs"]',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                self::HOSTS_GROUP_SCRIPT_NAME
        ]
    ];
    const HOSTS_GROUP_SCRIPT_PROPERTY = [
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION => '"UA-*"',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                self::HOSTS_GROUP_PROPERTY_ID_NAME
        ],
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION => "'UA-*'",
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                self::HOSTS_GROUP_PROPERTY_ID_NAME
        ]
    ];
    /**
     * The `/collect` route of GA is usually only used with JavaScript, but it could be in HTML, too,
     * due to the fact it can be used with `<noscript`. It resolves both logical must groups as it can
     * be standalone (e.g. PixelYourSite integration).
     */
    const HOSTS_GROUP_COLLECTOR = [
        [
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                '*google-analytics.com/collect*',
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS => [
                self::HOSTS_GROUP_SCRIPT_NAME,
                self::HOSTS_GROUP_PROPERTY_ID_NAME
            ],
            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                ['queryArg' => 'tid', 'regexp' => '/^UA-/']
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
            'description' => 'Universal Analytics',
            'attributes' => [
                'rules' => \array_merge(
                    self::HOSTS_GROUP_SCRIPT_PROPERTY,
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'ga(',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_PROPERTY_ID_NAME
                        ],
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                'gtag(',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_PROPERTY_ID_NAME
                        ]
                    ],
                    self::HOSTS_GROUP_SCRIPT,
                    self::HOSTS_GROUP_COLLECTOR,
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*googletagmanager.com/gtag/js?*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                                self::HOSTS_GROUP_SCRIPT_NAME,
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                                ['queryArg' => 'id', 'isOptional' => \true, 'regexp' => '/^UA-/']
                            ]
                        ]
                    ],
                    [
                        [
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                                '*googletagmanager.com/gtag/js?*',
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS => [
                                self::HOSTS_GROUP_SCRIPT_NAME,
                                self::HOSTS_GROUP_PROPERTY_ID_NAME
                            ],
                            \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::QUERY_ARGS => [
                                ['queryArg' => 'id', 'isOptional' => \false, 'regexp' => '/^UA-/']
                            ]
                        ]
                    ]
                )
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/google-analytics.png')
        ];
    }
}
