<?php

namespace DevOwl\RealCookieBanner\view;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\comp\language\Hooks;
use DevOwl\RealCookieBanner\Core;
use DevOwl\RealCookieBanner\presets\BlockerPresets;
use DevOwl\RealCookieBanner\presets\CookiePresets;
use DevOwl\RealCookieBanner\scanner\Query;
use DevOwl\RealCookieBanner\scanner\ScanPresets;
use DevOwl\RealCookieBanner\view\checklist\Scanner as ChecklistScanner;
use WP_Admin_Bar;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Scanner view.
 */
class Scanner {
    use UtilsProvider;
    const ACTION_SCANNER_FOUND_SERVICES = 'rcb-scanner-found-services';
    const ACTION_SCAN_THIS_SITE = 'rcb-scan-this-site';
    const OPTION_NAME = RCB_OPT_PREFIX . '-scanner-notice-dismissed';
    const TRANSIENT_SERVICES_FOR_NOTICE = RCB_OPT_PREFIX . '-services-for-notice';
    const QUERY_ARG_DISMISS = self::OPTION_NAME;
    const MAX_FOUND_SERVICES_LIST_ITEMS = 5;
    /**
     * C'tor.
     */
    private function __construct() {
        $this->probablyDismiss();
    }
    /**
     * Show a "Show banner again" button in the admin toolbar in frontend.
     *
     * @param WP_Admin_Bar $admin_bar
     */
    public function admin_bar_menu($admin_bar) {
        $configPage = \DevOwl\RealCookieBanner\Core::getInstance()->getConfigPage();
        $scanChecklistItem = new \DevOwl\RealCookieBanner\view\checklist\Scanner();
        if (
            $configPage->isVisible() ||
            !current_user_can(\DevOwl\RealCookieBanner\Core::MANAGE_MIN_CAPABILITY) ||
            !$scanChecklistItem->isChecked()
        ) {
            return;
        }
        if (isset($_GET[self::ACTION_SCAN_THIS_SITE])) {
            check_admin_referer('rcb-scan-this-site');
            $added = \DevOwl\RealCookieBanner\Core::getInstance()
                ->getScanner()
                ->addUrlsToQueue([get_permalink()], \false);
        }
        $admin_bar->add_menu([
            'parent' => $configPage->ensureAdminBarTopLevelNode(),
            'id' => 'rcb-scanner-scan-again',
            'title' => __('Scan this page', RCB_TD),
            'href' => esc_url_raw(
                add_query_arg([
                    self::ACTION_SCAN_THIS_SITE => \true,
                    '_wpnonce' => wp_create_nonce('rcb-scan-this-site')
                ])
            )
        ]);
        list($services, $countAll) = $this->getServicesForNotice(self::MAX_FOUND_SERVICES_LIST_ITEMS);
        if (\count($services) === 0) {
            return;
        }
        $scannerUrl = $configPage->getUrl() . '#/scanner';
        $admin_bar->add_menu([
            'parent' => $configPage->ensureAdminBarTopLevelNode(),
            'id' => 'rcb-scanner-found-services',
            'title' => \sprintf(
                // translators:
                _n('%d recommendation found', '%d recommendations found', $countAll, RCB_TD),
                $countAll
            ),
            'href' => $scannerUrl,
            'meta' => [
                'class' => 'menupop',
                'html' => \sprintf(
                    '<div class="ab-sub-wrapper">
    <style>
        #wp-admin-bar-%1$s,
        #wp-admin-bar-%7$s {
            background: #A67F2A !important;
        }

        #wp-admin-bar-%1$s > .ab-item {
            color: white !important;
        }

        #wp-admin-bar-%7$s > .ab-item > .custom-icon:nth-child(1) {
            display: none !important;
        }

        #wp-admin-bar-%7$s > .ab-item > .custom-icon:nth-child(2) {
            display: inline-block !important;
        }

        #wp-admin-bar-%1$s .ab-submenu:not(.ab-sub-secondary) > li > * {
            padding: 0px 10px;
            width: 400px;
            line-height: 1.3;
        }

        #wp-admin-bar-%1$s .ab-submenu:not(.ab-sub-secondary) > li ul {
            list-style: initial !important;
            margin: 5px 15px;
        }

        #wp-admin-bar-%1$s .ab-submenu:not(.ab-sub-secondary) > li ul > li {
            list-style: initial !important;
            line-height: 1.3;
        }

        #wp-admin-bar-%1$s .ab-sub-secondary .ab-item > span {
            width: 15px;
            display: inline-block;
            line-height: 1.3;
            color: rgba(240, 246, 252, 0.7);
        }
    </style>
    <ul class="ab-submenu">
        <li>
            <div id="rcb-scan-result-notice">%2$s</div>
        </li>
    </ul>
    <ul class="ab-sub-secondary ab-submenu">
        <li>
            <a class="ab-item" href="%5$s"><span class="wp-exclude-emoji">&#10140</span> %3$s</a>
        </li>
        <li>
            <a class="ab-item" href="%6$s"><span class="wp-exclude-emoji">&#x2715;</span> %4$s</a>
        </li>
    </ul>
</div>',
                    self::ACTION_SCANNER_FOUND_SERVICES,
                    $this->generateNoticeTextFromServices($services, $countAll),
                    __('Take action now', RCB_TD),
                    __('Ignore hint', RCB_TD),
                    $scannerUrl,
                    esc_url(add_query_arg(self::QUERY_ARG_DISMISS, 1)),
                    \DevOwl\RealCookieBanner\view\ConfigPage::ADMIN_BAR_TOP_LEVEL_NODE_ID
                )
            ]
        ]);
    }
    /**
     * Generate the notice text from services.
     *
     * @param string[] $services
     * @param int $countAll
     */
    public function generateNoticeTextFromServices($services, $countAll) {
        $liElements = $services;
        if ($countAll > \count($services)) {
            $liElements[] = \sprintf('and %d other services', $countAll - \count($services));
        }
        // Generate list of services with "and x more"
        $text = \sprintf('<ul><li>%s</li></ul>', \join('</li><li>', $liElements));
        $text = \sprintf(
            // translators:
            __(
                'You have embedded the following services on your website: %s You may need to obtain consent for these services via your cookie banner to be able to use them in accordance with data protection regulations.',
                RCB_TD
            ),
            $text
        );
        return $text;
    }
    /**
     * Check if the query argument isset and dismiss the notice.
     */
    protected function probablyDismiss() {
        if (did_action('init') && isset($_GET[self::QUERY_ARG_DISMISS])) {
            $dismissedItems = get_option(self::OPTION_NAME, []);
            $dismissedItems = \array_unique(\array_merge($dismissedItems, $this->getServicesForNotice()[2]));
            update_option(self::OPTION_NAME, $dismissedItems);
            delete_transient(\DevOwl\RealCookieBanner\view\Scanner::TRANSIENT_SERVICES_FOR_NOTICE);
            delete_transient(\DevOwl\RealCookieBanner\scanner\Query::TRANSIENT_SCANNED_EXTERNAL_URLS);
            wp_safe_redirect(esc_url_raw(remove_query_arg(self::QUERY_ARG_DISMISS)));
            exit();
        }
    }
    /**
     * Get a list of found services + external URLs which should be listed in the admin notice.
     *
     * Attention: This query is cached to a transient as it is very expensive! Use
     * `delete_transient(Scanner::TRANSIENT_SERVICES_FOR_NOTICE)` to invalidate the cache.
     *
     * @param int $max
     * @return array [services chunked to `$max`, count of all found services]
     */
    public function getServicesForNotice($max = 5) {
        $value = get_transient(self::TRANSIENT_SERVICES_FOR_NOTICE);
        if ($value !== \false) {
            return $value;
        }
        $result = [];
        $dismissedItems = $this->getDismissedItems();
        // Probably refresh preset metadata cache
        $tempTd = \DevOwl\RealCookieBanner\comp\language\Hooks::getInstance()->createTemporaryTextDomain();
        (new \DevOwl\RealCookieBanner\presets\BlockerPresets())->getClassList();
        (new \DevOwl\RealCookieBanner\presets\CookiePresets())->getClassList();
        $tempTd->teardown();
        // Collect non-existing presets
        $presets = (new \DevOwl\RealCookieBanner\scanner\ScanPresets())->getAllFromCache();
        foreach ($presets as $preset) {
            if (
                (isset($preset['created']) && $preset['created']) ||
                \in_array($preset['identifier'], $dismissedItems, \true)
            ) {
                continue;
            }
            $result[] = [
                'identifier' => $preset['identifier'],
                'name' => $preset['name'],
                'priority' =>
                    ($preset['scanned'] !== \false ? \strtotime($preset['scanned']['lastScanned']) : 0) + \time()
            ];
        }
        $externalHosts = \DevOwl\RealCookieBanner\Core::getInstance()
            ->getScanner()
            ->getQuery()
            ->getScannedExternalUrls();
        foreach ($externalHosts as $host) {
            if (
                !$host['ignored'] &&
                $host['foundCount'] !== $host['blockedCount'] &&
                !\in_array($host['host'], $dismissedItems, \true)
            ) {
                $result[] = [
                    'identifier' => $host['host'],
                    'name' => $host['host'],
                    'priority' => \strtotime($host['lastScanned'])
                ];
            }
        }
        if (\count($result) === 0) {
            $result = [[], 0, []];
        } else {
            // Always show the newest found items as first item
            \array_multisort(\array_column($result, 'priority'), \SORT_DESC, $result);
            $readableNames = \array_column($result, 'name');
            $technicalNames = \array_column($result, 'identifier');
            $result = [\array_chunk($readableNames, $max)[0], \count($result), $technicalNames];
        }
        set_transient(self::TRANSIENT_SERVICES_FOR_NOTICE, $result, 2 * DAY_IN_SECONDS);
        return $result;
    }
    /**
     * Get dismissed items by preset or external host URL.
     */
    public function getDismissedItems() {
        $dismissedItems = get_option(self::OPTION_NAME);
        if ($dismissedItems === \false) {
            update_option(self::OPTION_NAME, []);
            return [];
        }
        return $dismissedItems;
    }
    /**
     * New instance.
     *
     * @codeCoverageIgnore
     */
    public static function instance() {
        return new \DevOwl\RealCookieBanner\view\Scanner();
    }
}
