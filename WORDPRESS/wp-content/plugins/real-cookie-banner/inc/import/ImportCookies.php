<?php

namespace DevOwl\RealCookieBanner\import;

use DevOwl\RealCookieBanner\presets\CookiePresets;
use DevOwl\RealCookieBanner\presets\middleware\AdoptTierFromClassNamespaceMiddleware;
use DevOwl\RealCookieBanner\settings\Blocker;
use DevOwl\RealCookieBanner\settings\Cookie;
use DevOwl\RealCookieBanner\settings\CookieGroup;
use WP_Term;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Trait to handle the importer for cookies in the `Import` class.
 */
trait ImportCookies {
    /**
     * Import cookies from JSON.
     *
     * @param array $cookies
     */
    protected function doImportCookies($cookies) {
        $currentCookies = \DevOwl\RealCookieBanner\import\Export::instance()
            ->appendCookies()
            ->finish()['cookies'];
        $cookieStatus = $this->getCookieStatus();
        $cookieGroup = $this->getCookieGroup();
        $order = \count($currentCookies);
        foreach ($cookies as $index => $cookie) {
            if (!$this->handleCorruptCookie($cookie, $index)) {
                continue;
            }
            // Collect data
            $group = $cookieGroup;
            $metas = $cookie['metas'];
            $post_name = $cookie['post_name'];
            $post_content = $cookie['post_content'];
            $post_status = $cookieStatus === 'keep' ? $cookie['post_status'] : $cookieStatus;
            $post_title = $cookie['post_title'];
            // Do not import our RCB cookie as it is default created on all instances
            if ($post_name === RCB_SLUG_LITE) {
                continue;
            }
            // Check if group is set by import and check if exists
            $groupNotFound = \false;
            if (!empty($cookie['group'])) {
                $term = get_term_by(
                    'slug',
                    $cookie['group'],
                    \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME
                );
                if ($term instanceof \WP_Term) {
                    $group = $term->term_id;
                } else {
                    $groupNotFound = \true;
                }
            }
            // Save technical definitions as plain string in meta
            if (isset($metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS])) {
                // See https://developer.wordpress.org/reference/functions/update_post_meta/#workaround
                $metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS] = wp_slash(
                    \json_encode($metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_TECHNICAL_DEFINITIONS])
                );
            }
            // Save code dynamics as plain string in meta
            if (isset($metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_DYNAMICS])) {
                $metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_DYNAMICS] = wp_slash(
                    \json_encode($metas[\DevOwl\RealCookieBanner\settings\Cookie::META_NAME_CODE_DYNAMICS])
                );
            }
            // Find current cookie with same post_name
            $found = \false;
            foreach ($currentCookies as $currentCookie) {
                if ($currentCookie['post_name'] === $post_name) {
                    $found = $currentCookie;
                    break;
                }
            }
            // Check if this is a PRO template
            if (
                !$this->isPro() &&
                isset($metas[\DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID]) &&
                !empty($metas[\DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID])
            ) {
                $presetWithAttributes = (new \DevOwl\RealCookieBanner\presets\CookiePresets())->getWithAttributes(
                    $metas[\DevOwl\RealCookieBanner\settings\Blocker::META_NAME_PRESET_ID]
                );
                if (
                    $presetWithAttributes === \false ||
                    $presetWithAttributes['tier'] !==
                        \DevOwl\RealCookieBanner\presets\middleware\AdoptTierFromClassNamespaceMiddleware::TIER_FREE
                ) {
                    $this->addMessageCreateFailureImportingProInFreeVersion($post_title);
                    continue;
                }
            }
            if ($this->isCookieSkipExisting() && $found) {
                $this->addMessageSkipExistingCookie($post_name);
                continue;
            }
            // Always create the entry
            $create = wp_insert_post(
                [
                    'post_type' => \DevOwl\RealCookieBanner\settings\Cookie::CPT_NAME,
                    'post_content' => $post_content,
                    'post_title' => $post_title,
                    'post_status' => $post_status,
                    'menu_order' => $order,
                    'meta_input' => $metas
                ],
                \true
            );
            if (is_wp_error($create)) {
                $this->addMessageCreateFailure($post_title, __('Cookie', RCB_TD), $create);
            } elseif ($this->handleCookieAssign($create, $group)) {
                $order++;
                $this->mapCookies[$post_name] = get_post($create)->ID;
                $this->probablyAddMessageDuplicateCookie($found, $post_name, $group, $create);
                $this->probablyAddMessageCookieGroupNotFound($groupNotFound, $post_title, $group, $create);
            }
        }
    }
    /**
     * Assign a created cookie to a given group.
     *
     * @param int $postId
     * @param int $groupId
     */
    protected function handleCookieAssign($postId, $groupId) {
        $assign = wp_set_object_terms($postId, $groupId, \DevOwl\RealCookieBanner\settings\CookieGroup::TAXONOMY_NAME);
        if (is_wp_error($assign)) {
            $this->addMessageCookieAssignFailure($postId, $assign);
            // Delete again
            wp_delete_post($postId, \true);
            return \false;
        }
        return \true;
    }
    /**
     * Check missing meta of passed cookie.
     *
     * @param array $cookie
     * @param int $index
     */
    protected function handleCorruptCookie($cookie, $index) {
        if (
            !isset(
                $cookie['group'],
                $cookie['metas'],
                $cookie['post_name'],
                $cookie['post_content'],
                $cookie['post_status'],
                $cookie['post_title']
            )
        ) {
            $this->addMessageMissingProperties(
                $index,
                __('Cookie', RCB_TD),
                'ID, group, metas, post_content, post_name, post_status, post_title'
            );
            return \false;
        }
        return \true;
    }
}
