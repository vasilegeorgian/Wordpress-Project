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
 * Form Maker with Google reCAPTCHA blocker preset.
 */
class FormMakerRecaptchaPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::FORM_MAKER_RECAPTCHA;
    const SLUG = 'form-maker';
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => __('Form Maker', RCB_TD),
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
                            'div[class*="fm-form-container"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    '*wp-content/plugins/form-maker/js/*',
                    '*wp-content/uploads/form-maker-frontend/js/*'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/form-maker.png'),
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
