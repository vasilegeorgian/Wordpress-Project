<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\QuformPreset as PresetsQuformPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Quform with Google reCAPTCHA blocker preset.
 */
class QuformRecaptchaPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\QuformPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Quform';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
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
                            'div[class*="quform-form"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ]
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/quform.png'),
            'needs' => \DevOwl\RealCookieBanner\presets\pro\QuformPreset::needs()
        ];
    }
}
