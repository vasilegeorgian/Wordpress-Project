<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\finder;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\TagAttributeFinder;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\finder\match\StyleInlineAttributeMatch;
/**
 * Find HTML tags with a potential `style` attribute.
 */
class StyleInlineAttributeFinder extends \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\TagAttributeFinder {
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    public function __construct() {
        parent::__construct([], ['style']);
    }
    /**
     * See `AbstractRegexFinder`.
     *
     * @param array $m
     */
    public function createMatch($m) {
        list($beforeLinkAttribute, $tag, $linkAttribute, $link, $afterLink, $attributes) = self::prepareMatch($m);
        return new \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\finder\match\StyleInlineAttributeMatch(
            $this,
            $m[0],
            $tag,
            $attributes,
            $beforeLinkAttribute,
            $afterLink,
            $linkAttribute,
            $link
        );
    }
}
