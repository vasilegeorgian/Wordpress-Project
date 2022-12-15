<?php

namespace DevOwl\RealCookieBanner\presets;

use DevOwl\RealCookieBanner\base\UtilsProvider;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Presets can depend on multiple factors like multilingual and manager.
 */
abstract class AbstractCookiePreset {
    use UtilsProvider;
    /**
     * Common preset options.
     *
     * @return array
     */
    abstract public function common();
    /**
     * Get all manager-relevant options for no manager.
     *
     * @return array|boolean
     */
    abstract public function managerNone();
    /**
     * Get all manager-relevant options for Google Tag Manager.
     *
     * @return array|boolean
     */
    abstract public function managerGtm();
    /**
     * Get all manager-relevant options for Matomo Tag Manager.
     *
     * @return array|boolean
     */
    abstract public function managerMtm();
}
