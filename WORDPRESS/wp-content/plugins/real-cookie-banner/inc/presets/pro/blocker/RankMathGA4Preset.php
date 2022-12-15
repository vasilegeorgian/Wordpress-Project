<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset as PresetsRankMathGA4Preset;
use DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset as PresetsRankMathGAPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * RankMath Google Analytics preset -> Google Analytics blocker preset.
 */
class RankMathGA4Preset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::IDENTIFIER;
    const VERSION = \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalytics4Preset::VERSION;
    // Documented in AbstractPreset
    public function common() {
        $name = 'RankMath Google Analytics';
        $extendsAttributes = (new \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalytics4Preset())->common();
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'description' => $extendsAttributes['description'],
            'attributes' => [
                'extends' => \DevOwl\RealCookieBanner\presets\pro\blocker\GoogleAnalytics4Preset::IDENTIFIER
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/rank-math.png'),
            'needs' => \DevOwl\RealCookieBanner\presets\pro\RankMathGAPreset::needs()
        ];
    }
}
