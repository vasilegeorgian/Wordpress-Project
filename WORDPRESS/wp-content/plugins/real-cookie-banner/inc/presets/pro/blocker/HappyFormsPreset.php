<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
use DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * HappyForms with Google reCAPTCHA blocker preset.
 */
class HappyFormsPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::HAPPYFORMS_RECAPTCHA;
    const SLUG_FREE = 'happyforms';
    const SLUG_PRO = 'happyforms-upgrade';
    const VERSION = 2;
    // Documented in AbstractPreset
    public function common() {
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => __('HappyForms', RCB_TD),
            'description' => __('with Google reCAPTCHA', RCB_TD),
            'attributes' => [
                'rules' => [
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*google.com/recaptcha*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*gstatic.com/recaptcha*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::GOOGLE_RECAPTCHA
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            'div[class*="happyforms-form"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*/wp-content/plugins/happyforms-upgrade/inc/assets/js/frontend*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    // Newer version
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*/wp-content/plugins/happyforms-upgrade/bundles/js/frontend*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*/wp-content/plugins/happyforms/inc/assets/js/frontend*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ]
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/happyforms.png'),
            'needs' => self::needs()
        ];
    }
    // Self-explanatory
    public static function needs() {
        return \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs([
            self::SLUG_FREE,
            self::SLUG_PRO
        ]);
    }
}
