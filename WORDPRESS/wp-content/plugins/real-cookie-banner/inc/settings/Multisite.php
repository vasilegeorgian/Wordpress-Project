<?php

namespace DevOwl\RealCookieBanner\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\lite\settings\Multisite as LiteMultisite;
use DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideMultisite;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Multisite / Consent Forwarding settings.
 */
class Multisite implements \DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideMultisite {
    use LiteMultisite;
    use UtilsProvider;
    const OPTION_GROUP = 'options';
    const SETTING_CONSENT_FORWARDING = RCB_OPT_PREFIX . '-consent-forwarding';
    const SETTING_FORWARD_TO = RCB_OPT_PREFIX . '-forward-to';
    const SETTING_CROSS_DOMAINS = RCB_OPT_PREFIX . '-cross-domains';
    const DEFAULT_CONSENT_FORWARDING = \false;
    const DEFAULT_FORWARD_TO = '';
    const DEFAULT_CROSS_DOMAINS = '';
    /**
     * Singleton instance.
     *
     * @var Multisite
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
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     * @return Multisite
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\settings\Multisite()) : self::$me;
    }
}
