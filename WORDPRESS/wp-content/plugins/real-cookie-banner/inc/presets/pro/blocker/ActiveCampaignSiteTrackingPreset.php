<?php

namespace DevOwl\RealCookieBanner\presets\pro\blocker;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset as PresetsActiveCampaignSiteTrackingPreset;
use DevOwl\RealCookieBanner\presets\AbstractBlockerPreset;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Active Campaign Site Tracking blocker preset.
 */
class ActiveCampaignSiteTrackingPreset extends \DevOwl\RealCookieBanner\presets\AbstractBlockerPreset {
    const IDENTIFIER = \DevOwl\RealCookieBanner\presets\pro\ActiveCampaignSiteTrackingPreset::IDENTIFIER;
    const VERSION = 1;
    // Documented in AbstractPreset
    public function common() {
        $name = 'ActiveCampaign';
        return [
            'id' => self::IDENTIFIER,
            'version' => self::VERSION,
            'description' => 'Site Tracking',
            'name' => $name,
            'attributes' => ['rules' => ['*/diffuser.js*']],
            'logoFile' => \DevOwl\RealCookieBanner\Core::getInstance()->getBaseAssetsUrl('logos/activecampaign.png')
        ];
    }
}
