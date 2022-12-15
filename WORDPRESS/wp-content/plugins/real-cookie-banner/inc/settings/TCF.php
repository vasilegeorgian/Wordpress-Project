<?php

namespace DevOwl\RealCookieBanner\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\lite\settings\TCF as LiteTCF;
use DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideTCF;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * TCF settings.
 */
class TCF implements \DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideTCF {
    use LiteTCF;
    use UtilsProvider;
    const OPTION_GROUP = 'options';
    const SETTING_TCF = RCB_OPT_PREFIX . '-tcf';
    const SETTING_TCF_PUBLISHER_CC = RCB_OPT_PREFIX . '-tcf-publisher-cc';
    const SETTING_TCF_ACCEPTED_TIME = RCB_OPT_PREFIX . '-tcf-accepted-time';
    const SETTING_TCF_FIRST_ACCEPTED_TIME = RCB_OPT_PREFIX . '-tcf-first-accepted-time';
    const SETTING_TCF_SCOPE_OF_CONSENT = RCB_OPT_PREFIX . '-tcf-scope-of-consent';
    const SETTING_TCF_GVL_DOWNLOAD_TIME = RCB_OPT_PREFIX . '-tcf-gvl-download-time';
    // This option should not be visible in any REST service, it is only used via `get_option` and `update_option`
    const OPTION_TCF_GVL_NEXT_DOWNLOAD_TIME = RCB_OPT_PREFIX . '-tcf-gvl-next-download-time';
    const DEFAULT_TCF = \false;
    const DEFAULT_TCF_PUBLISHER_CC = '';
    const DEFAULT_TCF_FIRST_ACCEPTED_TIME = '';
    const DEFAULT_TCF_ACCEPTED_TIME = '';
    const DEFAULT_TCF_SCOPE_OF_CONSENT = self::SCOPE_OF_CONSENT_SERVICE;
    const DEFAULT_TCF_GVL_DOWNLOAD_TIME = '';
    const SCOPE_OF_CONSENT_SERVICE = 'service-specific';
    const ALLOWED_SCOPE_OF_CONSENT = [self::SCOPE_OF_CONSENT_SERVICE];
    /**
     * Singleton instance.
     *
     * @var TCF
     */
    private static $me = null;
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Initially `add_option` to avoid autoloading issues.
     */
    public function enableOptionsAutoload() {
        $this->overrideEnableOptionsAutoload();
    }
    /**
     * Register settings.
     */
    public function register() {
        $this->overrideRegister();
    }
    /**
     * When a new version of Real Cookie Banner got installed, automatically download the new GVL.
     */
    public function new_version_installation() {
        // $this->updateGvl(); // Do not use this, as we need to wait for the `init` hook
        update_option(self::OPTION_TCF_GVL_NEXT_DOWNLOAD_TIME, '');
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     * @return TCF
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\settings\TCF()) : self::$me;
    }
}
