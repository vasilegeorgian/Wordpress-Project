<?php

namespace DevOwl\RealCookieBanner\import;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\view\customize\banner\BasicLayout;
use DevOwl\RealCookieBanner\view\customize\banner\Decision;
use DevOwl\RealCookieBanner\view\customize\banner\FooterDesign;
use DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign;
use DevOwl\RealCookieBanner\view\customize\banner\Legal;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Trait to handle the importer for customize banner in the `Import` class.
 */
trait ImportCustomizeBanner {
    /**
     * Import customize banner settings from JSON.
     *
     * @param array $sections
     */
    protected function doImportCustomizeBanner($sections) {
        $ids = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBanner()
            ->getCustomize()
            ->localizeIds()['customizeIdsBanner']['settings'];
        $availableSections = \array_keys($ids);
        foreach ($sections as $section => $settings) {
            if (!\is_array($settings)) {
                $this->addMessageWrongUsageKey($section);
                continue;
            }
            if (\in_array($section, $availableSections, \true)) {
                $availableSettings = \array_keys($ids[$section]);
                foreach ($settings as $key => $value) {
                    if (\in_array($key, $availableSettings, \true)) {
                        $optionName = $ids[$section][$key];
                        // Skip already persistent options with the same value
                        // phpcs:disable WordPress.PHP.StrictComparisons
                        if (get_option($optionName) == $value) {
                            continue;
                        }
                        // phpcs:enable WordPress.PHP.StrictComparisons
                        // Check for special cases and abort it
                        if (!$this->handleSepcialCustomizeBanner($optionName, $section, $key, $value)) {
                            continue;
                        }
                        // Handle update
                        if (!update_option($optionName, $value)) {
                            $this->addMessageUpdateOptionFailure($optionName);
                        }
                    } else {
                        $this->addMessageOptionOutdated($section . '.' . $key);
                    }
                }
            } else {
                $this->addMessageOptionOutdated($section);
            }
        }
    }
    /**
     * Handle special cases for customize banner settings.
     *
     * @param string $optionName
     * @param string $section
     * @param mixed $setting
     * @param string $value
     */
    protected function handleSepcialCustomizeBanner($optionName, $section, $setting, $value) {
        $onlyPro = \false;
        switch ($optionName) {
            case \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT:
            case \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY:
                if ($value > 0 || !empty($value)) {
                    $this->addMessageOptionRelatesPageId(
                        $optionName === \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY
                            ? __('Privacy policy page', RCB_TD)
                            : __('Imprint page', RCB_TD),
                        $section . '.' . $setting
                    );
                    break;
                }
                return \true;
            case \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign::SETTING_LOGO:
            case \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign::SETTING_LOGO_RETINA:
                if (!empty($value)) {
                    $this->addMessageOptionRelatesMedia(
                        $optionName === \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign::SETTING_LOGO
                            ? __('Logo', RCB_TD)
                            : __('Logo (Retina)', RCB_TD),
                        $section . '.' . $setting
                    );
                    break;
                }
                return \true;
            case \DevOwl\RealCookieBanner\view\customize\banner\FooterDesign::SETTING_POWERED_BY_LINK:
                if (!$this->isPro() && !$value) {
                    $onlyPro = \true;
                    break;
                }
                return \true;
            case \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_OVERLAY_BLUR:
                if (!$this->isPro() && $value > 0) {
                    $onlyPro = \true;
                    break;
                }
                return \true;
            case \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_GROUPS_FIRST_VIEW:
                if (!$this->isPro() && $value === \true) {
                    $onlyPro = \true;
                    break;
                }
                return \true;
            default:
                return \true;
        }
        $this->probablyAddMessageSettingOnlyPro($onlyPro, $section . '.' . $setting);
        return \false;
    }
}
