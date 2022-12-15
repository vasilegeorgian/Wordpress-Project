<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
use DevOwl\RealCookieBanner\presets\pro\ReamazeChatPreset as ProReamazeChatPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Reamaze Chat blocker preset.
 */
class ReamazeChatPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\ReamazeChatPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'Reamaze (Chat)';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'name' => $name,
            'hidden' => \true,
            'attributes' => [
                'rules' => ['*reamaze.js*', '_support = _support', '_support=_support'],
                'serviceTemplates' => [\DevOwl\RealCookieBanner\presets\pro\ReamazeChatPreset::IDENTIFIER]
            ],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/reamaze.png')
        ];
    }
}
