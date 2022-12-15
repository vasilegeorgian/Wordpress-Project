<?php

namespace DevOwl\RealCookieBanner\scanner;

use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\Markup;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins\scanner\ScanEntry;
use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Persist multiple `ScanEntry`'s from the `Scanner` results to the database.
 *
 * It also provides functionality to avoid duplicate found presets (e.g. MonsterInsights over Google Analytics),
 * and deduplicate coexisting presets (e.g. CF7 with reCaptcha over Google reCaptcha).
 */
class Persist {
    use UtilsProvider;
    const TABLE_NAME = 'scan';
    const TABLE_NAME_MARKUP = 'scan_markup';
    /**
     * Fields which should be updated via `ON DUPLICATE KEY UPDATE`.
     */
    const DECLARATION_OVERWRITE_FIELDS = ['post_id', 'markup_hash'];
    private $entries;
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     * @param ScanEntry[] $entries
     */
    public function __construct($entries) {
        $this->entries = $entries;
    }
    /**
     * Insert entries to database.
     */
    public function persist() {
        global $wpdb;
        if (\count($this->entries) === 0) {
            return;
        }
        $table_name = $this->getTableName(self::TABLE_NAME);
        $table_name_markup = $this->getTableName(self::TABLE_NAME_MARKUP);
        $post_id = get_the_ID();
        $source_url = \DevOwl\RealCookieBanner\scanner\Scanner::getCurrentSourceUrl();
        /**
         * Persist distinct markups.
         *
         * @var Markup[]
         */
        $distinctMarkups = \array_values(\array_unique(\array_column($this->entries, 'markup')));
        $rows = [];
        foreach ($distinctMarkups as $distinctMarkup) {
            // Generate `VALUES` SQL
            // phpcs:disable WordPress.DB.PreparedSQL
            $rows[] = \str_ireplace(
                ["'NULL'", '= NULL'],
                ['NULL', 'IS NULL'],
                $wpdb->prepare('%s, %s', $distinctMarkup->getId(), $distinctMarkup->getContent())
            );
            // phpcs:enable WordPress.DB.PreparedSQL
        }
        // Chunk to boost performance
        $chunks = \array_chunk($rows, 150);
        foreach ($chunks as $sqlInsert) {
            $sql =
                "INSERT IGNORE INTO {$table_name_markup} (`markup_hash`, `markup`) VALUES (" .
                \implode('),(', $sqlInsert) .
                ')';
            // phpcs:disable WordPress.DB.PreparedSQL
            $wpdb->query($sql);
            // phpcs:enable WordPress.DB.PreparedSQL
        }
        /**
         * Persist scan results.
         */
        $rows = [];
        foreach ($this->entries as $entry) {
            $entry->source_url = $source_url;
            $entry->calculateFields();
            // Generate `VALUES` SQL
            // phpcs:disable WordPress.DB.PreparedSQL
            $rows[] = \str_ireplace(
                ["'NULL'", '= NULL'],
                ['NULL', 'IS NULL'],
                $wpdb->prepare(
                    '%s, %s, %s, %s, %s, %s, %d, %s, %s, %d, %s',
                    $entry->preset,
                    $entry->blocked_url ?? 'NULL',
                    $entry->blocked_url_host ?? 'NULL',
                    $entry->blocked_url_hash,
                    $entry->markup === null ? '' : $entry->markup->getId(),
                    $entry->tag,
                    $entry->post_id !== \false ? $post_id : 'NULL',
                    $entry->source_url,
                    $entry->source_url_hash,
                    $entry->ignored ? 1 : 0,
                    current_time('mysql')
                )
            );
            // phpcs:enable WordPress.DB.PreparedSQL
        }
        // Allow to update fields if already exists
        $overwriteSql = [];
        foreach (self::DECLARATION_OVERWRITE_FIELDS as $field) {
            $overwriteSql[] = \sprintf('%1$s=VALUES(%1$s)', $field);
        }
        // Chunk to boost performance
        $chunks = \array_chunk($rows, 150);
        foreach ($chunks as $sqlInsert) {
            $sql =
                "INSERT INTO {$table_name}\n                    (`preset`, `blocked_url`, `blocked_url_host`, `blocked_url_hash`, `markup_hash`, `tag`, `post_id`, `source_url`, `source_url_hash`, `ignored`, `created`)\n                    VALUES (" .
                \implode('),(', $sqlInsert) .
                ')
                    ON DUPLICATE KEY UPDATE ' .
                \join(', ', $overwriteSql);
            // phpcs:disable WordPress.DB.PreparedSQL
            $wpdb->query($sql);
            // phpcs:enable WordPress.DB.PreparedSQL
        }
    }
    /**
     * Get the persistable entries.
     *
     * @codeCoverageIgnore
     */
    public function getEntries() {
        return $this->entries;
    }
    /**
     * Move all found markups to the respective new database table and drop the known markup column.
     *
     * @param string|false $installed
     */
    public static function new_version_installation_after_2_15_0($installed) {
        global $wpdb;
        $table_name = \DevOwl\RealCookieBanner\Core::getInstance()->getTableName(self::TABLE_NAME);
        $table_name_markup = \DevOwl\RealCookieBanner\Core::getInstance()->getTableName(self::TABLE_NAME_MARKUP);
        if (
            \DevOwl\RealCookieBanner\Core::versionCompareOlderThan(
                $installed,
                '2.15.0',
                ['2.16.0', '2.15.1'],
                function () use ($wpdb, $table_name_markup) {
                    // phpcs:disable WordPress.DB.PreparedSQL
                    $exists = $wpdb->get_var("SHOW TABLES LIKE '{$table_name_markup}'") === $table_name_markup;
                    // phpcs:enable WordPress.DB.PreparedSQL
                    return 0 !== $exists;
                }
            )
        ) {
            // phpcs:disable WordPress.DB.PreparedSQL
            $wpdb->query(
                "INSERT IGNORE INTO {$table_name_markup} (markup, markup_hash) SELECT markup, markup_hash FROM {$table_name} WHERE markup IS NOT NULL"
            );
            // phpcs:enable WordPress.DB.PreparedSQL
            // phpcs:disable WordPress.DB.PreparedSQL
            $wpdb->query("ALTER TABLE {$table_name} DROP COLUMN markup");
            // phpcs:enable WordPress.DB.PreparedSQL
        }
    }
}
