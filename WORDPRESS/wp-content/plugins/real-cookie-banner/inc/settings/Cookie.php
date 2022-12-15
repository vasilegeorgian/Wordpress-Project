<?php

namespace DevOwl\RealCookieBanner\settings;

use DevOwl\RealCookieBanner\base\UtilsProvider;
use DevOwl\RealCookieBanner\Core;
use WP_Error;
use WP_Post;
use WP_REST_Posts_Controller;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Register cookie custom post type.
 */
class Cookie {
    use UtilsProvider;
    const CPT_NAME = 'rcb-cookie';
    const META_NAME_PROVIDER = 'provider';
    const META_NAME_CONSENT_FORWARDING_UNIQUE_NAME = 'consentForwardingUniqueName';
    const META_NAME_IS_EMBEDDING_ONLY_EXTERNAL_RESOURCES = 'isEmbeddingOnlyExternalResources';
    const META_NAME_LEGAL_BASIS = 'legalBasis';
    const META_NAME_EPRIVACY_USA = 'ePrivacyUSA';
    const META_NAME_TECHNICAL_DEFINITIONS = 'technicalDefinitions';
    const META_NAME_CODE_DYNAMICS = 'codeDynamics';
    const META_NAME_PROVIDER_PRIVACY_POLICY_URL = 'providerPrivacyPolicyUrl';
    const META_NAME_TAG_MANAGER_OPT_IN_EVENT_NAME = 'tagManagerOptInEventName';
    const META_NAME_TAG_MANAGER_OPT_OUT_EVENT_NAME = 'tagManagerOptOutEventName';
    const META_NAME_CODE_OPT_IN = 'codeOptIn';
    const META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN = 'executeCodeOptInWhenNoTagManagerConsentIsGiven';
    const META_NAME_CODE_OPT_OUT = 'codeOptOut';
    const META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN = 'executeCodeOptOutWhenNoTagManagerConsentIsGiven';
    const META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT = 'deleteTechnicalDefinitionsAfterOptOut';
    const META_NAME_CODE_ON_PAGE_LOAD = 'codeOnPageLoad';
    const SYNC_META_COPY = [
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CONSENT_FORWARDING_UNIQUE_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_IS_EMBEDDING_ONLY_EXTERNAL_RESOURCES,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_LEGAL_BASIS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EPRIVACY_USA,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_DYNAMICS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_IN_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_OUT_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_IN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_ON_PAGE_LOAD,
        \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID,
        \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_VERSION
    ];
    const SYNC_META_COPY_ONCE = [
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL
    ];
    const TECHNICAL_HANDLING_META_COLLECTION = [
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_IN_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_OUT_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_IN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        // Cookie::META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_ON_PAGE_LOAD
    ];
    const SYNC_OPTIONS = [
        'data' => ['menu_order'],
        'taxonomies' => [\DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME],
        'meta' => [
            'copy' => \DevOwl\RealCookieBanner\settings\Cookie::SYNC_META_COPY,
            'copy-once' => \DevOwl\RealCookieBanner\settings\Cookie::SYNC_META_COPY_ONCE
        ]
    ];
    const META_KEYS = [
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CONSENT_FORWARDING_UNIQUE_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_IS_EMBEDDING_ONLY_EXTERNAL_RESOURCES,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_LEGAL_BASIS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EPRIVACY_USA,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_DYNAMICS,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_PROVIDER_PRIVACY_POLICY_URL,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_IN_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TAG_MANAGER_OPT_OUT_EVENT_NAME,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_IN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT,
        \DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_ON_PAGE_LOAD,
        \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID
    ];
    const LEGAL_BASIS_CONSENT = 'consent';
    const LEGAL_BASIS_LEGITIMATE_INTEREST = 'legitimate-interest';
    const LEGAL_BASIS_LEGAL_REQUIREMENT = 'legal-requirement';
    /**
     * This capabilities are added to the role.
     *
     * @see https://developer.wordpress.org/reference/functions/register_post_type/#capabilities
     */
    const CAPABILITIES = [
        'edit_%s',
        'read_%s',
        'delete_%s',
        // Primitive capabilities used outside of map_meta_cap():
        'edit_%ss',
        'edit_others_%ss',
        'publish_%ss',
        'read_private_%ss',
        // Primitive capabilities used within map_meta_cap():
        'delete_%ss',
        'delete_private_%ss',
        'delete_published_%ss',
        'delete_others_%ss',
        'edit_private_%ss',
        'edit_published_%ss',
        'edit_%ss'
    ];
    /**
     * Singleton instance.
     *
     * @var Cookie
     */
    private static $me = null;
    private $cacheGetOrdered = [];
    /**
     * C'tor.
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Register capabilities to administrator role to allow cookie management.
     *
     * @see https://wordpress.stackexchange.com/a/290093/83335
     * @see https://wordpress.stackexchange.com/a/257401/83335
     */
    public function register_cap() {
        foreach (wp_roles()->roles as $key => $value) {
            $role = get_role($key);
            if ($role->has_cap('manage_options')) {
                foreach (self::CAPABILITIES as $cap) {
                    $role->add_cap(\sprintf($cap, self::CPT_NAME));
                }
            }
        }
    }
    /**
     * Register custom post type.
     */
    public function register() {
        $labels = ['name' => __('Cookies', RCB_TD), 'singular_name' => __('Cookie', RCB_TD)];
        $args = [
            'label' => $labels['name'],
            'labels' => $labels,
            'description' => '',
            'public' => \false,
            'publicly_queryable' => \false,
            'show_ui' => \true,
            'show_in_rest' => \true,
            'rest_base' => self::CPT_NAME,
            'rest_controller_class' => \WP_REST_Posts_Controller::class,
            'has_archive' => \false,
            'show_in_menu' => \false,
            'show_in_nav_menus' => \false,
            'delete_with_user' => \false,
            'exclude_from_search' => \true,
            'capability_type' => self::CPT_NAME,
            'map_meta_cap' => \true,
            'hierarchical' => \false,
            'rewrite' => \false,
            'query_var' => \true,
            'supports' => ['title', 'editor', 'custom-fields', 'page-attributes']
        ];
        register_post_type(self::CPT_NAME, $args);
        register_meta('post', \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_VERSION, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'number',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_PROVIDER, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_CONSENT_FORWARDING_UNIQUE_NAME, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_LEGAL_BASIS, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'default' => self::LEGAL_BASIS_CONSENT,
            'show_in_rest' => [
                'schema' => [
                    'type' => 'string',
                    'enum' => [
                        self::LEGAL_BASIS_CONSENT,
                        self::LEGAL_BASIS_LEGITIMATE_INTEREST,
                        self::LEGAL_BASIS_LEGAL_REQUIREMENT
                    ]
                ]
            ]
        ]);
        register_meta('post', self::META_NAME_EPRIVACY_USA, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'boolean',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_IS_EMBEDDING_ONLY_EXTERNAL_RESOURCES, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'boolean',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        // This meta is stored as JSON (this shouldn't be done usually - 3rd normal form - but it's ok here)
        register_meta('post', self::META_NAME_TECHNICAL_DEFINITIONS, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        // This meta is stored as JSON (this shouldn't be done usually - 3rd normal form - but it's ok here)
        register_meta('post', self::META_NAME_CODE_DYNAMICS, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_PROVIDER_PRIVACY_POLICY_URL, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_CODE_OPT_IN, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'boolean',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_CODE_OPT_OUT, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'boolean',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'boolean',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_CODE_ON_PAGE_LOAD, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_TAG_MANAGER_OPT_IN_EVENT_NAME, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
        register_meta('post', self::META_NAME_TAG_MANAGER_OPT_OUT_EVENT_NAME, [
            'object_subtype' => self::CPT_NAME,
            'type' => 'string',
            'single' => \true,
            'show_in_rest' => \true
        ]);
    }
    /**
     * Get all available cookies ordered by group. You also get a `metas` property
     * in the returned WP_Post instance with all RCB-relevant metas.
     *
     * @param int $groupId
     * @param boolean $force
     * @param WP_Post[] $usePosts If set, only meta is applied to the passed posts
     * @return WP_Post[]|WP_Error
     */
    public function getOrdered($groupId, $force = \false, $usePosts = null) {
        if ($force === \false && isset($this->cacheGetOrdered[$groupId]) && $usePosts === null) {
            return $this->cacheGetOrdered[$groupId];
        }
        $posts = [];
        if ($usePosts) {
            $allPosts = $usePosts;
        } else {
            // Make 'all' cache context-depending to avoid WPML / PolyLang issues (e. g. request new consent)
            $allKey = 'all-' . \DevOwl\RealCookieBanner\settings\Revision::getInstance()->getContextVariablesString();
            if ($force === \false && isset($this->cacheGetOrdered[$allKey])) {
                $allPosts = $this->cacheGetOrdered[$allKey];
            } else {
                $allPosts = $this->cacheGetOrdered[$allKey] = get_posts(
                    \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                        [
                            'post_type' => self::CPT_NAME,
                            'orderby' => ['menu_order' => 'ASC', 'ID' => 'DESC'],
                            'numberposts' => -1,
                            'nopaging' => \true,
                            'post_status' => 'publish'
                        ],
                        'cookiesGetOrdered'
                    )
                );
            }
        }
        // Filter terms to only get services for this requested group
        if ($groupId !== null) {
            foreach ($allPosts as $post) {
                $terms = get_the_terms($post->ID, \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME);
                if (\is_array($terms) && \count($terms) > 0 && $terms[0]->term_id === $groupId) {
                    $posts[] = $post;
                }
            }
        } else {
            $posts = $allPosts;
        }
        foreach ($posts as &$post) {
            $post->metas = [];
            foreach (self::META_KEYS as $meta_key) {
                $metaValue = get_post_meta($post->ID, $meta_key, \true);
                switch ($meta_key) {
                    case self::META_NAME_TECHNICAL_DEFINITIONS:
                        $metaValue = \json_decode($metaValue, ARRAY_A);
                        foreach ($metaValue as $key => $definition) {
                            $metaValue[$key]['duration'] = \intval(
                                isset($definition['duration']) ? $definition['duration'] : 0
                            );
                        }
                        break;
                    case self::META_NAME_CODE_DYNAMICS:
                        $metaValue = \json_decode($metaValue, ARRAY_A);
                        break;
                    case self::META_NAME_IS_EMBEDDING_ONLY_EXTERNAL_RESOURCES:
                    case self::META_NAME_EPRIVACY_USA:
                    case self::META_NAME_EXECUTE_CODE_OPT_IN_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN:
                    case self::META_NAME_EXECUTE_CODE_OPT_OUT_WHEN_NO_TAG_MANAGER_CONSENT_IS_GIVEN:
                    case self::META_NAME_DELETE_TECHNICAL_DEFINITIONS_AFTER_OPT_OUT:
                        $metaValue = \boolval($metaValue);
                        break;
                    case \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_VERSION:
                        $metaValue = \intval($metaValue);
                        break;
                    default:
                        break;
                }
                $post->metas[$meta_key] = $metaValue;
            }
        }
        if ($usePosts === null) {
            $this->cacheGetOrdered[$groupId] = $posts;
        }
        return $posts;
    }
    /**
     * Get unassigned services (cookies without cookie group).
     */
    public function getUnassignedCookies() {
        return get_posts(
            \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                [
                    'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                    'numberposts' => -1,
                    'nopaging' => \true,
                    'post_status' => ['publish', 'private', 'draft'],
                    'tax_query' => [
                        [
                            // https://wordpress.stackexchange.com/a/252102/83335
                            'taxonomy' => \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME,
                            'operator' => 'NOT EXISTS'
                        ]
                    ]
                ],
                'cookiesUnassigned'
            )
        );
    }
    /**
     * Get a total count of published cookies.
     *
     * @return int
     */
    public function getPublicCount() {
        return \intval(wp_count_posts(self::CPT_NAME)->publish);
    }
    /**
     * Get a total count of all cookies.
     *
     * @return int
     */
    public function getAllCount() {
        return \array_sum(\array_map('intval', \array_values((array) wp_count_posts(self::CPT_NAME))));
    }
    /**
     * Get a created service by identifier.
     *
     * @param string $identifier
     */
    public function getServiceByIdentifier($identifier) {
        $realCookieBannerService = get_posts(
            \DevOwl\RealCookieBanner\Core::getInstance()->queryArguments(
                [
                    'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                    'numberposts' => -1,
                    'nopaging' => \true,
                    'meta_query' => [
                        [
                            'key' => \DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID,
                            'value' => $identifier,
                            'compare' => '='
                        ]
                    ],
                    'post_status' => ['publish', 'private', 'draft']
                ],
                'Cookie::getServiceByIdentifier'
            )
        );
        return $realCookieBannerService[0] ?? null;
    }
    /**
     * Modify the cookie item schema and allow to pass the opt-in codes as base64-encoded strings
     * so they do not get inspected as XSS e.g. in Cloudflare.
     *
     * @param array $schema
     */
    public function rest_item_schema($schema) {
        $schema['properties']['meta']['arg_options']['sanitize_callback'] = function ($properties) {
            $base64Start = 'encodedScript:';
            // 'data:text/plain;base64,'; // Cloudflare XSS can also protect again this encoding
            foreach (
                [self::META_NAME_CODE_OPT_IN, self::META_NAME_CODE_OPT_OUT, self::META_NAME_CODE_ON_PAGE_LOAD]
                as $meta_key
            ) {
                if (isset($properties[$meta_key]) && \strpos($properties[$meta_key], $base64Start) === 0) {
                    $base65String = \substr($properties[$meta_key], \strlen($base64Start));
                    $properties[$meta_key] = empty($base65String) ? '' : \base64_decode($base65String);
                }
            }
            return $properties;
        };
        return $schema;
    }
    /**
     * Multiple metadata rename migrations.
     *
     * @see https://app.clickup.com/t/2d8dedh
     * @param string|false $installed
     */
    public function new_version_installation_after_3_0_2($installed) {
        global $wpdb;
        if (\DevOwl\RealCookieBanner\Core::versionCompareOlderThan($installed, '3.0.2', ['3.0.3', '3.1.0'])) {
            // Get posts which hold post meta which needs to be renamed so we can clear the post cache for them
            $setCookiesViaManager = \DevOwl\RealCookieBanner\settings\General::getInstance()->getSetCookiesViaManager();
            $affectedPostIds = $wpdb->get_col(
                // phpcs:disable WordPress.DB.PreparedSQL
                $wpdb->prepare(
                    "SELECT p.ID FROM {$wpdb->postmeta} pm\n                    INNER JOIN {$wpdb->posts} p ON pm.post_id = p.ID\n                    WHERE pm.meta_key IN ('" .
                        \join(
                            "','",
                            \array_merge(
                                [
                                    'providerPrivacyPolicy',
                                    'codeOptOutDelete',
                                    'noTechnicalDefinitions',
                                    'technicalDefinitions'
                                ],
                                ($setCookiesViaManager === 'none'
                                        ? []
                                        : $setCookiesViaManager === 'googleTagManager')
                                    ? [
                                        'googleTagManagerInEventName',
                                        'googleTagManagerOutEventName',
                                        'codeOptInNoGoogleTagManager',
                                        'codeOptOutNoGoogleTagManager'
                                    ]
                                    : [
                                        'matomoTagManagerInEventName',
                                        'matomoTagManagerOutEventName',
                                        'codeOptInNoMatomoTagManager',
                                        'codeOptOutNoMatomoTagManager'
                                    ]
                            )
                        ) .
                        "') AND p.post_type = %s\n                    GROUP BY p.ID",
                    self::CPT_NAME
                )
            );
            if (\count($affectedPostIds) > 0) {
                // Rename the metadata directly through a plain SQL query so hooks like `update_post_meta` are not called
                // This avoids issues with WPML or PolyLang and their syncing process
                $wpdb->query(
                    // phpcs:disable WordPress.DB.PreparedSQL
                    $wpdb->prepare(
                        "UPDATE {$wpdb->postmeta} pm\n                        INNER JOIN {$wpdb->posts} p ON pm.post_id = p.ID\n                        SET pm.meta_key = CASE\n                            WHEN pm.meta_key = 'providerPrivacyPolicy' THEN 'providerPrivacyPolicyUrl'\n                            WHEN pm.meta_key = 'codeOptOutDelete' THEN 'deleteTechnicalDefinitionsAfterOptOut'\n                            WHEN pm.meta_key = 'noTechnicalDefinitions' THEN 'isEmbeddingOnlyExternalResources'\n                            " .
                            \join(
                                ' ',
                                $setCookiesViaManager === 'googleTagManager'
                                    ? [
                                        "WHEN pm.meta_key = 'googleTagManagerInEventName' THEN 'tagManagerOptInEventName'",
                                        "WHEN pm.meta_key = 'googleTagManagerOutEventName' THEN 'tagManagerOptOutEventName'",
                                        "WHEN pm.meta_key = 'codeOptInNoGoogleTagManager' THEN 'executeCodeOptInWhenNoTagManagerConsentIsGiven'",
                                        "WHEN pm.meta_key = 'codeOptOutNoGoogleTagManager' THEN 'executeCodeOptOutWhenNoTagManagerConsentIsGiven'"
                                    ]
                                    : [
                                        "WHEN pm.meta_key = 'matomoTagManagerInEventName' THEN 'tagManagerOptInEventName'",
                                        "WHEN pm.meta_key = 'matomoTagManagerOutEventName' THEN 'tagManagerOptOutEventName'",
                                        "WHEN pm.meta_key = 'codeOptInNoMatomoTagManager' THEN 'executeCodeOptInWhenNoTagManagerConsentIsGiven'",
                                        "WHEN pm.meta_key = 'codeOptOutNoMatomoTagManager' THEN 'executeCodeOptOutWhenNoTagManagerConsentIsGiven'"
                                    ]
                            ) .
                            "\n                            ELSE pm.meta_key\n                            END,\n                        pm.meta_value = CASE\n                            WHEN pm.meta_key = 'technicalDefinitions' THEN REPLACE(`meta_value`, '\"sessionDuration\"', '\"isSessionDuration\"')\n                            ELSE pm.meta_value\n                            END\n                        WHERE p.post_type = %s",
                        self::CPT_NAME
                    )
                );
                foreach ($affectedPostIds as $affectedPostId) {
                    clean_post_cache(\intval($affectedPostId));
                }
            }
        }
    }
    /**
     * Modify already given consents and adjust the metadata field names for "List of consents".
     *
     * @see https://app.clickup.com/t/2d8dedh
     * @param array $revision
     * @param boolean $independent
     */
    public static function applyMetaRenameBackwardsCompatibility($revision, $independent) {
        if (!$independent && isset($revision['groups'])) {
            $renameCookieFields = [
                'providerPrivacyPolicy' => 'providerPrivacyPolicyUrl',
                'codeOptOutDelete' => 'deleteTechnicalDefinitionsAfterOptOut',
                'noTechnicalDefinitions' => 'isEmbeddingOnlyExternalResources',
                'thisIsGoogleTagManager' => \false,
                // remove field
                'thisIsMatomoTagManager' => \false
            ];
            $setCookiesViaManager = $revision['options']['SETTING_SET_COOKIES_VIA_MANAGER'] ?? 'none';
            if ($setCookiesViaManager === 'googleTagManager') {
                $renameCookieFields['googleTagManagerInEventName'] = 'tagManagerOptInEventName';
                $renameCookieFields['googleTagManagerOutEventName'] = 'tagManagerOptOutEventName';
                $renameCookieFields['codeOptInNoGoogleTagManager'] = 'executeCodeOptInWhenNoTagManagerConsentIsGiven';
                $renameCookieFields['codeOptOutNoGoogleTagManager'] = 'executeCodeOptOutWhenNoTagManagerConsentIsGiven';
                $renameCookieFields['matomoTagManagerInEventName'] = \false;
                $renameCookieFields['matomoTagManagerOutEventName'] = \false;
                $renameCookieFields['codeOptInNoMatomoTagManager'] = \false;
                $renameCookieFields['codeOptOutNoMatomoTagManager'] = \false;
            } else {
                $renameCookieFields['matomoTagManagerInEventName'] = 'tagManagerOptInEventName';
                $renameCookieFields['matomoTagManagerOutEventName'] = 'tagManagerOptOutEventName';
                $renameCookieFields['codeOptInNoMatomoTagManager'] = 'executeCodeOptInWhenNoTagManagerConsentIsGiven';
                $renameCookieFields['codeOptOutNoMatomoTagManager'] = 'executeCodeOptOutWhenNoTagManagerConsentIsGiven';
                $renameCookieFields['googleTagManagerInEventName'] = \false;
                $renameCookieFields['googleTagManagerOutEventName'] = \false;
                $renameCookieFields['codeOptInNoGoogleTagManager'] = \false;
                $renameCookieFields['codeOptOutNoGoogleTagManager'] = \false;
            }
            foreach ($revision['groups'] as &$group) {
                if (isset($group['items'])) {
                    foreach ($group['items'] as &$cookie) {
                        foreach ($renameCookieFields as $renameCookieField => $newFieldName) {
                            if (isset($cookie[$renameCookieField])) {
                                if ($newFieldName !== \false) {
                                    $cookie[$newFieldName] = $cookie[$renameCookieField];
                                }
                                unset($cookie[$renameCookieField]);
                            }
                        }
                        // Special cases
                        if (isset($cookie['technicalDefinitions']) && \is_array($cookie['technicalDefinitions'])) {
                            $cookie['technicalDefinitions'] = \json_decode(
                                \str_replace(
                                    '"sessionDuration"',
                                    '"isSessionDuration"',
                                    \json_encode($cookie['technicalDefinitions'])
                                ),
                                ARRAY_A
                            );
                        }
                    }
                }
            }
        }
        return $revision;
    }
    /**
     * Get singleton instance.
     *
     * @return Cookie
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null ? (self::$me = new \DevOwl\RealCookieBanner\settings\Cookie()) : self::$me;
    }
}
