<?php

namespace DevOwl\RealCookieBanner\comp\migration;

use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\BlockerPresets;
use DevOwl\RealCookieBanner\scanner\AutomaticScanStarter;
use DevOwl\RealCookieBanner\settings\Blocker;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\customize\banner\BasicLayout;
use DevOwl\RealCookieBanner\view\customize\banner\BodyDesign;
use DevOwl\RealCookieBanner\view\customize\banner\Decision;
use DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton;
use DevOwl\RealCookieBanner\view\customize\banner\individual\Texts as IndividualTexts;
use DevOwl\RealCookieBanner\view\customize\banner\Mobile;
use DevOwl\RealCookieBanner\view\customize\banner\Texts;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Migration for Major version 3.
 *
 * @see https://app.clickup.com/t/2fjk49z
 */
class DashboardTileMigrationMajor3 extends \DevOwl\RealCookieBanner\comp\migration\AbstractDashboardTileMigration {
    const TRANSIENT_CACHE_KEY_BLOCKERS_WITH_BETTER_POTENTIAL_VISUAL_TYPE =
        RCB_OPT_PREFIX . '-blockers-with-better-potential-visual-type';
    const DELETE_LANGUAGES = ['de', 'en'];
    const DELETE_OPTIONS_TEXTS = [
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_HEADLINE,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_DESCRIPTION,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_EPRIVACY_USA,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_AGE_NOTICE,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_AGE_NOTICE_BLOCKER,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_LIST_SERVICES_NOTICE,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_CONSENT_FORWARDING,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_ALL,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_ESSENTIALS,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_INDIVIDUAL,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_POWERED_BY_TEXT,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_HEADLINE,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_LINK_SHOW_MISSING,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_LOAD_BUTTON,
        \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_ACCEPT_INFO,
        \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_HEADLINE,
        \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_DESCRIPTION,
        \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_SAVE,
        \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_SHOW_MORE,
        \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_HIDE_MORE
    ];
    /**
     * Initialize hooks and listen to saves to content blockers so we can update the transient of `fetchBlockersWithBetterPotentialVisualType`.
     */
    public function init() {
        parent::init();
        add_action(
            'save_post_' . \DevOwl\RealCookieBanner\settings\Blocker::CPT_NAME,
            [$this, 'save_post_blocker'],
            10,
            3
        );
    }
    /**
     * A blocker was saved.
     *
     * @param int $post_ID
     * @param WP_Post $post
     * @param boolean $update
     */
    public function save_post_blocker($post_ID, $post, $update) {
        if ($update) {
            $transientValue = get_transient(self::TRANSIENT_CACHE_KEY_BLOCKERS_WITH_BETTER_POTENTIAL_VISUAL_TYPE);
            if ($this->isPro() && \is_array($transientValue) && isset($transientValue[$post_ID])) {
                unset($transientValue[$post_ID]);
                set_transient(self::TRANSIENT_CACHE_KEY_BLOCKERS_WITH_BETTER_POTENTIAL_VISUAL_TYPE, $transientValue);
                if (\count($transientValue) === 0) {
                    $this->saveActionPerformed('visual-content-blocker');
                }
            }
        }
    }
    // Documented in AbstractDashboardTileMigration
    public function actions() {
        $core = \DevOwl\RealCookieBanner\Core::getInstance();
        $isMobileExperienceEnabled = \boolval(
            get_option(\DevOwl\RealCookieBanner\view\customize\banner\Mobile::SETTING_ENABLED)
        );
        $blockersWithBetterPotentialVisualType = $this->fetchBlockersWithBetterPotentialVisualType();
        $this->addAction(
            'ttdsg',
            __('Legal adjustments to texts and design in cookie banner', RCB_TD),
            \join('<br /><br/ >', [
                \sprintf(
                    // translators:
                    __(
                        'In recent months, more clarity has been created about what consent management on websites should look like - and what it shouldn\'t. In particular, through the <a href="%1$s" target="_blank">TTDSG</a> (Telecommunications Telemedia Data Protection Act; Germany) and <a href="%2$s" target="_blank">Guidance of the Conference of Independent Data Protection Authorities for cookie banners</a> (coordinated legal interpretation of all German data protection authorities; in German), there are now clearer rules that further interpret or complement the EU-wide applicable <a href="%3$s" target="_blank">ePrivacy Directive</a> and <a href="%4$s" target="_blank">GDPR</a>. Furthermore, there were important decisions such as the evaluation of <a href="%5$s" target="_blank">TCF by ADP (Belgium)</a>, the <a href="%6$s" target="_blank">Google Analytics decision by dsb (Austria)</a> and the <a href="%7$s" target="_blank">position on Google Analytics by CNIL</a>.',
                        RCB_TD
                    ),
                    __('https://www.gesetze-im-internet.de/ttdsg/', RCB_TD),
                    __('https://www.datenschutzkonferenz-online.de/media/oh/20211220_oh_telemedien.pdf', RCB_TD),
                    __('https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=celex%3A32009L0136', RCB_TD),
                    __('https://gdpr-info.eu/', RCB_TD),
                    __(
                        'https://www.autoriteprotectiondonnees.be/publications/decision-quant-au-fond-n-21-2022-english.pdf',
                        RCB_TD
                    ),
                    // translators:
                    __(
                        'https://noyb.eu/sites/default/files/2022-01/E-DSB%20-%2$20Google%20Analytics_DE_bk_0.pdf',
                        RCB_TD
                    ),
                    __(
                        'https://www.cnil.fr/sites/default/files/atoms/files/decision_ordering_to_comply_anonymised_-_google_analytics.pdf',
                        RCB_TD
                    )
                ),
                __(
                    'We have adapted the texts and design suggestions for the cookie banner accordingly. <strong>We strongly advise you to adopt the new texts and design suggestions for your website!</strong>',
                    RCB_TD
                ),
                __(
                    'If you want to keep your individual Cookie Banner Design, please make sure that the choices ("Accept all", "Continue without consent" and "Set privacy settings individually") are displayed equally and all services are named in the first view of your cookie banner.',
                    RCB_TD
                )
            ]),
            [
                'linkText' => __('Apply new texts and important design changes', RCB_TD),
                'confirmText' => __(
                    'We will overwrite all texts in your cookie banner with new text suggestions. Also, we name all services in the first view of the cookie banner instead of a bullet list of service groups, equalize the appearance of "Accept all" and "Continue without consent", and highlight "Set privacy settings individually" in your cookie banner. Please check afterwards if all adjustments are correct for your individual requirements and reconfigure your cookie banner yourself if necessary. Are you sure you want to apply the changes?',
                    RCB_TD
                ),
                'callback' => [$this, 'applyNewTextsAndImportantDesignChanges'],
                'previewImage' => $core->getBaseAssetsUrl(__('cookie-banner-frontend.png', RCB_TD))
            ]
        )
            ->addAction(
                'legal-links',
                __('Place legal links on each subpage', RCB_TD),
                \join('<br /><br/ >', [
                    \sprintf(
                        // translators:
                        __(
                            'In accordance with the requirements of the &quot;<a href="%s" target="_blank">Guidance of the Conference of Independent Data Protection Authorities for cookie banners</a>&quot;, the possibility to view, modify and revoke consent must be directly accessible on every sub-page of your website.',
                            RCB_TD
                        ),
                        __('https://www.datenschutzkonferenz-online.de/media/oh/20211220_oh_telemedien.pdf', RCB_TD)
                    ),
                    __(
                        'This means you can no longer "hide" the links/buttons in your privacy policy. <strong>We recommend placing the option in the footer of each subpage.</strong>',
                        RCB_TD
                    ),
                    __(
                        'You can now place the legal links not only as shortcodes, but also in WordPress menus as menu items.',
                        RCB_TD
                    )
                ]),
                [
                    'linkText' => __('Place legal links', RCB_TD),
                    'linkClasses' => 'button button-link',
                    'callback' => $this->getConfigUrl('/consent/legal')
                ]
            )
            ->addAction(
                'visual-content-blocker',
                __('Visual content blocker in pretty: Looks like without content blocker!', RCB_TD),
                \join(
                    '<br /><br/ >',
                    \array_filter([
                        // translators:
                        __(
                            'Visual content blockers replace, for example, YouTube videos on the website if the visitor has not given consent to YouTube loading in the cookie banner. Until now, these were very text-heavy to display all the legally necessary requirements.',
                            RCB_TD
                        ),
                        __(
                            'Hero and Wrapped Content Blockers are trying to do that better. Hero Content Blocker mimic maps, video players, audio players, and various types of social media feeds in a privacy-compliant way, so it looks like the original element is still embedded. Consent is obtained in a modal when the visitor tries to start the video, for example. <strong>Reconfigure your content blockers now!</strong>',
                            RCB_TD
                        )
                    ])
                ),
                [
                    'needsPro' => \true,
                    'linkText' => __('Reconfigure Content Blocker', RCB_TD),
                    'callback' => $this->getConfigUrl('/blocker'),
                    'info' =>
                        \count($blockersWithBetterPotentialVisualType) > 0
                            ? \sprintf(
                                // translators:
                                __(
                                    'We recommend for <strong>%s</strong> to change the design to a more and better visual Content Blocker.',
                                    RCB_TD
                                ),
                                \DevOwl\RealCookieBanner\Utils::joinWithAndSeparator(
                                    \array_values($blockersWithBetterPotentialVisualType),
                                    __(' and ', RCB_TD)
                                )
                            )
                            : null,
                    'previewImage' => $core->getBaseAssetsUrl(__('pro-modal/visual-content-blocker.webp', RCB_TD))
                ]
            )
            ->addAction(
                'scanner',
                __('Scan your website for services that require consent', RCB_TD),
                \join('<br /><br/ >', [
                    __(
                        'The service scanner crawls every subpage of your website, all plugins and other technical indicators of your website to find services on your website that require consent. This allows you to collect all the consent you need from your website visitors.',
                        RCB_TD
                    ),
                    __(
                        'If you last fully scanned your website before Februrary 2022, we recommend that you scan your website again. The scanner will now detect even more services!',
                        RCB_TD
                    )
                ]),
                ['linkText' => __('Scan website (again)', RCB_TD), 'callback' => [$this, 'scanWebsiteAgain']]
            )
            ->addAction(
                'mobile-experience',
                __('Cookie banner optimizations for mobile devices', RCB_TD),
                __(
                    'We provide additional options for optimized display of the cookie banner on mobile devices. These make the cookie banner easier to use on smartphones by optimizing it to the normal hand position of users. Also, the cookie banner is no longer Largest Contentfull Paint (LCP) as defined by Google\'s Web Vitals and thus the optimizations will increase your PageSpeed score for mobile devices.',
                    RCB_TD
                ),
                [
                    'needsPro' => \true,
                    'linkText' => __('Activate optimizations', RCB_TD),
                    'forceShowPerformedLabel' => $isMobileExperienceEnabled,
                    'linkDisabled' => $isMobileExperienceEnabled,
                    'callback' => [$this, 'applyMobileOptimizations'],
                    'previewImage' => $core->getBaseAssetsUrl(__('pro-modal/mobile-optimization.png', RCB_TD))
                ]
            );
    }
    /**
     * Start the scanner and redirect to scanner tab.
     *
     * @param array $result
     */
    public function applyMobileOptimizations($result) {
        if (!is_wp_error($result)) {
            update_option(\DevOwl\RealCookieBanner\view\customize\banner\Mobile::SETTING_ENABLED, '1');
            update_option(
                \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_ANIMATION_IN,
                'slideInUp'
            );
            update_option(
                \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SETTING_ANIMATION_IN_DURATION,
                500
            );
            $result['success'] = \true;
            $result['redirect'] = add_query_arg(
                [
                    'autofocus[section]' => \DevOwl\RealCookieBanner\view\customize\banner\Mobile::SECTION,
                    'return' => wp_get_raw_referer()
                ],
                admin_url('customize.php')
            );
        }
        return $result;
    }
    /**
     * Start the scanner and redirect to scanner tab.
     *
     * @param array $result
     */
    public function scanWebsiteAgain($result) {
        if (!is_wp_error($result)) {
            \DevOwl\RealCookieBanner\scanner\AutomaticScanStarter::instance()->addJobToQueue();
            $result['success'] = \true;
            $result['redirect'] = $this->getConfigUrl('/scanner');
        }
        return $result;
    }
    /**
     * Apply new customizer texts and important design changes and overwrite existing ones.
     *
     * @param array $result
     */
    public function applyNewTextsAndImportantDesignChanges($result) {
        if (!is_wp_error($result)) {
            $bannerCustomize = \DevOwl\RealCookieBanner\Core::getInstance()
                ->getBanner()
                ->getCustomize();
            $deletedOptionsTexts = $this->deleteCustomizerTexts(self::DELETE_LANGUAGES, self::DELETE_OPTIONS_TEXTS);
            update_option(\DevOwl\RealCookieBanner\settings\Consent::SETTING_LIST_SERVICES_NOTICE, '1');
            update_option(\DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_SHOW_GROUPS, '');
            update_option(
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ESSENTIALS_USE_ACCEPT_ALL,
                '1'
            );
            update_option(
                \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SETTING_USE_ACCEPT_ALL,
                '1'
            );
            // Update "Set privacy settings individually" button and adjust colors to the current design
            $buttonType = $bannerCustomize->getSetting(
                \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_INDIVIDUAL
            );
            $acceptAllBg = $bannerCustomize->getSetting(
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_BG
            );
            $acceptAllBgHover = $bannerCustomize->getSetting(
                \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_HOVER_BG
            );
            if ($buttonType === 'link' || $buttonType === 'hidden') {
                delete_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_FONT_SIZE
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\Decision::SETTING_ACCEPT_INDIVIDUAL,
                    'link'
                );
                // always reactivate `hidden` button
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_FONT_COLOR,
                    $acceptAllBg
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_HOVER_FONT_COLOR,
                    $acceptAllBgHover
                );
            } elseif ($buttonType === 'button') {
                // Reset the button style completely and use the style of "Accept all"
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_PADDING,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_PADDING
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_BG,
                    $acceptAllBg
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_TEXT_ALIGN,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_TEXT_ALIGN
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_FONT_SIZE,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_FONT_SIZE
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_FONT_COLOR,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_FONT_COLOR
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_FONT_WEIGHT,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_FONT_WEIGHT
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_BORDER_WIDTH,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_BORDER_WIDTH
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_BORDER_COLOR,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_BORDER_COLOR
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_HOVER_BG,
                    $acceptAllBgHover
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_HOVER_BORDER_COLOR,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_HOVER_BORDER_COLOR
                    )
                );
                update_option(
                    \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_INDIVIDUAL_HOVER_FONT_COLOR,
                    $bannerCustomize->getSetting(
                        \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SETTING_BUTTON_ACCEPT_ALL_HOVER_FONT_COLOR
                    )
                );
            }
            $result['success'] = \true;
            $result['deleted_options_texts'] = $deletedOptionsTexts;
            $result['redirect'] = $bannerCustomize->getUrl();
        }
        return $result;
    }
    /**
     * Calculate existing blockers with potential visual type other than `default` from the templates
     * and cache the result to a transient to avoid the calculation again.
     *
     * @return string[]
     */
    protected function fetchBlockersWithBetterPotentialVisualType() {
        if (!$this->isPro()) {
            return [];
        }
        $result = get_transient(self::TRANSIENT_CACHE_KEY_BLOCKERS_WITH_BETTER_POTENTIAL_VISUAL_TYPE);
        if (!\is_array($result)) {
            $result = [];
            $blockerPresets = new \DevOwl\RealCookieBanner\presets\BlockerPresets();
            $blockers = $blockerPresets->getBlockerWithPreset();
            if (!is_wp_error($blockers)) {
                foreach ($blockers as $blocker) {
                    if (!$blocker->metas['isVisual'] || $blocker->metas['visualType'] !== 'default') {
                        // Already configured as non-default visual or visually deactivated
                        continue;
                    }
                    $presetWithAttributes = $blockerPresets->getWithAttributes($blocker->metas['presetId']);
                    if ($presetWithAttributes === \false || !isset($presetWithAttributes['attributes']['visualType'])) {
                        continue;
                    }
                    $visualType = $presetWithAttributes['attributes']['visualType'];
                    if ($visualType !== 'default') {
                        $result[$blocker->ID] = $blocker->post_title;
                    }
                }
            }
            set_transient(self::TRANSIENT_CACHE_KEY_BLOCKERS_WITH_BETTER_POTENTIAL_VISUAL_TYPE, $result);
        }
        return $result;
    }
    // Documented in AbstractDashboardTileMigration
    public function getId() {
        return 'v3';
    }
    // Documented in AbstractDashboardTileMigration
    public function getHeadline() {
        return __('Updates in v3.0: You should act to be safe!', RCB_TD);
    }
    // Documented in AbstractDashboardTileMigration
    public function getDescription() {
        return \join('<br /><br/ >', [
            \sprintf(
                // translators:
                __(
                    'With Real Cookie Banner 3.0 we have released a major update, in which we have implemented, among other things, current legal adjustments. Read more about the changes in our <a href="%s" target="_blank">blog post</a>.',
                    RCB_TD
                ),
                __('https://devowl.io/2022/real-cookie-banner-3-0/', RCB_TD)
            ),
            __(
                '<strong>You should definitely take a look at the following points, because we have adjusted the behavior of the cookie banner.</strong> All changes can be optionally activated or ignored. We will not fundamentally change your cookie banner without your consent.',
                RCB_TD
            )
        ]);
    }
    // Documented in AbstractDashboardTileMigration
    public function isActive() {
        return $this->hasMajorPreviouslyInstalled(2);
    }
    // Documented in AbstractDashboardTileMigration
    public function dismiss() {
        return $this->removeMajorVersionFromPreviouslyInstalled(2);
    }
}
