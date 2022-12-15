<?php

namespace DevOwl\RealCookieBanner\import;

use DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration;
use DevOwl\RealCookieBanner\settings\Blocker;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use DevOwl\RealCookieBanner\settings\CountryBypass;
use DevOwl\RealCookieBanner\settings\Revision;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Handle export data.
 */
class Export {
    use UtilsProvider;
    const RELEVANT_GROUP_TERM_KEYS = ['term_id', 'slug', 'name', 'description'];
    const RELEVANT_COOKIE_POST_KEYS = ['ID', 'post_name', 'post_content', 'post_status', 'post_title', 'metas'];
    const RELEVANT_BLOCKER_POST_KEYS = ['ID', 'post_name', 'post_content', 'post_status', 'post_title', 'metas'];
    const RELEVANT_TCF_VENDOR_CONFIGURATION_POST_KEYS = ['ID', 'post_name', 'post_status', 'post_title', 'metas'];
    const EXPORT_POST_STATI = ['publish', 'private', 'draft'];
    private $data = [];
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Append settings to the output of the export.
     */
    public function appendSettings() {
        // Deactivate some filters to the options does not get modified
        remove_filter(
            'RCB/Revision/Option/' . \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_COUNTRIES,
            [
                \DevOwl\RealCookieBanner\settings\CountryBypass::getInstance(),
                'revisionOptionCountriesExpandPredefinedLists'
            ]
        );
        $this->data['settings'] = \DevOwl\RealCookieBanner\settings\Revision::getInstance()->fromOptions();
        add_filter(
            'RCB/Revision/Option/' . \DevOwl\RealCookieBanner\settings\CountryBypass::SETTING_COUNTRY_BYPASS_COUNTRIES,
            [
                \DevOwl\RealCookieBanner\settings\CountryBypass::getInstance(),
                'revisionOptionCountriesExpandPredefinedLists'
            ]
        );
        return $this;
    }
    /**
     * Append cookie groups to the output of the export.
     */
    public function appendCookieGroups() {
        $this->data['cookieGroups'] = $this->getExportGroups();
        return $this;
    }
    /**
     * Append cookies to the output of the export.
     */
    public function appendCookies() {
        $groupsKnown = isset($this->data['cookieGroups']);
        $groups = $groupsKnown ? $this->data['cookieGroups'] : $this->getExportGroups();
        $this->data['cookies'] = $this->getExportCookies($groups);
        return $this;
    }
    /**
     * Append content blocker to the output of the export.
     */
    public function appendBlocker() {
        $this->data['blocker'] = $this->getExportBlocker();
        return $this;
    }
    /**
     * Append TCF vendor configurations (if available) to the output of the export.
     */
    public function appendTcfVendorConfigurations() {
        $this->data['tcfVendorConfigurations'] = $this->getTcfVendorConfigurations();
        return $this;
    }
    /**
     * Append customize banner options to the output of the export.
     */
    public function appendCustomizeBanner() {
        $this->data['customizeBanner'] = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getBanner()
            ->getCustomize()
            ->localizeValues([\DevOwl\RealCookieBanner\Vendor\DevOwl\Customize\controls\Headline::class])[
            'customizeValuesBanner'
        ];
        return $this;
    }
    /**
     * Get the exported data as array.
     *
     * @return array
     */
    public function finish() {
        return $this->data;
    }
    /**
     * Get groups for export.
     */
    protected function getExportGroups() {
        $terms = get_terms(
            \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                [
                    'taxonomy' => \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME,
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC',
                    'hide_empty' => \false,
                    'meta_query' => [['key' => 'order', 'type' => 'NUMERIC']]
                ],
                'exportCookieGroups'
            )
        );
        $result = [];
        foreach ($terms as $term) {
            // $meta = get_term_meta($term->term_id);
            // Ignore meta as it can currently hold only the order and this is not exported
            $rowResult = [];
            foreach (self::RELEVANT_GROUP_TERM_KEYS as $key) {
                $rowResult[$key] = $term->{$key};
            }
            $result[] = $rowResult;
        }
        return $result;
    }
    /**
     * Get cookies for export.
     *
     * @param array $groups Result of getExportGroups()
     * @param boolean $areGroupsKnown If false, all cookies gets put to an empty group
     */
    protected function getExportCookies($groups) {
        $result = [];
        foreach ($groups as $group) {
            $cookies = \DevOwl\RealCookieBanner\settings\Cookie::getInstance()->getOrdered(
                $group['term_id'],
                \false,
                get_posts(
                    \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                        [
                            'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                            'orderby' => ['menu_order' => 'ASC', 'ID' => 'DESC'],
                            'numberposts' => -1,
                            'nopaging' => \true,
                            'tax_query' => [
                                [
                                    'taxonomy' => \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME,
                                    'terms' => $group['term_id'],
                                    'include_children' => \false
                                ]
                            ],
                            'post_status' => self::EXPORT_POST_STATI
                        ],
                        'cookiesExport'
                    )
                )
            );
            foreach ($cookies as $cookie) {
                $rowResult = ['group' => $group['slug']];
                foreach (self::RELEVANT_COOKIE_POST_KEYS as $key) {
                    $rowResult[$key] = $cookie->{$key};
                }
                $result[] = $rowResult;
            }
        }
        return $result;
    }
    /**
     * Get blocker for export.
     */
    protected function getExportBlocker() {
        $posts = \DevOwl\RealCookieBanner\settings\Blocker::getInstance()->getOrdered(
            \false,
            get_posts(
                \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                    [
                        'post_type' => \DevOwl\RealCookieBanner\settings\Blocker::CPT_NAME,
                        'orderby' => ['ID' => 'DESC'],
                        'numberposts' => -1,
                        'nopaging' => \true,
                        'post_status' => self::EXPORT_POST_STATI
                    ],
                    'blockerExport'
                )
            )
        );
        $result = [];
        foreach ($posts as $post) {
            $rowResult = [];
            foreach (self::RELEVANT_BLOCKER_POST_KEYS as $key) {
                $rowResult[$key] = $post->{$key};
                // Cookies / TCF vendors should be resolved as post_name instead of ID
                if ($key === 'metas') {
                    foreach (
                        [
                            \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_SERVICES,
                            \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_TCF_VENDORS
                        ]
                        as $metaName
                    ) {
                        foreach ($rowResult[$key][$metaName] as $cookieIdx => $cookieId) {
                            $rowResult[$key][$metaName][$cookieIdx] = get_post($cookieId)->post_name;
                        }
                    }
                }
            }
            if (isset($rowResult['metas']['visualThumbnail'])) {
                unset($rowResult['metas']['visualThumbnail']);
            }
            $result[] = $rowResult;
        }
        return $result;
    }
    /**
     * Get TCF vendor configurations for export.
     */
    protected function getTcfVendorConfigurations() {
        if (!$this->isPro()) {
            return [];
        }
        $posts = \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::getInstance()->getOrdered(
            \false,
            get_posts(
                \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                    [
                        'post_type' => \DevOwl\RealCookieBanner\lite\settings\TcfVendorConfiguration::CPT_NAME,
                        'orderby' => ['ID' => 'DESC'],
                        'numberposts' => -1,
                        'nopaging' => \true,
                        'post_status' => self::EXPORT_POST_STATI
                    ],
                    'tcfVendorConfigurationsExport'
                )
            )
        );
        $result = [];
        foreach ($posts as $post) {
            $rowResult = [];
            foreach (self::RELEVANT_TCF_VENDOR_CONFIGURATION_POST_KEYS as $key) {
                $rowResult[$key] = $post->{$key};
            }
            $result[] = $rowResult;
        }
        return $result;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function instance() {
        return new \DevOwl\RealCookieBanner\import\Export();
    }
}
