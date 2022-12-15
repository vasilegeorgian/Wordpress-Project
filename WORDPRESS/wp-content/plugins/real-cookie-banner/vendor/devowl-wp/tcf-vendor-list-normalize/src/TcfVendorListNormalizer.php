<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\AbstractLanguagePlugin;
use DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\None;
use WP_Error;
/**
 * Factory to prepare installation of database tables, provide a downloader
 * and normalize automatically to database.
 */
class TcfVendorListNormalizer {
    private $dbPrefix;
    private $endpoint;
    private $fetchQueryArgs;
    /**
     * Downloader.
     *
     * @var Downloader
     */
    private $downloader;
    /**
     * Persist instance.
     *
     * @var Persist
     */
    private $persist;
    /**
     * Query instance.
     *
     * @var Query
     */
    private $query;
    /**
     * See AbstractLanguagePlugin;
     *
     * @var AbstractLanguagePlugin
     */
    private $compLanguage;
    /**
     * C'tor.
     *
     * @param string $dbPrefix Prefix for the database table to keep isolated per-plugin
     * @param string $endpoint The endpoint where `vendor-list.json` and `purposes-de.json` can be appended
     * @param AbstractLanguagePlugin $compLanguage
     * @param array $fetchQueryArgs Additional query parameters, e.g. license key
     */
    public function __construct($dbPrefix, $endpoint, $compLanguage = null, $fetchQueryArgs = []) {
        $this->dbPrefix = $dbPrefix;
        $this->endpoint = $endpoint;
        $this->compLanguage = $compLanguage;
        $this->fetchQueryArgs = $fetchQueryArgs;
        $this->init();
    }
    /**
     * Initialize the factory with further classes.
     */
    protected function init() {
        $this->downloader = new \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader($this);
        $this->persist = new \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist($this);
        $this->query = new \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Query($this);
    }
    /**
     * Update the vendor list in database (fetch vendor list + translations and persist).
     *
     * @return WP_Error|true
     */
    public function update() {
        // Download the complete vendor list
        $downloader = $this->getDownloader();
        $persist = $this->getPersist();
        $endpoint = trailingslashit($this->getEndpoint());
        $fetchQueryArgs = $this->getFetchQueryArgs();
        $compLanguage = $this->getCompLanguage();
        $vendorList = $downloader->fetchVendorList(
            $endpoint . \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::FILENAME_VENDOR_LIST,
            $fetchQueryArgs
        );
        if (is_wp_error($vendorList)) {
            return $vendorList;
        }
        // Download the translations
        if (
            $compLanguage !== null &&
            !$compLanguage instanceof \DevOwl\RealCookieBanner\Vendor\DevOwl\Multilingual\None
        ) {
            // Download multiple languages (e.g. WPML, PolyLang)
            $compLanguage->iterateAllLanguagesContext(function ($locale) use (&$vendorList) {
                $this->updateLanguage($locale, $vendorList);
            });
        } else {
            // Download only the current blog language and default TCF language
            $this->updateLanguage(get_locale(), $vendorList);
        }
        // Persist the main language
        $translations = [];
        $persist->normalizeDeclarations(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::TCF_DEFAULT_LANGUAGE,
            $vendorList,
            $translations
        );
        $persist->normalizeStacks(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::TCF_DEFAULT_LANGUAGE,
            $vendorList,
            $translations
        );
        // Persist the vendors (not language-depending)
        $persist->normalizeVendors($vendorList);
        return \true;
    }
    /**
     * Update a specific language (skips default TCF language). Do not use this, use `update` instead.
     *
     * @param string $locale
     * @param array $vendorList
     */
    protected function updateLanguage($locale, &$vendorList) {
        $language = \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::sanitizeLanguageCode(
            $locale
        );
        if (
            $language !== \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::TCF_DEFAULT_LANGUAGE
        ) {
            $translations = $this->getDownloader()->fetchTranslation(
                $this->getEndpoint() .
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Downloader::FILENAME_PURPOSES_TRANSLATION,
                $language,
                $this->getFetchQueryArgs()
            );
            // If translation does not exist, fallback to default language
            if (is_wp_error($translations)) {
                $translations = [];
            }
            $this->getPersist()->normalizeDeclarations($language, $vendorList, $translations);
            $this->getPersist()->normalizeStacks($language, $vendorList, $translations);
            return \true;
        }
        return \false;
    }
    /**
     * Make sure the database tables are created.
     */
    public function dbDelta() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        foreach (
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::DECLARATION_TYPES
            as $purposeType
        ) {
            $table_name = $this->getTableName($purposeType);
            $sql = "CREATE TABLE {$table_name} (\n                gvlSpecificationVersion mediumint(9) NOT NULL,\n                tcfPolicyVersion mediumint(9) NOT NULL,\n                id mediumint(9) NOT NULL,\n                language varchar(5) NOT NULL,\n                name text NOT NULL,\n                description text NOT NULL,\n                descriptionLegal text NOT NULL,\n                PRIMARY KEY  (gvlSpecificationVersion, tcfPolicyVersion, id, language)\n            ) {$charset_collate};";
            dbDelta($sql);
        }
        $table_name = $this->getTableName(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::TABLE_NAME_STACKS
        );
        $sql = "CREATE TABLE {$table_name} (\n            gvlSpecificationVersion mediumint(9) NOT NULL,\n            tcfPolicyVersion mediumint(9) NOT NULL,\n            id mediumint(9) NOT NULL,\n            language varchar(5) NOT NULL,\n            name text NOT NULL,\n            description text NOT NULL,\n            descriptionLegal text NOT NULL,\n            purposes varchar(255) NOT NULL,\n            specialFeatures varchar(255) NOT NULL,\n            PRIMARY KEY  (gvlSpecificationVersion, tcfPolicyVersion, id, language)\n        ) {$charset_collate};";
        dbDelta($sql);
        $table_name = $this->getTableName(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::TABLE_NAME_VENDORS
        );
        $sql = "CREATE TABLE {$table_name} (\n            vendorListVersion mediumint(9) NOT NULL,\n            id mediumint(9) NOT NULL,\n            name text NOT NULL,\n            purposes varchar(255) NOT NULL,\n            legIntPurposes varchar(255) NOT NULL,\n            flexiblePurposes varchar(255) NOT NULL,\n            specialPurposes varchar(255) NOT NULL,\n            features varchar(255) NOT NULL,\n            specialFeatures varchar(255) NOT NULL,\n            policyUrl text NOT NULL,\n            usesCookies tinyint(1),\n            cookieMaxAgeSeconds bigint(20),\n            cookieRefresh tinyint(1),\n            usesNonCookieAccess tinyint(1),\n            deviceStorageDisclosureUrl tinytext,\n            deviceStorageDisclosureViolation varchar(255),\n            deviceStorageDisclosure text,\n            additionalInformation text,\n            PRIMARY KEY  (vendorListVersion, id)\n        ) {$charset_collate};";
        dbDelta($sql);
    }
    /**
     * Getter.
     *
     * @param string $name
     */
    public function getTableName($name = null) {
        global $wpdb;
        return $wpdb->prefix .
            $this->dbPrefix .
            '_' .
            \DevOwl\RealCookieBanner\Vendor\DevOwl\TcfVendorListNormalize\Persist::TABLE_NAME .
            (empty($name) ? '' : '_' . self::uncamelize($name));
    }
    /**
     * Setter.
     *
     * @param array $fetchQueryArgs
     * @codeCoverageIgnore
     */
    public function setFetchQueryArgs($fetchQueryArgs) {
        $this->fetchQueryArgs = $fetchQueryArgs;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getEndpoint() {
        return $this->endpoint;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getFetchQueryArgs() {
        return $this->fetchQueryArgs;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getDownloader() {
        return $this->downloader;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getPersist() {
        return $this->persist;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getQuery() {
        return $this->query;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getCompLanguage() {
        return $this->compLanguage;
    }
    /**
     * Uncamlize a given string. Useful to map purpose types to table names e.g. `specialPurposes` -> `special_purposes`.
     *
     * @param string $camel
     * @param string $splitter
     * @see https://stackoverflow.com/a/1993737/5506547
     */
    public static function uncamelize($camel, $splitter = '_') {
        $camel = \preg_replace(
            '/(?!^)[[:upper:]][[:lower:]]/',
            '$0',
            \preg_replace('/(?!^)[[:upper:]]+/', $splitter . '$0', $camel)
        );
        return \strtolower($camel);
    }
}
