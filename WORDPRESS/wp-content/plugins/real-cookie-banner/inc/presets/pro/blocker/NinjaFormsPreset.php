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
 * Ninja Forms with Google reCAPTCHA blocker preset.
 */
class NinjaFormsPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::NINJA_FORMS_RECAPTCHA;
    const SLUG = 'ninja-forms';
    const VERSION = 2;
    // Documented in AbstractPreset
    public function common() {
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => __('Ninja Forms', RCB_TD),
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
                        // Gutenberg
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            'div[class="wp-block-ninja-forms-form"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            'div[class*="nf-form-cont"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    [
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*wp-content/plugins/ninja-forms/assets/js*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    [
                        // All official plugins of Ninja Forms
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::EXPRESSION =>
                            '*wp-content/plugins/ninja-forms-*/*',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ]
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/ninja-forms.png'),
            'needs' => self::needs()
        ];
    }
    // Self-explanatory
    public static function needs() {
        return \DevOwl\RealCookieBanner\presets\middleware\DisablePresetByNeedsMiddleware::generateNeedsForSlugs([
            self::SLUG
        ]);
    }
}
