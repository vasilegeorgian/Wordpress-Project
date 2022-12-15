<?php

namespace DevOwl\RealCookieBanner\comp\language;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractOutputBufferPlugin;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractSyncPlugin;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\TemporaryTextDomain;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\Localization;
use DevOwl\RealCookieBanner\settings\Blocker;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use DevOwl\RealCookieBanner\settings\Revision;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Language specific action and filters for Real Cookie Banner.
 */
class Hooks {
    const TD_FORCED = RCB_TD . '-forced';
    /**
     * See `self::getActiveMinimalTranslations`.
     */
    const MINIMAL_TRANSLATION_CODES = [
        'fr_FR',
        'fr_BE',
        'fr_CA',
        'it_IT',
        'pl_PL',
        'ro_RO',
        'nl_BE',
        'nl_NL_formal',
        'nl_NL',
        'tr_TR',
        'ru_RU',
        'bg_BG',
        'cs_CZ',
        'da_DK',
        'sv_SE',
        'fi',
        'el',
        'pt_BR',
        'pt_PT',
        'es_AR',
        'es_CL',
        'es_CO',
        'es_CR',
        'es_ES',
        'es_GT',
        'es_MX',
        'es_PE',
        'es_UY',
        'es_VE'
    ];
    /**
     * Singleton instance.
     *
     * @var Hooks
     */
    private static $me = null;
    /**
     * Custom hints for multilingual.
     *
     * @param array $hints
     */
    public function hints($hints) {
        $compLanguage = $this->compInstance();
        if ($compLanguage->isActive()) {
            if ($compLanguage instanceof \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractSyncPlugin) {
                $hints['deleteCookieGroup'][] = __(
                    'If you delete a service group, it will not be deleted in other languages.',
                    RCB_TD
                );
                $hints['deleteCookie'][] = __(
                    'If you delete a service, it will not be deleted in other languages.',
                    RCB_TD
                );
            }
            $hints['export'][] = __('The export contains only data from the current language.', RCB_TD);
        }
        $activeMinimalTranslations = $this->getActiveMinimalTranslations();
        if (\count($activeMinimalTranslations) > 0) {
            $hints['dashboardTile'][] = [
                'title' => 'ℹ ' . __('Incomplete translation', RCB_TD),
                'description' => \sprintf(
                    // translators:
                    __(
                        'Real Cookie Banner is not yet fully available in your configured language (<strong>%s</strong>). However, you can translate all the untranslated texts displayed to your visitors in the cookie banner by yourself in the Real Cookie Banner settings.',
                        RCB_TD
                    ),
                    \join(', ', \array_values($activeMinimalTranslations))
                )
            ];
        }
        return $hints;
    }
    /**
     * In `src/languages-local` we provide a set of minimal translations for texts needed in
     * the frontend of Real Cookie Banner. All other texts are translateable through our UI and customizer.
     */
    public function getActiveMinimalTranslations() {
        $result = [];
        $compLanguage = $this->compInstance();
        $activeLanguages = [];
        if ($compLanguage->isActive()) {
            $activeLanguages = $compLanguage->getActiveLanguages();
            $activeLanguagesTranslated = \array_map([$compLanguage, 'getTranslatedName'], $activeLanguages);
            $activeLanguages = \array_map([$compLanguage, 'getWordPressCompatibleLanguageCode'], $activeLanguages);
            $activeLanguages = \array_combine($activeLanguages, $activeLanguagesTranslated);
        } else {
            $locale = get_locale();
            require_once ABSPATH . 'wp-admin/includes/translation-install.php';
            $translations = wp_get_available_translations();
            $activeTranslation = $translations[$locale] ?? null;
            $activeLanguages[$locale] =
                $locale === 'en_US'
                    ? 'English (United States)'
                    : ($activeTranslation === null
                        ? $locale
                        : $activeTranslation['native_name']);
        }
        foreach ($activeLanguages as $code => $name) {
            if (\in_array($code, self::MINIMAL_TRANSLATION_CODES, \true)) {
                $result[$code] = $name;
            }
        }
        return $result;
    }
    /**
     * Query arguments `lang`.
     *
     * @param array $arguments
     */
    public function queryArguments($arguments) {
        if ($this->compInstance()->isActive() && empty($arguments['lang'])) {
            $arguments['lang'] = $this->compInstance()->getCurrentLanguage();
        }
        return $arguments;
    }
    /**
     * Create temporary text domain.
     */
    public function rest_api_init() {
        $this->createTemporaryTextDomain();
    }
    /**
     * Modify query for REST queries.
     *
     * @param array $args Key value array of query var to query value.
     */
    public function rest_query($args) {
        return \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments($args, 'restQuery');
    }
    /**
     * Create a temporary text domain of the current language.
     */
    public function createTemporaryTextDomain() {
        return \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\TemporaryTextDomain::fromPluginReceiver(
            self::TD_FORCED,
            RCB_TD,
            \DevOwl\RealCookieBanner\Core::getInstance(),
            $this->compInstance(),
            \DevOwl\RealCookieBanner\Localization::class
        );
    }
    /**
     * Add the current language code as independent context.
     *
     * @param array $contexts
     */
    public function context($contexts) {
        if ($this->compInstance()->isActive()) {
            $contexts['lang'] = $this->compInstance()->getCurrentLanguage();
        }
        return $contexts;
    }
    /**
     * Translate language context to human readable form.
     *
     * @param string $context
     */
    public function contextTranslate($context) {
        return $this->compInstance()->isActive()
            ? \preg_replace_callback(
                '/lang:([A-Za-z_]+)/m',
                function ($m) {
                    $languageCode = $m[1];
                    $translatedName = $this->compInstance()->getTranslatedName($languageCode);
                    return __('Language', RCB_TD) . ': ' . (empty($translatedName) ? $languageCode : $translatedName);
                },
                $context,
                1
            )
            : $context;
    }
    /**
     * A new revision was requested, let's recreate also for other languages.
     *
     * @param array $result
     */
    public function revisionHash($result) {
        if ($this->compInstance()->isActive()) {
            // Temporarily disable this filter
            remove_filter('RCB/Revision/Hash', [$this, 'revisionHash']);
            $currentLanguage = $result['revision']['lang'];
            $result['additionalLangHashRecreation'] = [];
            foreach ($this->compInstance()->getActiveLanguages() as $activeLanguage) {
                if ($activeLanguage !== $currentLanguage) {
                    // Switch to that language context and recreate hash
                    $this->compInstance()->switch($activeLanguage);
                    $langRevision = \DevOwl\RealCookieBanner\settings\Revision::getInstance()->create(\true);
                    $result['additionalLangHashRecreation'][$activeLanguage] = $langRevision;
                }
            }
            // Restore language back
            $this->compInstance()->switch($currentLanguage);
            // Enable filter again
            add_filter('RCB/Revision/Hash', [$this, 'revisionHash']);
        }
        return $result;
    }
    /**
     * Check if any of the other languages needs a revision retrigger. This is only relevant
     * for output buffer multilingual plugins (e.g. TranslatePress).
     *
     * @param boolean $needs_retrigger
     */
    public function revisionNeedsRetrigger($needs_retrigger) {
        $compLanguage = $this->compInstance();
        if (
            $needs_retrigger === \false &&
            $compLanguage instanceof \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractOutputBufferPlugin
        ) {
            $found = \false;
            $compLanguage->iterateOtherLanguagesContext(function () use (&$found) {
                $revision = \DevOwl\RealCookieBanner\settings\Revision::getInstance()->getCurrent();
                if ($revision['public_to_users'] !== $revision['calculated']) {
                    $found = \true;
                }
            });
            return $found;
        }
        return $needs_retrigger;
    }
    /**
     * Modify option value for imprint id so it gets correctly resolved to the current language post id.
     *
     * @param string $value
     */
    public function revisionOptionValue_pageId($value) {
        if ($this->compInstance()->isActive() && !empty($value) && \is_numeric($value)) {
            return $this->compInstance()->getCurrentPostId($value, 'page');
        }
        return $value;
    }
    /**
     * Modify content blocker `cookies` / `tcfVendors` meta field to match the translated post ids.
     *
     * @param string $meta_value
     * @param int $from Object id of source language item
     * @param int $to Object id of destination language item
     * @param string $locale
     */
    public function copy_blocker_cookies_meta($meta_value, $from, $to, $locale) {
        if ($this->compInstance()->isActive() && !empty($meta_value)) {
            $ids = [];
            foreach (\explode(',', $meta_value) as $currentId) {
                $translationId = $this->compInstance()->getCurrentPostId(
                    $currentId,
                    \DevOwl\RealCookieBanner\settings\Blocker::CPT_NAME,
                    $locale
                );
                if ($translationId > 0 && \intval($translationId) !== \intval($currentId)) {
                    $ids[] = $translationId;
                }
            }
            return \join(',', $ids);
        }
        return $meta_value;
    }
    /**
     * Get all languages within a `AbstractSyncPlugin` (like WPML or PolyLang) which
     * does currently not hold any essential group. This is necessary e.g. to copy
     * content to newly added languages.
     */
    public function getLanguagesWithoutEssentialGroup() {
        $compLanguage = $this->compInstance();
        if ($compLanguage instanceof \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractSyncPlugin) {
            $result = [];
            $compLanguage->iterateAllLanguagesContext(function ($locale) use (&$result) {
                if (\DevOwl\RealCookieBanner\settings\CookieGroup::getInstance()->getEssentialGroupId() === null) {
                    $result[] = $locale;
                }
            });
            return $result;
        }
        return [];
    }
    /**
     * Get compatibility language instance.
     */
    protected function compInstance() {
        return \DevOwl\RealCookieBanner\Core::getInstance()->getCompLanguage();
    }
    /**
     * Get singleton instance.
     *
     * @return Hooks
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\comp\language\Hooks()) : self::$me;
    }
}
