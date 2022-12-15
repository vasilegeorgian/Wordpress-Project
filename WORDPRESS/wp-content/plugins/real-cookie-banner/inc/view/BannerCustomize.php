<?php

namespace DevOwl\RealCookieBanner\view;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\AbstractCustomizePanel;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\view\customize\banner\BasicLayout;
use DevOwl\RealCookieBanner\view\customize\banner\BodyDesign;
use DevOwl\RealCookieBanner\view\customize\banner\CustomCss;
use DevOwl\RealCookieBanner\view\customize\banner\Decision;
use DevOwl\RealCookieBanner\view\customize\banner\Design;
use DevOwl\RealCookieBanner\view\customize\banner\FooterDesign;
use DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign;
use DevOwl\RealCookieBanner\view\customize\banner\individual\Group;
use DevOwl\RealCookieBanner\view\customize\banner\individual\Layout;
use DevOwl\RealCookieBanner\view\customize\banner\Legal;
use DevOwl\RealCookieBanner\view\customize\banner\Texts;
use DevOwl\RealCookieBanner\view\customize\banner\Mobile;
use DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton;
use DevOwl\RealCookieBanner\view\customize\banner\individual\Texts as IndividualTexts;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Customize cookie box in customize. Conditional UI is implemented in `others/conditionalBanner.tsx`.
 */
class BannerCustomize extends \DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\AbstractCustomizePanel {
    use UtilsProvider;
    const NEEDED_CAPABILITY = \DevOwl\RealCookieBanner\Core::MANAGE_MIN_CAPABILITY;
    const PANEL_MAIN = 'real-cookie-banner-banner';
    const TRANSLATE_SECTIONS = ['texts', 'individualTexts', 'legal'];
    /**
     * C'tor.
     */
    public function __construct() {
        parent::__construct(self::PANEL_MAIN, 'banner');
    }
    // Documented in AbstractCustomizePanel
    public function enableOptionsAutoload() {
        parent::enableOptionsAutoload();
        $comp = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        $adminDefaultLegalTexts = \DevOwl\RealCookieBanner\view\customize\banner\Legal::getDefaultTexts();
        $adminDefaultTextsBanner = \DevOwl\RealCookieBanner\view\customize\banner\Texts::getDefaultButtonTexts();
        $adminDefaultTextsBannerIndividual = \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::getDefaultButtonTexts();
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT_LABEL,
            $adminDefaultLegalTexts['imprint']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_IMPRINT_EXTERNAL_URL,
            '',
            \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption::DEFAULT_USE_NON_EMPTY_FROM_OTHER_LANGUAGES
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY_LABEL,
            $adminDefaultLegalTexts['privacyPolicy']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Legal::SETTING_PRIVACY_POLICY_EXTERNAL_URL,
            '',
            \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption::DEFAULT_USE_NON_EMPTY_FROM_OTHER_LANGUAGES
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_HEADLINE,
            $adminDefaultTextsBanner['headline']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_DESCRIPTION,
            $adminDefaultTextsBanner['description']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_ALL,
            $adminDefaultTextsBanner['acceptAll']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_ESSENTIALS,
            $adminDefaultTextsBanner['acceptEssentials']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_ACCEPT_INDIVIDUAL,
            $adminDefaultTextsBanner['acceptIndividual']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_EPRIVACY_USA,
            $adminDefaultTextsBanner['ePrivacyUSA']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_AGE_NOTICE,
            $adminDefaultTextsBanner['ageNoticeBanner']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_AGE_NOTICE_BLOCKER,
            $adminDefaultTextsBanner['ageNoticeBlocker']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_LIST_SERVICES_NOTICE,
            $adminDefaultTextsBanner['listServicesNotice']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_CONSENT_FORWARDING,
            $adminDefaultTextsBanner['consentForwardingExternalHosts']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_HEADLINE,
            $adminDefaultTextsBanner['blockerHeadline']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_LINK_SHOW_MISSING,
            $adminDefaultTextsBanner['blockerLinkShowMissing']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_LOAD_BUTTON,
            $adminDefaultTextsBanner['blockerLoadButton']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SETTING_BLOCKER_ACCEPT_INFO,
            $adminDefaultTextsBanner['blockerAcceptInfo']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_HEADLINE,
            $adminDefaultTextsBannerIndividual['headline']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_DESCRIPTION,
            $adminDefaultTextsBannerIndividual['description']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_SAVE,
            $adminDefaultTextsBannerIndividual['save']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_SHOW_MORE,
            $adminDefaultTextsBannerIndividual['showMore']
        );
        new \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\LanguageDependingOption(
            $comp,
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SETTING_HIDE_MORE,
            $adminDefaultTextsBannerIndividual['hideMore']
        );
    }
    // Documented in AbstractCustomizePanel
    public function localizeValues($skipControlClasses = []) {
        return $this->translateArray(parent::localizeValues($skipControlClasses), 'customizeValuesBanner');
    }
    /**
     * Expand localize values by e.g. header logo dimensions. This is not needed for the
     * customize nor export, but for the frontend to fit Web Vitals.
     *
     * It also disables the footer link if our license server orders this.
     *
     * @param array $values Result of `localizeValues`
     */
    public function expandLocalizeValues(&$values) {
        $headerDesign = &$values['customizeValuesBanner']['headerDesign'];
        $logoMaxHeight = $headerDesign['logoMaxHeight'];
        foreach (['logo', 'logoRetina'] as $logoKey) {
            if (!empty($headerDesign[$logoKey])) {
                $logoUrl = $headerDesign[$logoKey];
                $file_ext = \strtolower(\pathinfo($logoUrl, \PATHINFO_EXTENSION));
                $attachment_id = attachment_url_to_postid($logoUrl);
                $image = wp_get_attachment_image_src($attachment_id, 'full');
                if ($image !== \false) {
                    list(, $width, $height) = $image;
                    if ($height > 0) {
                        // avoid "Division by zero"
                        $dimensionKey = $logoKey . 'FitDim';
                        $headerDesign[$dimensionKey] = [($logoMaxHeight / $height) * $width, $logoMaxHeight];
                        if ($logoKey === 'logo' && $file_ext === 'svg') {
                            $headerDesign['logoRetina'] = $headerDesign['logo'];
                            $headerDesign['logoRetinaFitDim'] = $headerDesign[$dimensionKey];
                        }
                        // Expand alt text
                        $alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', \true);
                        if (!empty($alt) && !isset($headerDesign['logoAlt'])) {
                            $headerDesign['logoAlt'] = $alt;
                        }
                    }
                }
            }
        }
        $footerDesign = &$values['customizeValuesBanner']['footerDesign'];
        if ($this->isPoweredByLinkDisabledByException()) {
            $footerDesign['poweredByLink'] = \false;
        } elseif ($footerDesign['poweredByLink'] === \false && !$this->isPro()) {
            $footerDesign['poweredByLink'] = \true;
        }
    }
    // Documented in AbstractCustomizePanel
    public function localizeDefaultValues($skipControlClasses = []) {
        return $this->translateArray(parent::localizeDefaultValues($skipControlClasses), 'customizeDefaultsBanner');
    }
    /**
     * Translate the banner array with the help of `translateArray`.
     *
     * @param array $customizeValues
     * @param string $mapKey Can be `customizeDefaults` or `customizeValuesBanner`
     */
    protected function translateArray($customizeValues, $mapKey) {
        $compLanguage = \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
        foreach (self::TRANSLATE_SECTIONS as $key) {
            $customizeValues[$mapKey][$key] = $compLanguage->translateArray($customizeValues[$mapKey][$key], [], null, [
                'legal-text'
            ]);
        }
        return $customizeValues;
    }
    // Documented in AbstractCustomizePanel
    protected function getPanelArgs() {
        return ['title' => __('Cookie Banner', RCB_TD), 'description' => __('Design your cookie banner.', RCB_TD)];
    }
    // Documented in AbstractCustomizePanel
    public function resolveSections() {
        return [
            \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\BasicLayout())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\Decision::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\Decision())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\Legal::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\Legal())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\Design::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\Design())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\HeaderDesign())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\BodyDesign())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\FooterDesign::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\FooterDesign())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\Texts::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\Texts())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Layout::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\individual\Layout())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Group::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\individual\Group())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\individual\SaveButton())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\individual\Texts())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\Mobile::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\Mobile())->args(),
            \DevOwl\RealCookieBanner\view\customize\banner\CustomCss::SECTION => (new \DevOwl\RealCookieBanner\view\customize\banner\CustomCss())->args()
        ];
    }
    // Documented in AbstractCustomizePanel
    protected function sectionDefaults() {
        return ['capability' => self::NEEDED_CAPABILITY];
    }
    // Documented in AbstractCustomizePanel
    protected function settingDefaults() {
        return ['type' => 'option', 'transport' => 'postMessage'];
    }
    /**
     * Check if powered-by link is disabled through our license server.
     */
    public function isPoweredByLinkDisabledByException() {
        $activation = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getRpmInitiator()
            ->getPluginUpdater()
            ->getCurrentBlogLicense()
            ->getActivation();
        if ($activation->getReceivedClientProperty('rcbDisablePoweredBy') === 'true') {
            return \true;
        } elseif (empty($activation->getCode())) {
            // Check offline map
            $host = \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils::getCurrentHostname();
            if (
                !empty($host) &&
                \function_exists('hash') &&
                \in_array(
                    \substr(\hash('sha256', 'LAQ%&^dwUCbHX1fI$89EeFlCxZ8tYXLA' . $host), 0, 13),
                    // prettier-ignore
                    ['97c6d0f2d9057', '5efc1df4cec8a', 'bc44e506cd9bc', '05f5e3c8e0fc6', 'a61c3f5d4ff73', 'e15f40f8794b7', 'ff88cd49109fa', '01756c827de40', '7b75f47cc1fb6', '1a79435ace736', '995ec24c19fe0', 'ef057c2175b94', 'c5f24fb4f74db', 'd320449287478', 'ccba9618b131f', '733245bc304ae', 'ed8dc872cc923', '3f873ea04f143', '081c7e86b8621', '0e843294aaa59', 'ae5fcf377347a', 'ee7f2e22c5143', 'be10a7a6ca787', '44f77b50d4d7d', 'e35c368b2b63d', 'c5295ed1ebd4e', '7dfb073287c9d', '6b3a5a54843ba', 'd01f0ef2dfcb7', '44ce97abf3b01', 'd0bd5fd52695b', 'f3965a1973c95', 'ab2f05725d082', 'cf6bc49255da5', 'e5dd174e2dc4d', '49d51a7324d27', '0db99e3ed4768', 'a8b588265b94f', 'e703e251d8623', '9a34a738222fe', '4d24168ff43d9', 'fc7cbe78bb50e', 'b7ca952882b18', '06387e16092f4', '295979337eb5b', '5d213e2441d3b', '76d3cb2210259', '613253349aa77', 'cbb312e5dc035', '3a342098b20e3', 'f156591833726', '44b3b88600d4d', '2c3add3ab8893', 'c7e7b4291e538', '7ff82c7bfb6d5', '19a32ca94f3da', '1dc7de9c7e3e0', '8745ad151f019', '95f3140357968', 'd64b3e3290933', 'a67f4187a0759', 'ab17a79181a73', '982660176a206', '32b259167515d', '04f060e086c3a', '980b4d46ca70e', '4c86101d9c571', '627d42b473b29', 'fbec9c21dd094', 'b22fee3b99418', '2a4e77bfec9aa', '78060ddcb192d', 'ab604fbbdc920', '9d55971f4d1f2', '16b17f6009005', 'd73678d1a0980', 'cc2ead8b2d48e', '85b05544fbbb2', '6c60bab27f34f', '0eae7b1e0f25e', 'd18eafa44503d', 'bbb981d30c49f', '6f70cb91d18b0', 'ddd786e73bebf', 'a6da8de130ce5', '9fd3073399cba', '9fdfae9fc240e', 'cfaf5fee097d2', '861ec3d465a80', 'b1ee046302f93', 'a63cec34e84a8', '63f12de75c15b', '9ebe9bbe105ed', 'e8e82e9682bbc', '7d3784ff1a192', 'eee9848a2853e', 'fbaea22d19034', 'aebd1b756f001', '668c6730c1055', 'e7c54b29a080d', '563ef56ea6866', 'e7091fed7c9ef', '551c6821836e3', 'f7c719a09e699', '1231ee45e9595', '6d16c716afb22', '987a5267c0b37', '5ed9d26fc7710', '70c3a0b275576', '7839572c07676', 'af17f8f0d7dcc', 'cdc5534e75a2e', 'a80510ca3c8d0', '8b139388de527', '46d9ca0bb0598', '7653a763b4571', '558d1a7602df6', '657ebf3e1560b', '1f896990be257', 'e3c66ef322323', '4e01179ea7acf', 'cd87e3a513d7a', '34dd3546af646', 'cf253d61eaa01', 'dfc073a5b8f23', 'ee65a10563b99', 'b827c02e8de71', '4cb5a392d3a72', '5b6c4f191871e', 'aeb32cb9e2fd0', 'd4e73a944b9c0', '703a0db1576a3', '28f09969bad5b', 'ee42caa338e6d', '92f6ba77b0c5f', 'b61ea3a6c3383', '0917cf1a8e6f8', '19bcc9e27a9b4', '05831156578e0', 'b19d8fc45bf40', 'ddccc665f6c18', '17e0df1cf2288', 'e2edd8fd7151a', 'd2d8af9ecbac0', '1923c63603d8f', 'b96198915cdf4', '4ab2437da8e2a', 'bcc237d61f9b3', 'da38cbbf41d8e', 'baffe184077c1', '35902166dcac1', '4715b6dd0f9a2', '3b087e9f5c643', 'c1fe868fe958f', '266fc518bdd32', 'ad985bb7d53e8', '3c9816c40f866', '05abc1d36e413', 'a6d2d8fe53c54', '68de0dbeb1950', '5320cb490816c', '1aa2adf62ba3f', 'de2e81c8b09e7', '51b50edcb77fb', '6c956e9ee6c0a', '4de4f0698da81', '98ccd3232246a', '9e609c4fff22d', 'cafe9785cefb1', '0ff2d275ecec7', '636c2d54234f1', '83f96c0ac2b9b', '9bfab40b7dda5', 'd53651d0ef9e4', 'b04e9303a63c1', 'a9d7328f63ebc', 'ccf36bd1fe87e', '2772a7c803dde', '1c88eade55e50', '7c163b64eaeb4', 'ec18019ebcc34', 'a0d22e2fce2c3', '6916a3668afaf', '6d51480bdbaae', '99d863cf72d19', '278f92051cf64', '398e40d05702f', 'f8c973e675b05', '66ea2beeb88c5', '96879d0e156f9', 'b4f9fc7509359', '3c6d359735dee', '47802f85f1344', '5144d95702c98', '52e3dedaa1a30', 'd1c10df1d0641', 'f2fb2b4bd0ca1', 'de38e8b53b886', '9da48f9bf19c5', '0171121e14750', '39729b25ad2c7', 'e0e590a639296', 'c124348c96ef9', '8ce8dc22859fb', 'eed1e260727f8', '6d5363047c59f', 'ccb9264d3177d', 'ccad4af4183c9', 'e6bef77ef741a', '974f6dc47d949', 'c938705bcdcb3', '284f61c9c6fa2', '443ee59ee5756', 'e4de5ec4381de', 'e94f14c0e6946', '1b5ed8ba8bfdb', 'fda74c2cd8a5a', '14e83ea5c36ca', '0d7d553f18544', 'e564b0be7cf1f', 'd67751f9abcfe', 'bd1812cc7e01f', '9f26efe2410f4', 'e1fb232010c0b', '7d9e4b02a3e94', '12f6331fd2dbf', 'e8bc00ca2321f', '91cc645641b33', '31caaedd34ee3', 'e142ac706d3ff', 'b56c8bb53075c', 'b53af8107e6da', '54c9f8da355e4', '214983b7b2525', 'dcbdaf2a1f196', '746c96c7fe316', 'd989846ab6fa4', 'e6f915b95fe9b', '0ffea8bc70b85', 'dd8eb330b2b1b', 'ca3fb41e6e38b', '36e9b5d6aa397', '3b319f347645c', '600d9a3579977', 'aaabdce812331', '390e49ccd9b08', '9f0778e790f9b', 'd77a969945b84', 'aa2ae007ad6ce', '0f9398ec13ed1', '7dff5c7dcd7bd', 'dea018c7c4948', 'b6de4d4f271d6', '1e5df2e167056', 'e8bd2f1ff0144', '97e887079e96b', 'c171179943c98', '7a6d93d434290', 'b1c8e7ddcad0e', 'eefa1ca79aed6', '6d5755a9b910a', 'fb814fd142ef1', 'fcfbc97fdc098', 'a00ab3b4d4595', 'feebbbf4b08de', '11656c86726c2', '85881c0588d1f', 'a6da8de130ce5', '861ec3d465a80', 'ad985bb7d53e8', '29120cb5d1e99', 'c28c4bc462a61', 'e7df7153eca5d', '52e391cd96295', '4c9f127418423', 'dc981dbebbfac', 'c89ba18655452', '13928ca3279d5', 'a33fbc042d489', 'bc9720c052b08', 'e844bb876b9ae', '7cbda586be140', 'e5f7d817f4d9b', '862c2ca2f50d0', 'bd5aea3c1eed8', 'b19d8fc45bf40', '4d24168ff43d9', 'd7a0692420395', '44ce97abf3b01', '2562cb684f3f2', '3a342098b20e3', '8745ad151f019', '5d2db3dcd353b', 'c30ea66c4d1ca', 'a3232d0c71d7f', '1a79435ace736', '2f97f2f836b33', '3befab7ccc441', 'bcde70c7b5299', '6584d3179968a', '32b259167515d', '87a6f533dd277', '78060ddcb192d', 'b2e2d034d3539', 'f4f3c5a2dde50', 'fea989240d3e2', '93b9bf83c692d', '116c0e8f8de3b', 'a4f982d30ebe7', 'fd9d6f9fa5dbe', 'b77022b2c05ca', '4f10cf6a32ae8', '82c73cc3166b1', 'db5329a8b3146', '9e5c2e7c16141', '443ee59ee5756', '6d1f3f6d606de', 'af17f8f0d7dcc', 'c7842c58a82ae', '4cb5a392d3a72', 'ee42caa338e6d', 'cc75da363a07f', 'b61ea3a6c3383', 'fc9eb88b07ecc', '549ecc1ed2b9b', '929fd11bf082e', '3b087e9f5c643', '6287af8187ab6', 'c124ffcbed7bd', '4f84730cbf39b', '0920420a8da3f', 'fee754cc64804', '7dfb073287c9d', '8028a58b05ee0', '0860cba722584', 'fc7cbe78bb50e', 'b7c57c312358e', '88b6dba6a72be', 'b7ca952882b18', '3c45589b4097e', '295979337eb5b', '44b3b88600d4d', '31a60ff99970d', '2fea316310bec', 'fbec9c21dd094', '0975472e17726', 'bf3f03ccc8852', '34dd3546af646', '9d49e060d1a83', 'ff0fad82aeca9', '6d9fb3304eff4', 'b21dfc02bd4da', 'f999576847975', '358f01da0d160', '23fbfb54e2e94', 'bd388c8df0d2d', 'b40d68f010090', 'cb1ed5699c916', 'eca27f54ee866', '19acfaa4ee4bf', '0e17a8056c892', 'd612c30a10013', '0eaceb3b2b23c', '6f70cb91d18b0', 'bc44e506cd9bc', 'd4a5ceb386552', 'cfaf5fee097d2', '8a3ffc08c6db3', 'dd96e39866052', 'd10ecdadfaf9e', '5b9398bec4788', '5454eb58208a2', '2cd1e30120e60', 'da38cbbf41d8e', '7b75f47cc1fb6', 'c87830da5c811', '156f96d8d9d9b', '1e1c5fb7871e9', '530a6767e8a60', '92f6ba77b0c5f', '87a352f335a44', '4e5c81edb954d', 'ed4066a9b920c', 'e35c368b2b63d', '6992d288f26ad', '5ae5818a8294a', '3a16e84d5065e', '2aaa1d0096991', '98a6b5e3a39d0', 'd18eafa44503d', 'b0e1771f4d8d5', 'd279f95799ec0', '67444be6fd003', 'fbaea22d19034', 'aebd1b756f001', '5ec7fe7022a10', 'da1963fbc8320', '0a279abdec707', 'e15f40f8794b7', 'bcc237d61f9b3', '35902166dcac1', '1a15a32c9ef79', 'aa0cd01514cb2', '14a7c6d435691', '84c16eaf11d4a', '85b05544fbbb2', '21142fce9345f', 'c72e18ae2b081', '4a13965a3a022', 'dbc5d30674a85', '0ce1eb0da0221', '87ba4d63eec61', '837f93af4e7a9', 'a0fe5bccf8d7b', 'ff5216c4468b0', '5b97ba5f3cf57', 'f3a6870bdcd41', '2a4e77bfec9aa', '54a6f5651a6d0', '16b17f6009005', '284f61c9c6fa2', 'a235ca528bf39', 'b157c305272ef', 'f54e45e66d780', '06258796bcc2b', '3d9052bfbc2e3', '41796a4f04d51', '63fb762054875', 'bec458082dc3b', '3ded99133c1cb', '08e09fa1c51ca', '0f73d51111c80', 'c69bf340c97b1', 'e73893399dbb8', 'f72f5b4060ee2', '1c10512471907', '0764b2b32a946', '5101890a1c391', '01e63c6ac5cd3', '661381294bad0', '87bba2161dc70', 'bd1734bfe8aa6', 'a4eff392ee018', 'ecdc8a1dee80d', '664e41334d03a', '4fa885654503c', 'b4e23fe479a13', '6b49fff8b71e9', '07a05dcdf430e', '41dd683475616', 'b22a22c358e1e', 'e7fe88c1c3db2', 'd40dd9d8e71f1', '341da80b7b997', 'c60eaa52e1153', '6b4463c87019e', '0b3ff60dc92ec', '348300fd09e23', '18ec63850d50c', '3382477879d0d', '97f4be423e3b9', '04afd808a47c1', '2442322448be3', 'b8cf2aa69062f', 'e8b93991c646e', '479d01a3f4281', '4e346a15c6488', '2bfd75c146359', '14e4661173514', 'a44187e9cd3c1', 'b93b72221df8e', 'b3fccbc9877cf', 'bc30a25c1279c', '79dbdaea747d2', 'f5d3c8dacae34', '23affd3dc299b', '8fe4360b4c8f8', '37a01665bc515', '96987682d1725', 'f1b21c8366299', '3f48e49c6a38b', 'ba6b4e92034dd', 'f36d5b97ab73e', '1331907ede921', '8740df7c4cbd1', '0d852bd3a2dca', '4be60624bcc1c', 'f08fd4929e616', 'c5a2c54658b00', '88b296f4ddc27', '3510d6d13246d', 'e6920407cdc4e', 'be441a94500a0', '27f0e0f6517d3', 'e4ec644d32590', '5b857b1409a04', '88dab3be491a5', '657c90053a91e', 'a516065851172', 'f44a3eda37334', 'e7270780e6074', '34c50c0fa86da', 'cfed499e65719', 'cb92e4ad1848d', '484b7eb3091a6', 'e6810413c8888', '2705f41ac5316', '009bca98d482b', 'ce37372f45563', '205fc74886e22', 'cab52aa3a5c0d', '444884c913db7', '6a366bb12b35c', '0ac8ed7bd0eee', '259fcb23c1948', '6355556c57866', '1eb3f3f3acc1a', 'a3492b9f6af33', '19b0676f14b04', 'b5606f34bbea3', '2ef47b7dc186c', '6b5d06f23c13e', '832744b828880', '14996ea0c3aed', 'f38d89db6652a', '650d09878d5ac', 'fe35a67becb71', '717bc7ae14b0d', 'a488e5a41b260', '20d85736ff343', '4590cfe73c5f7', '3b640af2fbb15', '5c33cb55b8a45', '263b0d012b420', 'dee72cf60487f', 'f85cf70707091', '42ba6a1ad1b93', '39e1f3e47ade5', '24e47a4c23c55', 'b3809ead9be5c', 'e52bf22566e63', '54692f73f61f2', '0a090233a495f', 'f9ab2894f3603', '02cfd40881848', 'f96fd9bbf3008', 'f8d18dabdc349', 'a1ebb27d45509', '124d3b0d70804', '2010fcdb69795', 'fd042f4d4f4c8', '07fd6c2eb349d', 'b54e21bf465ff', 'c93865dc8ceff', '971190b5d0084', 'e9d03cfaea3d6', '6c1399401ec82', 'c5c34d1b986cf', '406442a11fc5a', 'cc043b51e1e8f', '0b73c007d5d58', 'f1fea1a25bd2a', 'db4f8665536e5', 'ac480fd12dc7f', 'acb7309a0318f', 'e6213b744f001', 'c18be36b71346', 'a3d553193fe72', '56f0228c9eacc', '1a202b7765f97', '2441c26ff87f9', '9cbcd9ec9d853', '355a797ca688c', 'bde5d6a13acf4', '413d9f2dfe93c', 'ece0f89417f47', '3c3709e07be2f', 'fe2ee6ed79bce', 'ba1a1df441937', 'f2a75c3fd2111', '30cbe1a547eac', 'd0607cef22daa', '2653df49ac267'],
                    \true
                )
            ) {
                return \true;
            }
        }
        return \false;
    }
    /**
     * New instance.
     *
     * @codeCoverageIgnore
     */
    public static function instance() {
        return new \DevOwl\RealCookieBanner\view\BannerCustomize();
    }
}
