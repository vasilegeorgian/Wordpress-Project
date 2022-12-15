<?php

namespace DevOwl\RealCookieBanner\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\settings\General as LiteGeneral;
use DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideGeneral;
use DevOwl\RealCookieBanner\view\customize\banner\Legal;
use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * General settings.
 */
class General implements \DevOwl\RealCookieBanner\overrides\interfce\settings\IOverrideGeneral {
    use LiteGeneral;
    use UtilsProvider;
    const OPTION_GROUP = 'options';
    const SETTING_BANNER_ACTIVE = RCB_OPT_PREFIX . '-banner-active';
    const SETTING_BLOCKER_ACTIVE = RCB_OPT_PREFIX . '-blocker-active';
    const SETTING_IMPRINT_ID = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT;
    const SETTING_IMPRINT_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT_EXTERNAL_URL;
    const SETTING_IMPRINT_IS_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT_IS_EXTERNAL_URL;
    const SETTING_PRIVACY_POLICY_ID = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY;
    const SETTING_PRIVACY_POLICY_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY_EXTERNAL_URL;
    const SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL;
    const SETTING_HIDE_PAGE_IDS = RCB_OPT_PREFIX . '-hide-page-ids';
    const SETTING_SET_COOKIES_VIA_MANAGER = RCB_OPT_PREFIX . '-set-cookies-via-manager';
    const DEFAULT_BANNER_ACTIVE = \false;
    const DEFAULT_BLOCKER_ACTIVE = \true;
    const DEFAULT_IMPRINT_ID = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_IMPRINT;
    const DEFAULT_IMPRINT_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_IMPRINT_EXTERNAL_URL;
    const DEFAULT_IMPRINT_IS_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_IMPRINT_IS_EXTERNAL_URL;
    const DEFAULT_PRIVACY_POLICY_ID = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_PRIVACY_POLICY;
    const DEFAULT_PRIVACY_POLICY_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_PRIVACY_POLICY_EXTERNAL_URL;
    const DEFAULT_PRIVACY_POLICY_IS_EXTERNAL_URL = \DevOwl\RealCookieBanner\view\customize\banner\Legal::DEFAULT_PRIVACY_POLICY_IS_EXTERNAL_URL;
    const DEFAULT_HIDE_PAGE_IDS = '';
    const DEFAULT_SET_COOKIES_VIA_MANAGER = 'none';
    /**
     * Singleton instance.
     *
     * @var General
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
        self::enableOptionAutoload(self::SETTING_BANNER_ACTIVE, self::DEFAULT_BANNER_ACTIVE, 'boolval');
        self::enableOptionAutoload(self::SETTING_BLOCKER_ACTIVE, self::DEFAULT_BLOCKER_ACTIVE, 'boolval');
        self::enableOptionAutoload(self::SETTING_IMPRINT_ID, self::DEFAULT_IMPRINT_ID, 'intval');
        self::enableOptionAutoload(self::SETTING_IMPRINT_EXTERNAL_URL, self::DEFAULT_IMPRINT_EXTERNAL_URL);
        self::enableOptionAutoload(
            self::SETTING_IMPRINT_IS_EXTERNAL_URL,
            self::DEFAULT_IMPRINT_IS_EXTERNAL_URL,
            'boolval'
        );
        self::enableOptionAutoload(self::SETTING_PRIVACY_POLICY_ID, $this->getDefaultPrivacyPolicy(), 'intval');
        self::enableOptionAutoload(
            self::SETTING_PRIVACY_POLICY_EXTERNAL_URL,
            self::DEFAULT_PRIVACY_POLICY_EXTERNAL_URL
        );
        self::enableOptionAutoload(
            self::SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL,
            self::DEFAULT_PRIVACY_POLICY_IS_EXTERNAL_URL,
            'boolval'
        );
        $this->overrideEnableOptionsAutoload();
    }
    /**
     * Register settings.
     */
    public function register() {
        register_setting(self::OPTION_GROUP, self::SETTING_BANNER_ACTIVE, [
            'type' => 'boolean',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_BLOCKER_ACTIVE, [
            'type' => 'boolean',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_IMPRINT_ID, ['type' => 'number', 'show_in_rest' => \true]);
        register_setting(self::OPTION_GROUP, self::SETTING_IMPRINT_EXTERNAL_URL, [
            'type' => 'string',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_IMPRINT_IS_EXTERNAL_URL, [
            'type' => 'boolean',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_PRIVACY_POLICY_ID, [
            'type' => 'number',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_PRIVACY_POLICY_EXTERNAL_URL, [
            'type' => 'string',
            'show_in_rest' => \true
        ]);
        register_setting(self::OPTION_GROUP, self::SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL, [
            'type' => 'boolean',
            'show_in_rest' => \true
        ]);
        $this->overrideRegister();
    }
    /**
     * Is the banner active?
     *
     * @return boolean
     */
    public function isBannerActive() {
        return get_option(self::SETTING_BANNER_ACTIVE);
    }
    /**
     * Is the content blocker active?
     *
     * @return boolean
     */
    public function isBlockerActive() {
        return get_option(self::SETTING_BLOCKER_ACTIVE);
    }
    /**
     * Get the imprint page URL.
     *
     * @param mixed $default
     * @return string
     */
    public function getImprintPageUrl($default = \false) {
        $imprintIsExternalUrl = get_option(self::SETTING_IMPRINT_IS_EXTERNAL_URL);
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        if ($imprintIsExternalUrl) {
            $imprintExternalUrl = get_option(self::SETTING_IMPRINT_EXTERNAL_URL);
            if (!empty($imprintExternalUrl)) {
                return $imprintExternalUrl;
            }
        } else {
            $id = get_option(self::SETTING_IMPRINT_ID);
            if ($id > 0) {
                $id = $compLanguage->getCurrentPostId($id, 'page');
                $permalink = \DevOwl\RealCookieBanner\Utils::getPermalink($id);
                if ($permalink !== \false) {
                    return $permalink;
                }
            }
        }
        return $default;
    }
    /**
     * Get the privacy policy page URL.
     *
     * @param mixed $default
     * @return string
     */
    public function getPrivacyPolicyUrl($default = \false) {
        $privacyPolicyIsExternalUrl = get_option(self::SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL);
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        if ($privacyPolicyIsExternalUrl) {
            $privacyPolicyExternalUrl = get_option(self::SETTING_PRIVACY_POLICY_EXTERNAL_URL);
            if (!empty($privacyPolicyExternalUrl)) {
                return $privacyPolicyExternalUrl;
            }
        } else {
            $id = get_option(self::SETTING_PRIVACY_POLICY_ID, $this->getDefaultPrivacyPolicy());
            if ($id > 0) {
                $id = $compLanguage->getCurrentPostId($id, 'page');
                $permalink = \DevOwl\RealCookieBanner\Utils::getPermalink($id);
                if ($permalink !== \false) {
                    return $permalink;
                }
            }
        }
        return $default;
    }
    /**
     * Get default privacy policy post ID.
     */
    public function getDefaultPrivacyPolicy() {
        $privacyPolicy = \intval(get_option('wp_page_for_privacy_policy', self::DEFAULT_PRIVACY_POLICY_ID));
        return \in_array(get_post_status($privacyPolicy), ['draft', 'publish'], \true)
            ? $privacyPolicy
            : self::DEFAULT_PRIVACY_POLICY_ID;
    }
    /**
     * Return a map of `post_id` to permalink URL for imprint and privacy policy.
     */
    public function getPermalinkMap() {
        $result = [];
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        $imprintId = get_option(self::SETTING_IMPRINT_ID);
        $imprintIsExternalUrl = get_option(self::SETTING_IMPRINT_IS_EXTERNAL_URL);
        if ($imprintId > 0 && !$imprintIsExternalUrl) {
            $imprintId = $compLanguage->getCurrentPostId($imprintId, 'page');
            $result[$imprintId] = $this->getImprintPageUrl();
        }
        $privacyPolicyId = get_option(self::SETTING_PRIVACY_POLICY_ID);
        $privacyPolicyIsExternalUrl = get_option(self::SETTING_PRIVACY_POLICY_IS_EXTERNAL_URL);
        if ($privacyPolicyId > 0 && !$privacyPolicyIsExternalUrl) {
            $privacyPolicyId = $compLanguage->getCurrentPostId($privacyPolicyId, 'page');
            $result[$privacyPolicyId] = $this->getPrivacyPolicyUrl();
        }
        return $result;
    }
    /**
     * When a page gets deleted, check if the value is our configured imprint or privacy policy
     * page and reset the value accordingly.
     *
     * @param number $postId
     */
    public function delete_post_imprint_privacy_policy($postId) {
        $imprintId = get_option(self::SETTING_IMPRINT_ID);
        $privacyPolicyId = get_option(self::SETTING_PRIVACY_POLICY_ID);
        if ($postId === $imprintId) {
            update_option(self::SETTING_IMPRINT_ID, self::DEFAULT_IMPRINT_ID);
        }
        if ($postId === $privacyPolicyId) {
            update_option(self::SETTING_PRIVACY_POLICY_ID, self::DEFAULT_PRIVACY_POLICY_ID);
        }
    }
    /**
     * When Settings > Privacy got adjusted, apply the new privacy policy to the cookie settings, too.
     *
     * @param int $old_value
     * @param int $new_value
     */
    public function update_option_wp_page_for_privacy_policy($old_value, $new_value) {
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        if ($compLanguage !== null) {
            $new_value = $compLanguage->getOriginalPostId($new_value, 'page');
        }
        if (get_post_status($new_value) === 'publish') {
            update_option(self::SETTING_PRIVACY_POLICY_ID, $new_value);
        }
    }
    /**
     * When the privacy policy page gets adjusted, let's update the Real Cookie Banner services
     * including the WPML/PolyLang translations.
     *
     * @param int $old_value
     * @param int $new_value
     */
    public function update_option_privacy_policy($old_value, $new_value) {
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        $fnUpdate = function () use ($compLanguage, $new_value) {
            $realCookieBannerService = \DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getServiceByIdentifier(
                \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::REAL_COOKIE_BANNER
            );
            if ($realCookieBannerService !== null) {
                $rcbServiceId = $realCookieBannerService->ID;
                $oldPrivacyPolicy = get_post_meta(
                    $rcbServiceId,
                    \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL,
                    \true
                );
                $postId = $new_value;
                if ($compLanguage !== null) {
                    $postId = $compLanguage->getCurrentPostId($postId, 'page');
                }
                $permalink = \DevOwl\RealCookieBanner\Utils::getPermalink($postId);
                if (!empty($permalink)) {
                    update_post_meta(
                        $rcbServiceId,
                        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL,
                        $permalink
                    );
                    // Search for all other local services like "WordPress Comments"
                    if (!empty($oldPrivacyPolicy)) {
                        $postsWithOldPrivacyPolicy = get_posts(
                            \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                                [
                                    'lang' => 'all',
                                    'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                                    'numberposts' => -1,
                                    'fields' => 'ids',
                                    'nopaging' => \true,
                                    'meta_query' => [
                                        [
                                            'key' =>
                                                \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL,
                                            'value' => $oldPrivacyPolicy,
                                            'compare' => '='
                                        ]
                                    ],
                                    'post_status' => ['publish', 'private', 'draft']
                                ],
                                'General::update_option_privacy_policy'
                            )
                        );
                        foreach ($postsWithOldPrivacyPolicy as $postWithOldPrivacyPolicy) {
                            update_post_meta(
                                $postWithOldPrivacyPolicy,
                                \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL,
                                $permalink
                            );
                        }
                    }
                }
            }
        };
        if ($compLanguage !== null && $compLanguage->isActive()) {
            $compLanguage->iterateAllLanguagesContext($fnUpdate);
        } else {
            $fnUpdate();
        }
    }
    /**
     * Get singleton instance.
     *
     * @return General
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\settings\General()) : self::$me;
    }
    /**
     * Add an option to autoloading and also with default.
     *
     * @param string $optionName
     * @param mixed $default
     * @param callable $filter
     */
    public static function enableOptionAutoload($optionName, $default, $filter = null) {
        // Avoid overwriting and read current
        $currentValue = get_option($optionName, $default);
        $newValue = $filter === null ? $currentValue : \call_user_func($filter, $currentValue);
        add_option($optionName, $newValue);
        if ($filter !== null) {
            add_filter('option_' . $optionName, $filter);
        }
    }
}
