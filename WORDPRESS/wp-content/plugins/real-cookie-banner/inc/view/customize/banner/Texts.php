<?php

namespace DevOwl\RealCookieBanner\view\customize\banner;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\Forwarding;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\settings\Multisite;
use DevOwl\RealCookieBanner\Utils;
use DevOwl\RealCookieBanner\view\BannerCustomize;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Cookie banner texts.
 */
class Texts {
    use UtilsProvider;
    const SECTION = \DevOwl\RealCookieBanner\view\BannerCustomize::PANEL_MAIN . '-texts';
    const HEADLINE_GENERAL = self::SECTION . '-headline-general';
    const HEADLINE_EPRIVACY_USA = self::SECTION . '-headline-eprivacy-usa';
    const HEADLINE_AGE_NOTICE = self::SECTION . '-headline-age-notice';
    const HEADLINE_LIST_SERVICES_NOTICE = self::SECTION . '-headline-list-services-notice';
    const HEADLINE_CONSENT_FORWARDING = self::SECTION . '-headline-consent-forwarding';
    const HEADLINE_BLOCKER = self::SECTION . '-headline-blocker';
    const SETTING = RCB_OPT_PREFIX . '-banner-texts';
    const SETTING_BLOCKER = RCB_OPT_PREFIX . '-blocker-texts';
    const SETTING_HEADLINE = self::SETTING . '-headline';
    const SETTING_DESCRIPTION = self::SETTING . '-description';
    const SETTING_EPRIVACY_USA = self::SETTING . '-eprivacy-usa';
    const SETTING_AGE_NOTICE = self::SETTING . '-age-notice';
    const SETTING_AGE_NOTICE_BLOCKER = self::SETTING . '-age-notice-blocker';
    const SETTING_LIST_SERVICES_NOTICE = self::SETTING . '-list-services-notice';
    const SETTING_CONSENT_FORWARDING = self::SETTING . '-consent-forwarding';
    const SETTING_ACCEPT_ALL = self::SETTING . '-accept-all';
    const SETTING_ACCEPT_ESSENTIALS = self::SETTING . '-accept-essentials';
    const SETTING_ACCEPT_INDIVIDUAL = self::SETTING . '-accept-individual';
    const SETTING_POWERED_BY_TEXT = self::SETTING . '-powered-by';
    const SETTING_BLOCKER_HEADLINE = self::SETTING_BLOCKER . '-headline';
    const SETTING_BLOCKER_LINK_SHOW_MISSING = self::SETTING_BLOCKER . '-link-show-missing';
    const SETTING_BLOCKER_LOAD_BUTTON = self::SETTING_BLOCKER . '-load-button';
    const SETTING_BLOCKER_ACCEPT_INFO = self::SETTING_BLOCKER . '-accept-info';
    /**
     * Matches the indexed array of `getPoweredByLinkTexts`.
     *
     * @var int[]
     */
    const POWERED_BY_TEXTS_WEIGHTS = [25, 25, 25, 10, 10, 5];
    /**
     * Return arguments for this section.
     */
    public function args() {
        $defaultButtonTexts = self::getDefaultButtonTexts();
        $consentSettings = \DevOwl\RealCookieBanner\settings\Consent::getInstance();
        $consentForwarding =
            \DevOwl\RealCookieBanner\settings\Multisite::getInstance()->isConsentForwarding() && $this->isPro()
                ? \DevOwl\RealCookieBanner\lite\Forwarding::getInstance()->getExternalHosts() !== \false
                : \false;
        $ePrivacyUSAEnabled = $consentSettings->isEPrivacyUSAEnabled();
        $ageNoticeEnabled = $consentSettings->isAgeNoticeEnabled();
        $listServicesNoticeEnabled = $consentSettings->isListServicesNoticeEnabled();
        // Use current always as default for "powered by" link text cause it is random per installation
        $poweredByTexts = self::getPoweredByLinkTexts();
        $currentPoweredByText = get_option(self::SETTING_POWERED_BY_TEXT);
        $defaultPoweredByText = \intval(
            $currentPoweredByText === \false
                ? \array_search($defaultButtonTexts['poweredBy'], $poweredByTexts, \true)
                : $currentPoweredByText
        );
        return [
            'name' => 'texts',
            'title' => __('Texts', RCB_TD),
            'description' => self::getDescription(),
            'controls' => [
                self::HEADLINE_GENERAL => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('General', RCB_TD)
                ],
                self::SETTING_HEADLINE => [
                    'name' => 'headline',
                    'label' => __('Headline', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['headline'], 'allowEmpty' => \true]
                ],
                self::SETTING_DESCRIPTION => [
                    'name' => 'description',
                    'label' => __('Description', RCB_TD),
                    'description' => __(
                        'Use <code>{{privacyPolicy}}privacy policy{{/privacyPolicy}}</code> as a placeholder for the privacy policy link.',
                        RCB_TD
                    ),
                    'type' => 'textarea',
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class,
                    'mediaButtons' => \true,
                    'setting' => [
                        'default' => $defaultButtonTexts['description'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::SETTING_ACCEPT_ALL => [
                    'name' => 'acceptAll',
                    'label' => __('"Accept all" button/link', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['acceptAll']]
                ],
                self::SETTING_ACCEPT_ESSENTIALS => [
                    'name' => 'acceptEssentials',
                    'label' => __('"Continue without consent" button/link', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['acceptEssentials']]
                ],
                self::SETTING_ACCEPT_INDIVIDUAL => [
                    'name' => 'acceptIndividual',
                    'label' => __('"Individual privacy preferences" button/link', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['acceptIndividual']]
                ],
                self::SETTING_POWERED_BY_TEXT => [
                    'name' => 'poweredBy',
                    'label' => __('"Powered by" link text', RCB_TD),
                    'type' => 'select',
                    'choices' => $poweredByTexts,
                    'setting' => ['default' => $defaultPoweredByText]
                ],
                self::HEADLINE_EPRIVACY_USA => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('US data processing', RCB_TD),
                    'level' => 3,
                    'isSubHeadline' => \true,
                    'description' => $ePrivacyUSAEnabled ? '' : $this->getEPrivacyUSANotice()
                ],
                self::SETTING_EPRIVACY_USA => [
                    'name' => 'ePrivacyUSA',
                    'label' => __('Data processing in the USA', RCB_TD),
                    'type' => 'textarea',
                    'input_attrs' => $ePrivacyUSAEnabled ? [] : ['disabled' => 'disabled'],
                    'class' => $ePrivacyUSAEnabled
                        ? \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class
                        : null,
                    'setting' => [
                        'default' => $defaultButtonTexts['ePrivacyUSA'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::HEADLINE_AGE_NOTICE => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('Age notice', RCB_TD),
                    'level' => 3,
                    'isSubHeadline' => \true,
                    'description' => $ageNoticeEnabled ? '' : $this->getAgeNoticeNotice()
                ],
                self::SETTING_AGE_NOTICE => [
                    'name' => 'ageNoticeBanner',
                    'label' => __('Age notice in cookie banner', RCB_TD),
                    'type' => 'textarea',
                    'input_attrs' => $ageNoticeEnabled ? [] : ['disabled' => 'disabled'],
                    'class' => $ageNoticeEnabled
                        ? \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class
                        : null,
                    'setting' => [
                        'default' => $defaultButtonTexts['ageNoticeBanner'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::SETTING_AGE_NOTICE_BLOCKER => [
                    'name' => 'ageNoticeBlocker',
                    'label' => __('Age notice in content blocker', RCB_TD),
                    'type' => 'textarea',
                    'input_attrs' => $ageNoticeEnabled ? [] : ['disabled' => 'disabled'],
                    'class' => $ageNoticeEnabled
                        ? \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class
                        : null,
                    'setting' => [
                        'default' => $defaultButtonTexts['ageNoticeBlocker'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::HEADLINE_LIST_SERVICES_NOTICE => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('List of services', RCB_TD),
                    'level' => 3,
                    'isSubHeadline' => \true,
                    'description' => $listServicesNoticeEnabled ? '' : $this->getListServicesNotice()
                ],
                self::SETTING_LIST_SERVICES_NOTICE => [
                    'name' => 'listServicesNotice',
                    'label' => __('Naming of all services in first view', RCB_TD),
                    'description' => $listServicesNoticeEnabled
                        ? __(
                            'Use <code>{{services}}</code> and <code>{{serviceGroups}}</code> as a placeholder for a list of services and groups.',
                            RCB_TD
                        )
                        : '',
                    'type' => 'textarea',
                    'input_attrs' => $listServicesNoticeEnabled ? [] : ['disabled' => 'disabled'],
                    'class' => $listServicesNoticeEnabled
                        ? \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class
                        : null,
                    'setting' => [
                        'default' => $defaultButtonTexts['listServicesNotice'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::HEADLINE_CONSENT_FORWARDING => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('Consent Forwarding', RCB_TD),
                    'level' => 3,
                    'isSubHeadline' => \true
                ],
                self::SETTING_CONSENT_FORWARDING => [
                    'name' => 'consentForwardingExternalHosts',
                    'label' => __('Consent forwarding to other websites', RCB_TD),
                    'description' => $consentForwarding
                        ? __('Use <code>{{websites}}</code> as a placeholder for the external website URLs.', RCB_TD)
                        : $this->getConsentForwardingCustomHostsNotice(),
                    'type' => 'textarea',
                    'input_attrs' => $consentForwarding ? [] : ['disabled' => 'disabled'],
                    'class' => $consentForwarding
                        ? \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class
                        : null,
                    'setting' => [
                        'default' => $defaultButtonTexts['consentForwardingExternalHosts'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ],
                self::HEADLINE_BLOCKER => [
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class,
                    'label' => __('Content Blocker', RCB_TD),
                    'description' => __(
                        'At the moment we do not provide a live preview for content blocker texts.',
                        RCB_TD
                    )
                ],
                self::SETTING_BLOCKER_HEADLINE => [
                    'name' => 'blockerHeadline',
                    'label' => __('Headline', RCB_TD),
                    'description' => __(
                        'Use <code>{{name}}</code> as a placeholder for the content blocker name.',
                        RCB_TD
                    ),
                    'setting' => ['default' => $defaultButtonTexts['blockerHeadline'], 'allowEmpty' => \true]
                ],
                self::SETTING_BLOCKER_LINK_SHOW_MISSING => [
                    'name' => 'blockerLinkShowMissing',
                    'label' => __('Link text, to show all required services', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['blockerLinkShowMissing'], 'allowEmpty' => \true]
                ],
                self::SETTING_BLOCKER_LOAD_BUTTON => [
                    'name' => 'blockerLoadButton',
                    'label' => __('"Load content" button/link', RCB_TD),
                    'setting' => ['default' => $defaultButtonTexts['blockerLoadButton'], 'allowEmpty' => \true]
                ],
                self::SETTING_BLOCKER_ACCEPT_INFO => [
                    'name' => 'blockerAcceptInfo',
                    'label' => __('Additional info below the "Load content" button', RCB_TD),
                    'type' => 'textarea',
                    'class' => \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\TinyMCE::class,
                    'setting' => [
                        'default' => $defaultButtonTexts['blockerAcceptInfo'],
                        'sanitize_callback' => 'wp_kses_post',
                        'allowEmpty' => \true
                    ]
                ]
            ]
        ];
    }
    /**
     * Return HTML for the customize description about "Texts" at the top.
     */
    public static function getDescription() {
        return \sprintf(
            // translators:
            __(
                'The standard texts in the cookie banner are worded carefully. If you customize them, make sure they are not misleading or riveting. According to the <a href="%s" target="_blank">Data Protection Commissioner of Baden-Württeberg, Germany (Section B, 1.3.7.; German)</a>, for example, a headline "We love cookies" is already misleading.',
                RCB_TD
            ),
            __(
                'https://www.baden-wuerttemberg.datenschutz.de/faq-zu-cookies-und-tracking-2/#13_informiertheit)',
                RCB_TD
            )
        );
    }
    /**
     * Return a notice HTML for the customize description when US data processing is deactivated.
     */
    public static function getEPrivacyUSANotice() {
        return \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0px 0px;"><p>%s</p></div>',
            \sprintf(
                // translators:
                __(
                    'Consent for data processing in the USA is currently disabled. Please navigate to %1$sSettings > Consent%2$s to activate it.',
                    RCB_TD
                ),
                '<a href="' .
                    esc_attr(
                        \DevOwl\RealCookieBanner\Core::getInstance()
                            ->getConfigPage()
                            ->getUrl()
                    ) .
                    '#/settings/consent" target="_blank">',
                '</a>'
            )
        );
    }
    /**
     * Return a notice HTML for the customize description when age notice is deactivated.
     */
    public static function getAgeNoticeNotice() {
        return \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0px 0px;"><p>%s</p></div>',
            \sprintf(
                // translators:
                __(
                    'Age notice is currently disabled. Please navigate to %1$sSettings > Consent%2$s to activate it.',
                    RCB_TD
                ),
                '<a href="' .
                    esc_attr(
                        \DevOwl\RealCookieBanner\Core::getInstance()
                            ->getConfigPage()
                            ->getUrl()
                    ) .
                    '#/settings/consent" target="_blank">',
                '</a>'
            )
        );
    }
    /**
     * Return a notice HTML for the customize description when list-services notice is deactivated.
     */
    public static function getListServicesNotice() {
        return \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0px 0px;"><p>%s</p></div>',
            \sprintf(
                // translators:
                __(
                    'Naming of all services in first view is currently disabled. Please navigate to %1$sSettings > Consent%2$s to activate it.',
                    RCB_TD
                ),
                '<a href="' .
                    esc_attr(
                        \DevOwl\RealCookieBanner\Core::getInstance()
                            ->getConfigPage()
                            ->getUrl()
                    ) .
                    '#/settings/consent" target="_blank">',
                '</a>'
            )
        );
    }
    /**
     * Return a notice HTML for the customize description when RCB's Consent Forwarding is deactivated.
     */
    public static function getConsentForwardingCustomHostsNotice() {
        return \sprintf(
            '<div class="notice notice-info inline below-h2 notice-alt" style="margin: 10px 0px 0px;"><p>%s</p></div>',
            \sprintf(
                // translators:
                __(
                    'Consent Forwarding is currently disabled. Please navigate to %1$sSettings > Multisite / Consent Forwarding%2$s to activate it.',
                    RCB_TD
                ),
                '<a href="' .
                    esc_attr(
                        \DevOwl\RealCookieBanner\Core::getInstance()
                            ->getConfigPage()
                            ->getUrl()
                    ) .
                    '#/settings/multisite" target="_blank">',
                '</a>'
            )
        );
    }
    /**
     * Get the button default texts. The naming is a bit weird but it also returns texts
     * for headlines, age notice and content blocker.
     */
    public static function getDefaultButtonTexts() {
        $tempTd = \DevOwl\RealCookieBanner\comp\language\Hooks::getInstance()->createTemporaryTextDomain();
        $defaults = [
            'headline' => _x(
                'Privacy preferences',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'description' => \sprintf(
                '%s<br/><br/>%s',
                _x(
                    'We use cookies and similar technologies on our website and process your personal data (e.g. IP address), for example, to personalize content and ads, to integrate media from third-party providers or to analyze traffic on our website. Data processing may also happen as a result of cookies being set. We share this data with third parties that we name in the privacy settings.',
                    'legal-text',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                _x(
                    'The data processing may take place with your consent or on the basis of a legitimate interest, which you can object to in the privacy settings. You have the right not to consent and to change or revoke your consent at a later time. For more information on the use of your data, please visit our {{privacyPolicy}}privacy policy{{/privacyPolicy}}.',
                    'legal-text',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                )
            ),
            'acceptAll' => _x('Accept all', 'legal-text', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
            'acceptEssentials' => _x(
                'Continue without consent',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'acceptIndividual' => _x(
                'Set privacy settings individually',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'ePrivacyUSA' => _x(
                'Some services process personal data in the USA. By consenting to the use of these services, you also consent to the processing of your data in the USA in accordance with Art. 49 (1) lit. a GDPR. The USA is considered by the ECJ to be a country with an insufficient level of data protection according to EU standards. In particular, there is a risk that your data will be processed by US authorities for control and monitoring purposes, perhaps without the possibility of a legal recourse.',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'ageNoticeBanner' => _x(
                'You are under 16 years old? Then you cannot consent to optional services. Ask your parents or legal guardians to agree to these services with you.',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'ageNoticeBlocker' => _x(
                'You are under 16 years old? Unfortunately, you are not permitted to consent to this service to view this content. Please ask your parents or guardians to agree to the service with you!',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'listServicesNotice' => _x(
                'By accepting all services, you allow {{services}} to be loaded. These services are divided into groups {{serviceGroups}} according to their purpose (belonging marked with superscript numbers).',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'consentForwardingExternalHosts' => _x(
                'Your consent is also applicable on {{websites}}.',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'poweredBy' => self::getRandomPoweredByText(),
            // translators:
            'blockerHeadline' => _x(
                '{{name}} blocked due to privacy settings',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'blockerLinkShowMissing' => _x(
                'Show all services you still need to agree to',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'blockerLoadButton' => _x(
                'Accept required services and load content',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            ),
            'blockerAcceptInfo' => _x(
                'Loading the blocked content will adjust your privacy settings. Content from this service will not be blocked in the future. You have the right to revoke or change your decision at any time.',
                'legal-text',
                \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
            )
        ];
        $tempTd->teardown();
        return $defaults;
    }
    /**
     * Randomly get and set the powered-by text per WordPress installation.
     */
    public static function getRandomPoweredByText() {
        $weightedValues = \array_combine(
            // Array reverse to speed up algorithm performance of `getRandomWeightedElement`
            \array_reverse(self::getPoweredByLinkTexts()),
            \array_reverse(self::POWERED_BY_TEXTS_WEIGHTS)
        );
        return \DevOwl\RealCookieBanner\Utils::getRandomWeightedElement($weightedValues);
    }
    /**
     * Get the allowed "powered-by" texts so the user can choose a text.
     *
     * @param boolean $translate Translate the powered by texts by gettext
     */
    public static function getPoweredByLinkTexts($translate = \true) {
        if ($translate) {
            $tempTd = \DevOwl\RealCookieBanner\comp\language\Hooks::getInstance()->createTemporaryTextDomain();
            // Unfortunately we need to keep it redundant for the i18n-extractor :-(
            $defaults = [
                __(
                    'WordPress Cookie Plugin by Real Cookie Banner',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                __(
                    'WordPress Cookie Notice by Real Cookie Banner',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                __('Cookie Consent with Real Cookie Banner', \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED),
                __(
                    'GDPR Cookie Consent with Real Cookie Banner',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                __(
                    'Consent Management Platform by Real Cookie Banner',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                ),
                __(
                    'Cookie Consent Banner by Real Cookie Banner',
                    \DevOwl\RealCookieBanner\comp\language\Hooks::TD_FORCED
                )
            ];
            $tempTd->teardown();
        } else {
            $defaults = [
                'WordPress Cookie Plugin by Real Cookie Banner',
                'WordPress Cookie Notice by Real Cookie Banner',
                'Cookie Consent with Real Cookie Banner',
                'GDPR Cookie Consent with Real Cookie Banner',
                'Consent Management Platform by Real Cookie Banner',
                'Cookie Consent Banner by Real Cookie Banner'
            ];
        }
        return $defaults;
    }
    /**
     * Since 1.10: Moved the texts to the customizer, but keep for backwards-compatibility.
     *
     * @param array $revision
     * @param boolean $independent
     */
    public static function applyBlockerTextsBackwardsCompatibility($revision, $independent) {
        if ($independent && !isset($revision['banner']['customizeValuesBanner']['texts']['blockerHeadline'])) {
            $revision['banner']['customizeValuesBanner']['texts'] = \array_merge(
                $revision['banner']['customizeValuesBanner']['texts'],
                \DevOwl\RealCookieBanner\Core::getInstance()
                    ->getCompLanguage()
                    ->translateArray(
                        [
                            'blockerHeadline' => _x('{{name}} blocked due to privacy settings', 'legal-text', RCB_TD),
                            'blockerLinkShowMissing' => _x(
                                'Show all services you still need to agree to',
                                'legal-text',
                                RCB_TD
                            ),
                            'blockerLoadButton' => _x(
                                'Accept required services and load content',
                                'legal-text',
                                RCB_TD
                            ),
                            'blockerAcceptInfo' => _x(
                                'Loading the blocked content will adjust your privacy settings. Content from this service will not be blocked in the future. You have the right to revoke or change your decision at any time.',
                                'legal-text',
                                RCB_TD
                            )
                        ],
                        [],
                        null,
                        ['legal-text']
                    )
            );
        }
        return $revision;
    }
    /**
     * Delete the already known, randomly selected powered-by text and regenerate it.
     *
     * @param string|false $installed
     */
    public static function new_version_installation_after_2_6_5($installed) {
        if ($installed && \version_compare($installed, '2.6.5', '<=')) {
            delete_option(self::SETTING_POWERED_BY_TEXT);
        }
    }
}
