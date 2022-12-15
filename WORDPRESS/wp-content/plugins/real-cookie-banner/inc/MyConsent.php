<?php

namespace DevOwl\RealCookieBanner;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\settings\Consent;
use DevOwl\RealCookieBanner\settings\General;
use DevOwl\RealCookieBanner\settings\Revision;
use DevOwl\RealCookieBanner\view\Banner;
use DevOwl\RealCookieBanner\view\blocker\Plugin;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Handle consents of "me".
 */
class MyConsent {
    use UtilsProvider;
    const COOKIE_NAME_USER_PREFIX = 'real_cookie_banner';
    /**
     * Singleton instance.
     *
     * @var MyConsent
     */
    private static $me = null;
    private $cacheCurrentUser = null;
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Persist an user consent to the database.
     *
     * @param array|string $consent A set of accepted cookie groups + cookies or a predefined set like `all` or `essentials` (see `UserConsent::validateConsent`)
     * @param boolean $markAsDoNotTrack
     * @param string $buttonClicked
     * @param int $viewPortWidth
     * @param int $viewPortHeight
     * @param string $referer
     * @param int $blocker If the consent came from a content blocker, mark this in our database
     * @param int|string $blockerThumbnail Can be the ID of the blocker thumbnail itself, or in format of `{embedId}-{fileMd5}`
     * @param int $forwarded The reference to the consent ID of the source website (only for forwarded consents)
     * @param string $forwardedUuid The UUID reference of the source website
     * @param boolean $forwardedBlocker Determine if forwarded consent came through a content blocker
     * @param string $tcfString TCF compatibility; encoded TCF string (not the vendor string; `isForVendors = false`)
     * @param string $customBypass Allows to set a custom bypass which causes the banner to be hidden (e.g. Geolocation)
     * @return array The current used user
     */
    public function persist(
        $consent,
        $markAsDoNotTrack,
        $buttonClicked,
        $viewPortWidth,
        $viewPortHeight,
        $referer,
        $blocker = 0,
        $blockerThumbnail = null,
        $forwarded = 0,
        $forwardedUuid = null,
        $forwardedBlocker = \false,
        $tcfString = null,
        $customBypass = null
    ) {
        $args = \get_defined_vars();
        global $wpdb;
        $consent = \DevOwl\RealCookieBanner\UserConsent::getInstance()->validate($consent);
        if (is_wp_error($consent)) {
            return $consent;
        }
        $revision = \DevOwl\RealCookieBanner\settings\Revision::getInstance();
        // Create the cookie on client-side with the latest requested consent hash instead of current real-time hash
        // Why? So, the frontend can safely compare latest requested hash to user-consent hash
        // What is true, cookie hash or database? I can promise, the database shows the consent hash!
        $currentHash = $revision->getCurrentHash();
        $revisionHash = $revision->create(\true, \false)['hash'];
        $revisionIndependentHash = $revision->createIndependent(\true)['hash'];
        $user = $this->getCurrentUser();
        $uuid = $forwardedUuid ?? wp_generate_uuid4();
        $consent_hash = \md5(\json_encode($consent));
        $created = mysql2date('c', current_time('mysql'), \false);
        $previousDecision = $user === \false ? \false : $user['decision'];
        $previousCreated = $user === \false ? \false : $user['created'];
        $ips = \DevOwl\RealCookieBanner\IpHandler::getInstance()->persistIp();
        $table_name = $this->getTableName(\DevOwl\RealCookieBanner\UserConsent::TABLE_NAME);
        $table_name_blocker_thumbnails = $this->getTableName(
            \DevOwl\RealCookieBanner\view\blocker\Plugin::TABLE_NAME_BLOCKER_THUMBNAILS
        );
        if (\is_string($blockerThumbnail)) {
            $blockerThumbnailSplit = \explode('-', $blockerThumbnail, 2);
            if (\count($blockerThumbnailSplit) > 1) {
                $blockerThumbnail = $wpdb->get_var(
                    // phpcs:disable WordPress.DB.PreparedSQL
                    $wpdb->prepare(
                        "SELECT id FROM {$table_name_blocker_thumbnails} WHERE embed_id = %s AND file_md5 = %s",
                        $blockerThumbnailSplit[0],
                        $blockerThumbnailSplit[1]
                    )
                );
                // Blocker thumbnail does not exist - this cannot be the case (expect user deletes database table entries)
                $blockerThumbnail = \is_numeric($blockerThumbnail) ? \intval($blockerThumbnail) : null;
            } else {
                $blockerThumbnail = null;
            }
        }
        $wpdb->query(
            // phpcs:disable WordPress.DB.PreparedSQL
            \str_ireplace(
                "'NULL'",
                'NULL',
                $wpdb->prepare(
                    "INSERT IGNORE INTO {$table_name}\n                        (plugin_version, design_version,\n                        ipv4, ipv6, ipv4_hash, ipv6_hash,\n                        uuid, revision, revision_independent,\n                        previous_decision, decision, decision_hash,\n                        blocker, blocker_thumbnail,\n                        dnt, custom_bypass,\n                        button_clicked, context, viewport_width, viewport_height,\n                        referer, pure_referer,\n                        url_imprint, url_privacy_policy,\n                        forwarded, forwarded_blocker,\n                        tcf_string, created)\n                        VALUES\n                        (%s, %d,\n                        %d, %s, %s, %s,\n                        %s, %s, %s,\n                        %s, %s, %s,\n                        %s, %s,\n                        %d, %s,\n                        %s, %s, %d, %d,\n                        %s, %s,\n                        %s, %s,\n                        %s, %s,\n                        %s, %s)",
                    RCB_VERSION,
                    \DevOwl\RealCookieBanner\view\Banner::DESIGN_VERSION,
                    $ips['ipv4'] === null ? 'NULL' : $ips['ipv4'],
                    $ips['ipv6'] === null ? 'NULL' : $ips['ipv6'],
                    $ips['ipv4_hash'] === null ? 'NULL' : $ips['ipv4_hash'],
                    $ips['ipv6_hash'] === null ? 'NULL' : $ips['ipv6_hash'],
                    $uuid,
                    $revisionHash,
                    $revisionIndependentHash,
                    \json_encode($previousDecision === \false ? [] : $previousDecision),
                    \json_encode($consent),
                    $consent_hash,
                    $blocker > 0 ? $blocker : 'NULL',
                    $blockerThumbnail > 0 ? $blockerThumbnail : 'NULL',
                    $markAsDoNotTrack,
                    $customBypass === null ? 'NULL' : $customBypass,
                    $buttonClicked,
                    $revision->getContextVariablesString(),
                    $viewPortWidth,
                    $viewPortHeight,
                    $referer,
                    \DevOwl\RealCookieBanner\Utils::removeNonPermalinkQueryFromUrl($referer),
                    \DevOwl\RealCookieBanner\settings\General::getInstance()->getImprintPageUrl(),
                    \DevOwl\RealCookieBanner\settings\General::getInstance()->getPrivacyPolicyUrl(),
                    $forwarded > 0 ? $forwarded : 'NULL',
                    // %s used for 'NULL' transformation
                    $forwardedBlocker,
                    // %s used for 'NULL' transformation
                    $tcfString === null ? 'NULL' : $tcfString,
                    $created
                )
            )
        );
        $insertId = $wpdb->insert_id;
        // Set cookie and merge with previous UUIDs
        $allUuids = \array_merge(
            [$uuid],
            $user === \false ? [] : [$user['uuid']],
            $user === \false ? [] : $user['previous_uuids']
        );
        $this->setCookie($allUuids, $currentHash, $consent);
        // Why $currentHash? See above
        // Persist stats (only when not forwarded)
        if ($forwarded === 0) {
            \DevOwl\RealCookieBanner\Stats::getInstance()->persist($consent, $previousDecision, $previousCreated);
        }
        $result = \array_merge($this->getCurrentUser(\true), ['updated' => \true, 'consent_id' => $insertId]);
        \DevOwl\RealCookieBanner\UserConsent::getInstance()->scheduleDeletionOfConsents();
        /**
         * An user has given a new consent.
         *
         * @hook RCB/Consent/Created
         * @param {array} $result
         * @param {array} $args Passed arguments to `MyConsent::persist` as map (since 2.0.0)
         */
        do_action('RCB/Consent/Created', $result, $args);
        return $result;
    }
    /**
     * Set or update the existing cookie to the latest revision. It also respect the fact, that
     * cross-site cookies needs to be set with `SameSite=None` attribute.
     *
     * @param string[] $uuids
     * @param string $revision
     * @param array $consent
     * @see https://developer.wordpress.org/reference/functions/wp_set_auth_cookie/
     * @see https://stackoverflow.com/a/46971326/5506547
     */
    public function setCookie($uuids = null, $revision = null, $consent = null) {
        $cookieName = $this->getCookieName();
        $doDelete = $uuids === null;
        $cookieValue = $doDelete ? '' : \sprintf('%s:%s:%s', \join(',', $uuids), $revision, \json_encode($consent));
        $expire = $doDelete
            ? -1
            : \time() +
                \constant('DAY_IN_SECONDS') *
                    \DevOwl\RealCookieBanner\settings\Consent::getInstance()->getCookieDuration();
        $result = \DevOwl\RealCookieBanner\Utils::setCookie(
            $cookieName,
            $cookieValue,
            $expire,
            \constant('COOKIEPATH'),
            \constant('COOKIE_DOMAIN'),
            is_ssl(),
            \false,
            'None'
        );
        if ($result) {
            /**
             * Real Cookie Banner saved the cookie which holds information about the user with
             * UUID, revision and consent choices.
             *
             * @hook RCB/Consent/SetCookie
             * @param {string} $cookieName
             * @param {string} $cookieValue
             * @param {boolean} $result Got the cookie successfully created?
             * @param {boolean} $revoke `true` if the cookie should be deleted
             * @param {string} $uuid
             * @param {string[]} $uuids Since v3 multiple consent UUIDs are saved to the database
             * @param {array}
             * @since 2.0.0
             */
            do_action('RCB/Consent/SetCookie', $cookieName, $cookieValue, $result, $doDelete, $uuids[0], $uuids);
        }
        return $result;
    }
    /**
     * Get's the current user from the cookie. The result will hold the unique
     * user id and the accepted revision hash. This function is also ported to JS via `getUserDecision.tsx`.
     *
     * @param boolean $force
     * @return false|array 'uuid', `previous_uuids`, 'created', 'cookie_revision', 'consent_revision', 'decision', 'decision_in_cookie', 'decision_hash'
     */
    public function getCurrentUser($force = \false) {
        if ($this->cacheCurrentUser !== null && !$force) {
            return $this->cacheCurrentUser;
        }
        // Cookie set?
        $cookieName = $this->getCookieName();
        if (!isset($_COOKIE[$cookieName])) {
            return \false;
        }
        $parsed = $this->parseCookieValue($_COOKIE[$cookieName]);
        if ($parsed === \false) {
            return \false;
        }
        // Save in cache
        $this->cacheCurrentUser = $parsed;
        return $this->cacheCurrentUser;
    }
    /**
     * Parse a consent from a given cookie value. The result will hold the unique
     * user id and the accepted revision hash.
     *
     * @param string $value
     * @return array 'uuid', `previous_uuids`, 'created', 'cookie_revision', 'consent_revision', 'decision', 'decision_in_cookie', 'decision_hash'
     */
    protected function parseCookieValue($value) {
        global $wpdb;
        // Cookie empty? (https://stackoverflow.com/a/32567915/5506547)
        $result = \stripslashes($value);
        if (empty($result)) {
            return \false;
        }
        // Cookie scheme valid?
        $result = \explode(':', $result, 3);
        if (\count($result) !== 3) {
            return \false;
        }
        $cookieDecision = \json_decode($result[2], ARRAY_A);
        // Parse out data (${uuid}-${revision})
        $uuids = \explode(',', $result[0]);
        $uuid = \array_shift($uuids);
        $revision = $result[1];
        // Check if any consent was ever set by this user
        // phpcs:disable WordPress.DB.PreparedSQL
        $table_name = $this->getTableName(\DevOwl\RealCookieBanner\UserConsent::TABLE_NAME);
        $result = $wpdb->get_row(
            $wpdb->prepare(
                "SELECT revision, revision_independent, decision, decision_hash, created\n                FROM {$table_name}\n                WHERE uuid = %s\n                ORDER BY created DESC LIMIT 1",
                $uuid
            ),
            ARRAY_A
        );
        // phpcs:enable WordPress.DB.PreparedSQL
        // No row found
        if ($result === null) {
            return \false;
        }
        return [
            'uuid' => $uuid,
            'previous_uuids' => $uuids,
            'created' => mysql2date('c', $result['created'], \false),
            'cookie_revision' => $revision,
            'consent_revision' => $result['revision'],
            'consent_revision_independent' => $result['revision_independent'],
            'decision' => \json_decode($result['decision'], ARRAY_A),
            'decision_in_cookie' => $cookieDecision,
            'decision_hash' => $result['decision_hash']
        ];
    }
    /**
     * Get the history of the current user.
     */
    public function getCurrentHistory() {
        global $wpdb;
        $user = $this->getCurrentUser();
        $result = [];
        if ($user !== \false) {
            // Read from database
            $table_name = $this->getTableName(\DevOwl\RealCookieBanner\UserConsent::TABLE_NAME);
            $table_name_revision = $this->getTableName(\DevOwl\RealCookieBanner\settings\Revision::TABLE_NAME);
            $table_name_revision_independent = $this->getTableName(
                \DevOwl\RealCookieBanner\settings\Revision::TABLE_NAME_INDEPENDENT
            );
            $allUuids = \array_merge([$user['uuid']], $user['previous_uuids']);
            $allUuidsIn = \sprintf(
                '(%s)',
                \join(
                    ', ',
                    \array_map(function ($uuid) use ($wpdb) {
                        return $wpdb->prepare('%s', $uuid);
                    }, $allUuids)
                )
            );
            // phpcs:disable WordPress.DB.PreparedSQL
            $rows = $wpdb->get_results(
                "SELECT uc.id, uc.uuid, uc.created, uc.decision, r.json_revision, ri.json_revision AS json_revision_independent, uc.dnt, uc.blocker, uc.forwarded, uc.tcf_string\n                    FROM {$table_name} uc\n                    INNER JOIN {$table_name_revision} r\n                    ON r.hash = uc.revision\n                    INNER JOIN {$table_name_revision_independent} ri\n                    ON ri.hash = uc.revision_independent\n                    WHERE uuid IN " .
                    $allUuidsIn .
                    ' ORDER BY uc.created DESC
                    LIMIT 0, 100',
                ARRAY_A
            );
            // phpcs:enable WordPress.DB.PreparedSQL
            foreach ($rows as $row) {
                $jsonRevision = \json_decode($row['json_revision'], ARRAY_A);
                $jsonRevisionIndependent = \json_decode($row['json_revision_independent'], ARRAY_A);
                $obj = [
                    'id' => \intval($row['id']),
                    'uuid' => $row['uuid'],
                    'isDoNotTrack' => \boolval($row['dnt']),
                    'isUnblock' => \boolval($row['blocker']),
                    'isForwarded' => $row['forwarded'] > 0,
                    'created' => mysql2date('c', $row['created'], \false),
                    'groups' => $jsonRevision['groups'],
                    'decision' => \json_decode($row['decision'], ARRAY_A),
                    // TCF compatibility
                    'tcf' => isset($jsonRevision['tcf'])
                        ? [
                            'tcf' => $jsonRevision['tcf'],
                            'tcfMeta' => $jsonRevisionIndependent['tcfMeta'],
                            'tcfString' => $row['tcf_string']
                        ]
                        : null
                ];
                $result[] = $obj;
            }
        }
        return $result;
    }
    /**
     * Get cookie name for the current page.
     */
    public function getCookieName() {
        $revision = \DevOwl\RealCookieBanner\settings\Revision::getInstance();
        $implicitString = $revision->getContextVariablesString(\true);
        $contextString = $revision->getContextVariablesString();
        return self::COOKIE_NAME_USER_PREFIX .
            (empty($implicitString) ? '' : '-' . $implicitString) .
            (empty($contextString) ? '' : '-' . $contextString);
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\MyConsent()) : self::$me;
    }
}
