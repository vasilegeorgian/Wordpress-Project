<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\presets\pro\KlikenPreset as ProKlikenPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Kliken blocker preset.
 */
class KlikenPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::KLIKEN;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => 'Kliken',
            'description' => 'Google Ads & Marketing',
            'attributes' => ['rules' => ['*analytics.sitewit.com*']],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/kliken.png'),
            'needs' => \DevOwl\RealCookieBanner\presets\pro\KlikenPreset::needs()
        ];
    }
}
