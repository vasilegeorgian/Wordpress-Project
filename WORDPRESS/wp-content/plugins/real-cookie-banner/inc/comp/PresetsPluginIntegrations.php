<?php

namespace DevOwl\RealCookieBanner\comp;

use DevOwl\RealCookieBanner\presets\PresetIdentifierMap;
use DevOwl\RealCookieBanner\Utils;
use Jetpack;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Provide native integrations to known plugins which are associated to a preset.
 *
 * Example: RankMath SEO: Deactivate Analytics preset when the "Install code" option is activated.
 */
class PresetsPluginIntegrations {
    const SLUG_RANKMATH_SEO_PRO = 'seo-by-rank-math-pro';
    const SLUG_RANKMATH_SEO_FREE = 'seo-by-rank-math';
    const SLUG_ANALYTIFY_PRO = 'wp-analytify-pro';
    const SLUG_ANALYTIFY_FREE = 'wp-analytify';
    const SLUG_EXACTMETRICS_PRO_LEGACY = 'google-analytics-dashboard-for-wp-premium';
    const SLUG_EXACTMETRICS_PRO = 'exactmetrics-premium';
    const SLUG_EXACTMETRICS_FREE = 'google-analytics-dashboard-for-wp';
    const SLUG_MONSTERINSIGHTS_PRO = 'google-analytics-premium';
    const SLUG_MONSTERINSIGHTS_FREE = 'google-analytics-for-wordpress';
    const SLUG_GA_GOOGLE_ANALYTICS_PRO = 'ga-google-analytics-pro';
    const SLUG_GA_GOOGLE_ANALYTICS_FREE = 'ga-google-analytics';
    const SLUG_WOOCOMMERCE_GOOGLE_ANALYTICS_FREE = 'woocommerce-google-analytics-integration';
    const SLUG_WP_PIWIK = 'wp-piwik';
    const SLUG_MATOMO_PLUGIN = 'matomo';
    const SLUG_PERFMATTERS = 'perfmatters';
    const SLUG_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO = 'woocommerce-google-analytics-pro';
    const OPTION_NAME_USERS_CAN_REGISTER = 'users_can_register';
    const OPTION_NAME_RANK_MATH_GA = 'rank_math_google_analytic_options';
    const OPTION_NAME_ANALYTIFY_AUTHENTICATION = 'wp-analytify-authentication';
    const OPTION_NAME_ANALYTIFY_PROFILE = 'wp-analytify-profile';
    const OPTION_NAME_ANALYTIFY_GOOGLE_TOKEN = 'pa_google_token';
    const OPTION_NAME_EXACTMETRICS_SITE_PROFILE = 'exactmetrics_site_profile';
    const OPTION_NAME_MONSTERINSIGHTS_SITE_PROFILE = 'monsterinsights_site_profile';
    const OPTION_NAME_GA_GOOGLE_ANALYTICS = 'gap_options';
    const OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS = 'woocommerce_google_analytics_settings';
    const OPTION_NAME_WP_PIWIK = 'wp-piwik_global-track_mode';
    const OPTION_NAME_MATOMO_PLUGIN = 'matomo-global-option';
    const OPTION_NAME_PERFMATTERS_GA = 'perfmatters_options';
    const OPTION_NAME_JETPACK_SITE_STATS = 'stats_options';
    const OPTION_NAME_WOOCOMMERCE_GEOLOCATION = 'woocommerce_default_customer_address';
    // Currently, geo-location is only used for custom address
    const OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_ACCOUNT_ID = 'wc_google_analytics_pro_account_id';
    const OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_SETTINGS = 'woocommerce_google_analytics_pro_settings';
    // Network options
    const OPTION_NAME_EXACTMETRICS_NETWORK_PROFIL = 'exactmetrics_network_profile';
    const OPTION_NAME_MONSTERINSIGHTS_NETWORK_PROFIL = 'monsterinsights_network_profile';
    const INVALIDATE_WHEN_OPTION_CHANGES = [
        self::OPTION_NAME_USERS_CAN_REGISTER,
        self::OPTION_NAME_RANK_MATH_GA,
        self::OPTION_NAME_ANALYTIFY_AUTHENTICATION,
        self::OPTION_NAME_ANALYTIFY_PROFILE,
        self::OPTION_NAME_ANALYTIFY_GOOGLE_TOKEN,
        self::OPTION_NAME_EXACTMETRICS_SITE_PROFILE,
        self::OPTION_NAME_MONSTERINSIGHTS_SITE_PROFILE,
        self::OPTION_NAME_GA_GOOGLE_ANALYTICS,
        self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS,
        self::OPTION_NAME_WP_PIWIK,
        self::OPTION_NAME_MATOMO_PLUGIN,
        self::OPTION_NAME_PERFMATTERS_GA,
        self::OPTION_NAME_JETPACK_SITE_STATS,
        self::OPTION_NAME_WOOCOMMERCE_GEOLOCATION,
        self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_ACCOUNT_ID,
        self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_SETTINGS
    ];
    const INVALIDATE_WHEN_SITE_OPTION_CHANGES = [
        self::OPTION_NAME_EXACTMETRICS_NETWORK_PROFIL,
        self::OPTION_NAME_MONSTERINSIGHTS_NETWORK_PROFIL
    ];
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    protected function __construct() {
        // Silence is golden.
    }
    /**
     * Initialize update hooks. Do this at the earliest `init` action with `priority=0` as other plugins could
     * read options already in `init` action.
     */
    public function init() {
        $callback = 'wp_rcb_invalidate_presets_cache';
        foreach (self::INVALIDATE_WHEN_OPTION_CHANGES as $optionName) {
            add_action('update_option_' . $optionName, $callback);
            add_action('add_option_' . $optionName, $callback);
            add_action('delete_option_' . $optionName, $callback);
        }
        foreach (self::INVALIDATE_WHEN_SITE_OPTION_CHANGES as $optionName) {
            add_action('update_site_option_' . $optionName, $callback);
            add_action('add_site_option_' . $optionName, $callback);
            add_action('delete_site_option_' . $optionName, $callback);
        }
        $this->serverSideConsentInjection();
    }
    /**
     * Server-side inject into plugins via filters and check for consent.
     */
    protected function serverSideConsentInjection() {
        if (!is_admin()) {
            add_filter('option_' . self::OPTION_NAME_WOOCOMMERCE_GEOLOCATION, [
                $this,
                'serverSideConsentInjection_option_woocommerce_default_customer_address'
            ]);
            add_filter('mailchimp_allowed_to_use_cookie', function ($cookieName) {
                return wp_rcb_consent_given('http', $cookieName, '*')['cookieOptIn'];
            });
            // Facebook for WordPress (CAPI)
            add_filter('before_conversions_api_event_sent', function ($events) {
                return wp_rcb_consent_given(
                    'http',
                    '_fbp',
                    \DevOwl\RealCookieBanner\Utils::host(
                        \DevOwl\RealCookieBanner\Utils::HOST_TYPE_MAIN_WITH_ALL_SUBDOMAINS
                    )
                )['cookieOptIn']
                    ? $events
                    : [];
            });
        }
    }
    /**
     * See `serverSideConsentInjection`.
     *
     * @param string $set_default_location_to
     */
    public function serverSideConsentInjection_option_woocommerce_default_customer_address($set_default_location_to) {
        if (
            \in_array($set_default_location_to, ['geolocation', 'geolocation_ajax'], \true) &&
            wp_rcb_consent_given('http', 'woocommerce_geo_hash', '*')['cookieOptIn'] === \false
        ) {
            return 'base';
        }
        return $set_default_location_to;
    }
    /**
     * Automatically set the `recommended` attribute to `true` for some special cases.
     *
     * @param array $preset
     */
    public function middleware_cookies_recommended(&$preset) {
        switch ($preset['id']) {
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WORDPRESS_USER_LOGIN:
                $preset['recommended'] = get_option(self::OPTION_NAME_USERS_CAN_REGISTER) > 0;
                break;
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::CLOUDFLARE:
                $preset['recommended'] =
                    isset($_SERVER['HTTP_CF_CONNECTING_IP']) && !empty($_SERVER['HTTP_CF_CONNECTING_IP']);
                break;
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_ESSENTIAL:
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_MARKETING:
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_PREFERENCES:
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EZOIC_STATISTIC:
                $preset['recommended'] = isset($header['x-middleton']);
                break;
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::JETPACK_SITE_STATS:
                if (\class_exists(\Jetpack::class) && \method_exists(\Jetpack::class, 'is_module_active')) {
                    $preset['recommended'] = \Jetpack::is_module_active('stats');
                }
                break;
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::WOOCOMMERCE_GEOLOCATION:
                remove_filter('option_' . self::OPTION_NAME_WOOCOMMERCE_GEOLOCATION, [
                    $this,
                    'serverSideConsentInjection_option_woocommerce_default_customer_address'
                ]);
                $preset['recommended'] = \in_array(
                    get_option(self::OPTION_NAME_WOOCOMMERCE_GEOLOCATION),
                    ['geolocation', 'geolocation_ajax'],
                    \true
                );
                add_filter('option_' . self::OPTION_NAME_WOOCOMMERCE_GEOLOCATION, [
                    $this,
                    'serverSideConsentInjection_option_woocommerce_default_customer_address'
                ]);
                break;
            /**
             * MonsterInsights and ExactMetrics are merging the `gtag('config', 'G|UA-)` directive
             * in JavaScript into one inline script, but are using only one `googletagmanager.com/gtag/js?id=UA`
             * script => our scanner could not reliable detect, which service is really used. E.g. using both
             * in MonsterInsights leads to only one found service (UA).
             *
             * @see https://i.imgur.com/Vr3AqB5.png
             */
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::MONSTERINSIGHTS_4:
                if (\function_exists('monsterinsights_get_v4_id') && !empty(monsterinsights_get_v4_id())) {
                    $preset['recommended'] = \true;
                }
                break;
            case \DevOwl\RealCookieBanner\presets\PresetIdentifierMap::EXACT_METRICS_4:
                if (\function_exists('exactmetrics_get_v4_id') && !empty(exactmetrics_get_v4_id())) {
                    $preset['recommended'] = \true;
                }
                break;
            default:
                break;
        }
        /**
         * Show a cookie service template in the scanner, or hide it depending on a given condition.
         *
         * @hook RCB/Presets/Cookies/Recommended
         * @param {boolean} $recommended
         * @param {array} $preset The preset passed as reference
         * @returns {callable[]}
         * @since 2.11.1
         */
        $preset['recommended'] = apply_filters(
            'RCB/Presets/Cookies/Recommended',
            $preset['recommended'] ?? \false,
            $preset
        );
        return $preset;
    }
    /**
     * Automatically set the `recommended` attribute to `true` for some special cases.
     *
     * @param array $preset
     */
    public function middleware_blocker_recommended(&$preset) {
        switch ($preset['id']) {
            // Paste your exceptions here
            default:
                break;
        }
        /**
         * Show a content blocker template in the scanner, or hide it depending on a given condition.
         *
         * @hook RCB/Presets/Blocker/Recommended
         * @param {boolean} $recommended
         * @param {array} $preset The preset passed as reference
         * @returns {callable[]}
         * @since 2.11.1
         */
        $preset['recommended'] = apply_filters(
            'RCB/Presets/Blocker/Recommended',
            $preset['recommended'] ?? \false,
            $preset
        );
        return $preset;
    }
    /**
     * Check multiple plugins for native integration.
     *
     * @param boolean $isActive
     * @param string $plugin
     * @param string $identifier
     * @param string $type
     */
    public function presets_active($isActive, $plugin, $identifier, $type) {
        switch ($plugin) {
            case self::SLUG_RANKMATH_SEO_PRO:
            case self::SLUG_RANKMATH_SEO_FREE:
                $option = get_option(self::OPTION_NAME_RANK_MATH_GA);
                return \is_array($option) && isset($option['install_code']) && $option['install_code'];
            case self::SLUG_ANALYTIFY_PRO:
            case self::SLUG_ANALYTIFY_FREE:
                $googleToken = get_option(self::OPTION_NAME_ANALYTIFY_GOOGLE_TOKEN);
                $auth = get_option(self::OPTION_NAME_ANALYTIFY_AUTHENTICATION);
                if (!empty($googleToken)) {
                    $profile = get_option(self::OPTION_NAME_ANALYTIFY_PROFILE);
                    return \is_array($profile) &&
                        isset($profile['install_ga_code']) &&
                        $profile['install_ga_code'] === 'on';
                }
                return \is_array($auth) && isset($auth['manual_ua_code']) && !empty($auth['manual_ua_code']);
            case self::SLUG_EXACTMETRICS_PRO_LEGACY:
            case self::SLUG_EXACTMETRICS_PRO:
            case self::SLUG_EXACTMETRICS_FREE:
                return (\function_exists('exactmetrics_get_ua') && !empty(exactmetrics_get_ua())) ||
                    (\function_exists('exactmetrics_get_v4_id') && !empty(exactmetrics_get_v4_id()));
            case self::SLUG_MONSTERINSIGHTS_PRO:
            case self::SLUG_MONSTERINSIGHTS_FREE:
                return (\function_exists('monsterinsights_get_ua') && !empty(monsterinsights_get_ua())) ||
                    (\function_exists('monsterinsights_get_v4_id') && !empty(monsterinsights_get_v4_id()));
            case self::SLUG_GA_GOOGLE_ANALYTICS_PRO:
            case self::SLUG_GA_GOOGLE_ANALYTICS_FREE:
                if (!\function_exists('ga_google_analytics_options')) {
                    return \false;
                }
                $option = ga_google_analytics_options();
                return \is_array($option) && isset($option['tracking_id']) && !empty($option['tracking_id']);
            case self::SLUG_WOOCOMMERCE_GOOGLE_ANALYTICS_FREE:
                $option = get_option(self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS);
                if (!\is_array($option)) {
                    return \false;
                }
                return isset($option['ga_id'], $option['ga_standard_tracking_enabled']) &&
                    !empty($option['ga_id']) &&
                    $option['ga_standard_tracking_enabled'] !== 'no';
                break;
            case self::SLUG_WP_PIWIK:
                return get_option(self::OPTION_NAME_WP_PIWIK) !== 'disabled';
            case self::SLUG_MATOMO_PLUGIN:
                $option = get_option(self::OPTION_NAME_MATOMO_PLUGIN);
                if (!\is_array($option) || !isset($option['track_mode'])) {
                    return \false;
                }
                return $option['track_mode'] !== 'disabled';
            case self::SLUG_PERFMATTERS:
                $option = get_option(self::OPTION_NAME_PERFMATTERS_GA);
                if (!\is_array($option) || !isset($option['analytics'])) {
                    return \false;
                }
                $enable_local_ga = $option['analytics']['enable_local_ga'] ?? null;
                return $enable_local_ga === '1';
            case self::SLUG_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO:
                $optionSettings = get_option(self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_SETTINGS);
                if (!\is_array($optionSettings) || !isset($optionSettings['enabled'])) {
                    return \false;
                }
                $optionAccountId = get_option(self::OPTION_NAME_WOOCOMMERCE_GOOGLE_ANALYTICS_PRO_ACCOUNT_ID);
                $trackingId = $optionSettings['tracking_id'] ?? null;
                return (!empty($optionAccountId) || !empty($trackingId)) && $optionSettings['enabled'] === 'yes';
            default:
                break;
        }
        return $isActive;
    }
    /**
     * New instance.
     *
     * @codeCoverageIgnore
     */
    public static function instance() {
        return new \DevOwl\RealCookieBanner\comp\PresetsPluginIntegrations();
    }
}
