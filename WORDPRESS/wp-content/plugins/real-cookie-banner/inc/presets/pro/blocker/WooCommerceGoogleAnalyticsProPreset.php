<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset as PresetsWooCommerceGoogleAnalyticsProPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * WooCommerce Google Analytics Pro preset -> Google Analytics blocker preset.
 */
class WooCommerceGoogleAnalyticsProPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset::IDENTIFIER;
    const VERSION = \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::VERSION;
    // Documented in AbstractPreset
    public function common() {
        $name = 'WooCommerce Google Analytics Pro';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'description' => 'Universal Analytics',
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalyticsPreset::IDENTIFIER
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl(
                'logos/woocommerce-ga-pro.png'
            ),
            'needs' => \DevOwl\RealCookieBanner\presets\pro\WooCommerceGoogleAnalyticsProPreset::needs()
        ];
    }
}
