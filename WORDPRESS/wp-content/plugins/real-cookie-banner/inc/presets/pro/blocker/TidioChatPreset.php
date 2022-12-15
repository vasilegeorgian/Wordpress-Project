<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\TidioChatPreset as PresetsTidioChatPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Tidio Chat blocker preset.
 */
class TidioChatPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\TidioChatPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Tidio (Chat)';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'attributes' => ['rules' => ['tidioChatCode', '*code.tidio.co*']],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/tidio.png')
        ];
    }
}
