<?php

namespace DevOwl\RealCookieBanner;

use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\CacheInvalidator;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\Assets as CustomizeAssets;
use DevOwl\RealCookieBanner\Vendor\DevOwl\DeliverAnonymousAsset\DeliverAnonymousAsset;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Freemium\Assets as FreemiumAssets;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\Iso3166OneAlpha2;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use DevOwl\RealCookieBanner\settings\CountryBypass;
use DevOwl\RealCookieBanner\settings\Revision;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\ModalHints;
use DevOwl\RealCookieBanner\view\Blocker;
use DevOwl\RealCookieBanner\settings\TCF;
use DevOwl\RealCookieBanner\view\customize\banner\BasicLayout;
use DevOwl\RealCookieBanner\view\customize\banner\CustomCss;
use DevOwl\RealCookieBanner\view\customize\banner\Texts;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Core as RpmWpClientCore;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license\License;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils as RealProductManagerUtils;
use DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Assets as UtilsAssets;
use DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Asset management for frontend scripts and styles.
 */
class Assets {
    use UtilsProvider;
    use UtilsAssets;
    use FreemiumAssets;
    use CustomizeAssets;
    const TCF_STUB_PATH = '@iabtcf/stub/lib/stub.js';
    /**
     * The registered handle name for the enqueued banner.
     */
    public $handleBanner = null;
    /**
     * The registered handle name for the enqueued blocker.
     */
    public $handleBlocker = null;
    /**
     * See `DeliverAnonymousAsset`.
     */
    public function createHashedAssets() {
        $filePath = RCB_PATH . '/' . $this->getPublicFolder() . '%s.' . ($this->isPro() ? 'pro' : 'lite') . '.js';
        $libraryFilePath = RCB_PATH . '/' . $this->getPublicFolder(\true) . '/%s';
        $handleName = RCB_SLUG . '-%s';
        $anonymousAssetsBuilder = \DevOwl\RealCookieBanner\Core::getInstance()->getAnonymousAssetBuilder();
        $isTcf = \DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive();
        $bannerName = $isTcf ? 'banner_tcf' : 'banner';
        $blockerName = $isTcf ? 'blocker_tcf' : 'blocker';
        $anonymousAssetsBuilder->build(
            \sprintf($handleName, 'vendor-' . RCB_SLUG . '-' . $bannerName),
            \sprintf($filePath, 'vendor-' . $bannerName),
            'vendorBanner'
        );
        $anonymousAssetsBuilder->build(
            \sprintf($handleName, 'vendor-' . RCB_SLUG . '-' . $blockerName),
            \sprintf($filePath, 'vendor-' . $blockerName),
            'vendorBlocker'
        );
        $anonymousAssetsBuilder->build(\sprintf($handleName, $bannerName), \sprintf($filePath, $bannerName), 'banner');
        $anonymousAssetsBuilder->build(
            \sprintf($handleName, $blockerName),
            \sprintf($filePath, $blockerName),
            'blocker'
        );
        if ($isTcf) {
            $anonymousAssetsBuilder->build(
                'iabtcf-stub',
                \sprintf($libraryFilePath, self::TCF_STUB_PATH),
                'iabtcf-stub'
            );
        }
    }
    /**
     * Enqueue scripts and styles depending on the type. This function is called
     * from both admin_enqueue_scripts and wp_enqueue_scripts. You can check the
     * type through the $type parameter. In this function you can include your
     * external libraries from src/public/lib, too.
     *
     * @param string $type The type (see utils Assets constants)
     * @param string $hook_suffix The current admin page
     */
    public function enqueue_scripts_and_styles($type, $hook_suffix = null) {
        // Generally check if an entrypoint should be loaded
        $core = \DevOwl\RealCookieBanner\Core::getInstance();
        $banner = $core->getBanner();
        $isConfigPage = $core->getConfigPage()->isVisible($hook_suffix);
        $shouldLoadAssets = $banner->shouldLoadAssets($type);
        $realUtils = RCB_ROOT_SLUG . '-real-utils-helper';
        // Do not enqueue anything if not needed
        if (
            !$isConfigPage &&
            !\in_array(
                $type,
                [\DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_CUSTOMIZE],
                \true
            ) &&
            !$shouldLoadAssets
        ) {
            // We need to enqueue real-utils helper always in backend to keep cross-selling intact
            if ($type === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_ADMIN) {
                $this->enqueueUtils();
                wp_enqueue_script($realUtils);
                wp_enqueue_style($realUtils);
            }
            return;
        }
        // Your assets implementation here... See utils Assets for enqueue* methods
        // $useNonMinifiedSources = $this->useNonMinifiedSources(); // Use this variable if you need to differ between minified or non minified sources
        // Our utils package relies on jQuery, but this shouldn't be a problem as the most themes still use jQuery (might be replaced with https://github.com/github/fetch)
        $scriptDeps = [];
        // Mobx should not be loaded on any frontend page, but in customize preview (see `customize_banner.tsx`)
        if (
            $type !== \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_FRONTEND ||
            is_customize_preview()
        ) {
            $this->enqueueMobx();
            \array_unshift(
                $scriptDeps,
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_HANDLE_REACT,
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_HANDLE_REACT_DOM,
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_HANDLE_MOBX,
                'moment',
                'wp-i18n',
                'wp-editor',
                'jquery'
            );
            // Enqueue external utils package
            $handleUtils = $this->enqueueComposerScript('utils', $scriptDeps);
            \array_unshift($scriptDeps, $handleUtils);
        }
        // Enqueue customize helpers and add the handle to our dependencies
        $this->probablyEnqueueCustomizeHelpers($scriptDeps, $isConfigPage);
        // When the banner should be shown, do not enqueue real utils
        if (!$shouldLoadAssets) {
            \array_push($scriptDeps, $realUtils);
        }
        // Enqueue plugin entry points
        if ($isConfigPage) {
            $handle = $this->enqueueAdminPage($scriptDeps);
        } elseif ($type === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_CUSTOMIZE) {
            $handle = $this->enqueueScript(
                'customize',
                [[$this->isPro(), 'customize.pro.js'], 'customize.lite.js'],
                $scriptDeps
            );
            $this->enqueueStyle('customize', 'customize.css');
        } elseif ($shouldLoadAssets) {
            $handle = $this->enqueueBanner($scriptDeps);
            // Enqueue blocker if enabled
            if (
                \DevOwl\RealCookieBanner\settings\General::getInstance()->isBlockerActive() &&
                \in_array(
                    $type,
                    [
                        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_FRONTEND,
                        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_LOGIN
                    ],
                    \true
                )
            ) {
                $this->enqueueBlocker(\array_merge($scriptDeps, [$handle]));
            }
        }
        // Localize script with server-side variables
        $this->anonymous_localize_script(
            $handle,
            'realCookieBanner',
            $this->localizeScript($type),
            !\in_array(
                $type,
                [
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_FRONTEND,
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_LOGIN
                ],
                \true
            ) || is_customize_preview()
        );
    }
    /**
     * Enqueue admin page (currently only the config).
     *
     * @param string[] $scriptDeps
     */
    public function enqueueAdminPage($scriptDeps) {
        $useNonMinifiedSources = $this->useNonMinifiedSources();
        \array_unshift($scriptDeps, 'wp-codemirror', 'jquery-ui-sortable');
        wp_enqueue_media();
        // Enqueue code mirror to edit JavaScript files
        $cm_settings['codeEditor'] = wp_enqueue_code_editor(['type' => 'text/html']);
        wp_localize_script('jquery', 'cm_settings', $cm_settings);
        // react-router-dom
        \array_unshift(
            $scriptDeps,
            $this->enqueueLibraryScript(
                'react-router-dom',
                [
                    [$useNonMinifiedSources, 'react-router-dom/umd/react-router-dom.js'],
                    'react-router-dom/umd/react-router-dom.min.js'
                ],
                [\DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_HANDLE_REACT_DOM]
            )
        );
        // @antv/g2
        \array_unshift($scriptDeps, $this->enqueueLibraryScript('g2', '@antv/g2/dist/g2.min.js'));
        // real-product-manager-wp-client (for licensing purposes)
        \array_unshift(
            $scriptDeps,
            \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Core::getInstance()
                ->getAssets()
                ->enqueue($this)
        );
        $handle = $this->enqueueScript('admin', [[$this->isPro(), 'admin.pro.js'], 'admin.lite.js'], $scriptDeps);
        $this->enqueueStyle('admin', 'admin.css');
        return $handle;
    }
    /**
     * Enqueue the banner.
     *
     * @param string[] $scriptDeps
     */
    public function enqueueBanner($scriptDeps) {
        // Only enqueue once
        static $enqueued = \false;
        if ($enqueued) {
            return;
        }
        $enqueued = \true;
        $useNonMinifiedSources = $this->useNonMinifiedSources();
        $isTcf = \DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive();
        $anonymousAssetsBuilder = \DevOwl\RealCookieBanner\Core::getInstance()->getAnonymousAssetBuilder();
        $isAntiAdBlock = $this->isAntiAdBlockActive();
        // Enqueue IAB TCF stub
        if ($isTcf) {
            $handle = $this->enqueueLibraryScript('iabtcf-stub', self::TCF_STUB_PATH);
            \array_unshift($scriptDeps, $handle);
            if ($handle !== \false && $isAntiAdBlock) {
                $anonymousAssetsBuilder->ready('iabtcf-stub');
            }
        }
        // Enqueue scripts in customize preview
        if (is_customize_preview()) {
            $handle = $this->enqueueScript(
                'customize_banner',
                [[$this->isPro(), 'customize_banner.pro.js'], 'customize_banner.lite.js'],
                $scriptDeps
            );
        } else {
            // Enqueue banner in frontend page (determine correct bundle depending on TCF status)
            $handle = $this->enqueueScript(
                $isTcf ? 'banner_tcf' : 'banner',
                [[$isTcf, 'banner_tcf.pro.js'], [$this->isPro(), 'banner.pro.js'], 'banner.lite.js'],
                $scriptDeps,
                \false
            );
            // Modify the URL so it is obtained by a hashed root URL
            if ($handle !== \false && $isAntiAdBlock) {
                $anonymousAssetsBuilder->ready('banner', !$useNonMinifiedSources);
                $anonymousAssetsBuilder->ready('vendorBanner', !$useNonMinifiedSources);
            }
            // Populate `codeOnPageLoad`
            add_action('wp_head', [\DevOwl\RealCookieBanner\Core::getInstance()->getBanner(), 'wp_head']);
        }
        // animate.css (only when animations are enabled)
        $customize = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBanner()
            ->getCustomize();
        $hasAnimations =
            $customize->getSetting(\DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_ANIMATION_IN) !==
                'none' ||
            $customize->getSetting(
                \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_ANIMATION_OUT
            ) !== 'none';
        if (is_customize_preview() || $hasAnimations) {
            $this->enqueueLibraryStyle('animate-css', [
                [$useNonMinifiedSources, 'animate.css/animate.css'],
                'animate.css/animate.min.css'
            ]);
        }
        if ($handle !== \false && !is_customize_preview()) {
            $excludeAssets = \DevOwl\RealCookieBanner\Core::getInstance()->getExcludeAssets();
            $preloadJs = ['iabtcf-stub', $handle];
            $preloadCss = ['animate-css'];
            $advancedFeatures = [
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_ADVANCED_ENQUEUE_FEATURE_PRIORITY_QUEUE
            ];
            if (!$excludeAssets->hasFailureSupportPluginActive()) {
                $advancedFeatures[] =
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_ADVANCED_ENQUEUE_FEATURE_DEFER;
                $advancedFeatures[] =
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_ADVANCED_ENQUEUE_FEATURE_PRELOADING;
            }
            $this->enableAdvancedEnqueue($preloadJs, $advancedFeatures);
            $this->enableAdvancedEnqueue($preloadCss, $advancedFeatures, 'style');
            $excludeAssets->byHandle('js', $preloadJs);
            $excludeAssets->byHandle('css', $preloadCss);
        }
        // Add window.consentApi stubs
        wp_add_inline_script(
            $handle,
            '((a,b)=>{a[b]||(a[b]={},["consentSync"].forEach(c=>a[b][c]=()=>({cookie:null,consentGiven:!1,cookieOptIn:!0})),["consent","consentAll","unblock"].forEach(c=>a[b][c]=(...d)=>new Promise(e=>a.addEventListener(b,()=>{a[b][c](...d).then(e)},{once:!0}))))})(window,"consentApi");',
            'before'
        );
        $this->handleBanner = $handle;
        return $handle;
    }
    /**
     * Enqueue the blocker.
     *
     * @param string[] $scriptDeps
     */
    public function enqueueBlocker($scriptDeps) {
        $useNonMinifiedSources = $this->useNonMinifiedSources();
        $anonymousAssetsBuilder = \DevOwl\RealCookieBanner\Core::getInstance()->getAnonymousAssetBuilder();
        $isTcf = \DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive();
        $isAntiAdBlock = $this->isAntiAdBlockActive();
        $handleName = $isTcf ? 'blocker_tcf' : 'blocker';
        $handle = $this->enqueueScript(
            $handleName,
            [[$isTcf, 'blocker_tcf.pro.js'], [$this->isPro(), 'blocker.pro.js'], 'blocker.lite.js'],
            $scriptDeps
        );
        if ($isAntiAdBlock) {
            $anonymousAssetsBuilder->ready('blocker', !$useNonMinifiedSources);
            $anonymousAssetsBuilder->ready('vendorBlocker', !$useNonMinifiedSources);
        }
        if ($handle !== \false) {
            $this->enableDeferredEnqueue($handle);
            $excludeAssets = \DevOwl\RealCookieBanner\Core::getInstance()->getExcludeAssets();
            $excludeAssets->byHandle('js', [$handle]);
        }
        $this->handleBlocker = $handle;
        return $handle;
    }
    /**
     * Localize the WordPress backend and frontend. If you want to provide URLs to the
     * frontend you have to consider that some JS libraries do not support umlauts
     * in their URI builder. For this you can use utils Assets#getAsciiUrl.
     *
     * Also, if you want to use the options typed in your frontend you should
     * adjust the following file too: src/public/ts/store/option.tsx
     *
     * @param string $context
     * @return array
     */
    public function overrideLocalizeScript($context) {
        global $wp_version;
        $result = [];
        $core = \DevOwl\RealCookieBanner\Core::getInstance();
        $banner = $core->getBanner();
        $bannerCustomize = $banner->getCustomize();
        $consentSettings = \DevOwl\RealCookieBanner\settings\Consent::getInstance();
        $generalSettings = \DevOwl\RealCookieBanner\settings\General::getInstance();
        $licenseActivation = $core
            ->getRpmInitiator()
            ->getPluginUpdater()
            ->getCurrentBlogLicense()
            ->getActivation();
        $showLicenseFormImmediate = !$licenseActivation->hasInteractedWithFormOnce();
        $isLicensed = !empty($licenseActivation->getCode());
        $isDevLicense =
            $licenseActivation->getInstallationType() ===
            \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license\License::INSTALLATION_TYPE_DEVELOPMENT;
        if ($context === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_ADMIN) {
            $colorScheme = \DevOwl\RealCookieBanner\Utils::get_admin_colors();
            if (\count($colorScheme) < 4) {
                // Backwards-compatibility: The "modern" color scheme has only three colors, but for all
                // our graphs and charts we need at least 4
                $colorScheme[] = $colorScheme[0];
            }
            $result = [
                'showLicenseFormImmediate' => $showLicenseFormImmediate,
                'showNoticeAnonymousScriptNotWritable' =>
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\DeliverAnonymousAsset\DeliverAnonymousAsset::getContentDir() ===
                    \false,
                'assetsUrl' => $core->getAdInitiator()->getAssetsUrl(),
                'customizeBannerUrl' => $bannerCustomize->getUrl(),
                'adminUrl' => admin_url(),
                'colorScheme' => $colorScheme,
                'cachePlugins' => \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\CacheInvalidator::getInstance()->getLabels(),
                'modalHints' => \DevOwl\RealCookieBanner\settings\ModalHints::getInstance()->getAlreadySeen(),
                'isDemoEnv' => \DevOwl\RealCookieBanner\DemoEnvironment::getInstance()->isDemoEnv(),
                'isConfigProNoticeVisible' => $core->getConfigPage()->isProNoticeVisible(),
                'activePlugins' => \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils::getActivePluginsMap(),
                'iso3166OneAlpha2' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\Iso3166OneAlpha2::getSortedCodes(),
                'predefinedCountryBypassLists' =>
                    \DevOwl\RealCookieBanner\settings\CountryBypass::PREDEFINED_COUNTRY_LISTS,
                'defaultCookieGroupTexts' => \DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getDefaultDescriptions(
                    \true
                ),
                'useEncodedStringForScriptInputs' => \version_compare($wp_version, '5.4.0', '>='),
                'resetUrl' => add_query_arg(
                    ['_wpnonce' => wp_create_nonce('rcb-reset-all'), 'rcb-reset-all' => 1],
                    $core->getConfigPage()->getUrl()
                )
            ];
        } elseif (is_customize_preview()) {
            $result = \array_merge(
                $bannerCustomize->localizeIds(),
                $bannerCustomize->localizeValues(),
                $bannerCustomize->localizeDefaultValues(),
                [
                    'poweredByTexts' => $core
                        ->getCompLanguage()
                        ->translateArray(\DevOwl\RealCookieBanner\view\customize\banner\Texts::getPoweredByLinkTexts()),
                    'isPoweredByLinkDisabledByException' => $bannerCustomize->isPoweredByLinkDisabledByException()
                ]
            );
        } elseif ($banner->shouldLoadAssets($context)) {
            $result = $bannerCustomize->localizeValues();
            $bannerCustomize->expandLocalizeValues($result);
        }
        if (
            \in_array(
                $context,
                [
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_ADMIN,
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::ASSETS_TYPE_CUSTOMIZE
                ],
                \true
            )
        ) {
            /**
             * Create customized hints for specific actions in frontend. Currently supported:
             * `deleteCookieGroup`, `deleteCookie`, `export`, `dashboardTile`, `proDialog`. For detailed
             * structure for this parameters please check out TypeScript typings in `types/otherOptions.tsx`.
             *
             * @hook RCB/Hints
             * @param {array} $hints
             * @return {array}
             */
            $result['hints'] = apply_filters('RCB/Hints', [
                'deleteCookieGroup' => [],
                'deleteCookie' => [],
                'export' => [],
                'dashboardTile' => [],
                'proDialog' => null
            ]);
        }
        return apply_filters(
            'RCB/Localize',
            \array_merge($result, $this->localizeFreemiumScript(), [
                'hasDynamicPreDecisions' => has_filter('RCB/Consent/DynamicPreDecision'),
                'isLicensed' => $isLicensed,
                'isDevLicense' => $isDevLicense,
                'multilingualSkipHTMLForTag' => $core->getCompLanguage()->getSkipHTMLForTag(),
                'isCurrentlyInTranslationEditorPreview' => $core->getCompLanguage()->isCurrentlyInEditorPreview(),
                'defaultLanguage' => $core->getCompLanguage()->getDefaultLanguage(),
                'currentLanguage' => $core->getCompLanguage()->getCurrentLanguage(),
                'context' => \DevOwl\RealCookieBanner\settings\Revision::getInstance()->getContextVariablesString(),
                'userConsentCookieName' => \DevOwl\RealCookieBanner\MyConsent::getInstance()->getCookieName(),
                'revisionHash' => \DevOwl\RealCookieBanner\settings\Revision::getInstance()->getCurrentHash(),
                'isTcf' => \DevOwl\RealCookieBanner\settings\TCF::getInstance()->isActive(),
                'isPreventPreDecision' => $banner->isPreventPreDecision(),
                'isAcceptAllForBots' => $consentSettings->isAcceptAllForBots(),
                'isRespectDoNotTrack' => $consentSettings->isRespectDoNotTrack(),
                'isEPrivacyUSA' => $consentSettings->isEPrivacyUSAEnabled(),
                'isAgeNotice' => $consentSettings->isAgeNoticeEnabled(),
                'isListServicesNotice' => $consentSettings->isListServicesNoticeEnabled(),
                'setCookiesViaManager' => $generalSettings->getSetCookiesViaManager(),
                'essentialGroup' => \DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getEssentialGroup()
                    ->slug,
                'groups' => $banner->localizeGroups(),
                'blocker' => $core->getBlocker()->localize(),
                'setVisualParentIfClassOfParent' =>
                    \DevOwl\RealCookieBanner\view\Blocker::SET_VISUAL_PARENT_IF_CLASS_OF_PARENT,
                'dependantVisibilityContainers' =>
                    \DevOwl\RealCookieBanner\view\Blocker::DEPENDANT_VISIBILITY_CONTAINERS,
                'bannerI18n' => \array_merge(
                    $core->getCompLanguage()->translateArray(
                        [
                            'legalBasis' => _x('Use on legal basis of', 'legal-text', RCB_TD),
                            'legitimateInterest' => _x('Legitimate interest', 'legal-text', RCB_TD),
                            'legalRequirement' => _x('Compliance with a legal obligation', 'legal-text', RCB_TD),
                            'consent' => _x('Consent', 'legal-text', RCB_TD),
                            'crawlerLinkAlert' => _x(
                                'We have recognized that you are a crawler/bot. Only natural persons must consent to cookies and processing of personal data. Therefore, the link has no function for you.',
                                'legal-text',
                                RCB_TD
                            ),
                            'technicalCookieDefinition' => _x('Technical cookie definition', 'legal-text', RCB_TD),
                            'usesCookies' => _x('Uses cookies', 'legal-text', RCB_TD),
                            'cookieRefresh' => _x('Cookie refresh', 'legal-text', RCB_TD),
                            'usesNonCookieAccess' => _x(
                                'Uses cookie-like information (LocalStorage, SessionStorage, IndexDB, etc.)',
                                'legal-text',
                                RCB_TD
                            ),
                            'host' => _x('Host', 'legal-text', RCB_TD),
                            'duration' => _x('Duration', 'legal-text', RCB_TD),
                            'noExpiration' => _x('No expiration', 'legal-text', RCB_TD),
                            'type' => _x('Type', 'legal-text', RCB_TD),
                            'purpose' => _x('Purpose', 'legal-text', RCB_TD),
                            'headerTitlePrivacyPolicyHistory' => _x(
                                'History of your privacy settings',
                                'legal-text',
                                RCB_TD
                            ),
                            'historyLabel' => _x('Show consent from', 'legal-text', RCB_TD),
                            'historySelectNone' => _x('Not yet consented to', 'legal-text', RCB_TD),
                            \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER => _x(
                                'Provider',
                                'legal-text',
                                RCB_TD
                            ),
                            \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL => _x(
                                'Privacy Policy',
                                'legal-text',
                                RCB_TD
                            ),
                            // translators:
                            'ePrivacyNoteMore' => _x('and %d more', 'legal-text', RCB_TD),
                            'ePrivacyUSA' => _x('US data processing', 'legal-text', RCB_TD),
                            'durationUnit' => [
                                's' => __('second(s)', RCB_TD),
                                'm' => __('minute(s)', RCB_TD),
                                'h' => __('hour(s)', RCB_TD),
                                'd' => __('day(s)', RCB_TD),
                                'mo' => __('month(s)', RCB_TD),
                                'y' => __('year(s)', RCB_TD)
                            ],
                            'close' => __('Close', RCB_TD),
                            'closeWithoutSaving' => __('Close without saving', RCB_TD),
                            'yes' => __('Yes', RCB_TD),
                            'no' => __('No', RCB_TD),
                            'unknown' => __('Unknown', RCB_TD),
                            'none' => __('None', RCB_TD),
                            'noLicense' => __('No license activated - not for production use!', RCB_TD),
                            'devLicense' => __('Product license not for production use!', RCB_TD),
                            // translators:
                            'andSeparator' => __(' and ', RCB_TD)
                        ],
                        [],
                        null,
                        ['legal-text']
                    )
                ),
                'pageRequestUuid4' => $core->getPageRequestUuid4(),
                'pageByIdUrl' => add_query_arg('page_id', '', home_url()),
                'pageIdToPermalink' => $generalSettings->getPermalinkMap(),
                'pageId' => get_post_type() === 'page' ? get_the_ID() : \false,
                'pluginUrl' => $core->getPluginData('PluginURI')
            ]),
            $context
        );
    }
    /**
     * Provide predefined links for `RCB/Hints` `dashboardTile`'s configuration.
     *
     * @param array $hints
     */
    public function hints_dashboard_tile_predefined_links($hints) {
        foreach ($hints['dashboardTile'] as &$tile) {
            if (isset($tile['links'])) {
                foreach ($tile['links'] as &$link) {
                    if ($link === 'learnAboutPro') {
                        $link = [
                            'link' => \sprintf('%s&feature=partner-dashboard-tile', RCB_PRO_VERSION),
                            'linkText' => __('Learn more', RCB_TD)
                        ];
                    }
                }
            }
        }
        return $hints;
    }
    /**
     * Check if the current banner is configured to provide an anti ad block system.
     */
    protected function isAntiAdBlockActive() {
        return bool_from_yn(
            \DevOwl\RealCookieBanner\Core::getInstance()
                ->getBanner()
                ->getCustomize()
                ->getSetting(\DevOwl\RealCookieBanner\view\customize\banner\CustomCss::SETTING_ANTI_AD_BLOCKER)
        );
    }
    /*
     * Enqueue our `rcb-scan` client-worker for `real-queue`.
     */
    public function real_queue_enqueue_scripts($handle) {
        $handle = $this->enqueueScript('queue', [[$this->isPro(), 'queue.pro.js'], 'queue.lite.js'], [$handle]);
        wp_localize_script($handle, 'realCookieBannerQueue', [
            'originalHomeUrl' => \DevOwl\RealCookieBanner\Utils::getOriginalHomeUrl()
        ]);
    }
}
