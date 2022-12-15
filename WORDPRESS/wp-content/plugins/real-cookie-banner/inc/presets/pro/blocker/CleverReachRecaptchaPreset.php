<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * CleverReach with Google reCAPTCHA blocker preset.
 */
class CleverReachRecaptchaPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLEVERREACH_RECAPTCHA;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => __('CleverReach', RCB_TD),
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
                            'form[action*="cleverreach.com"]',
                        \DevOwl\RealCookieBanner\presets\middleware\BlockerHostsOptionsMiddleware::ASSIGNED_TO_GROUPS =>
                            self::IDENTIFIER
                    ],
                    'img[src*="cloudfront.net/cr3_images/badget"]'
                ]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/clever-reach.png')
        ];
    }
}
