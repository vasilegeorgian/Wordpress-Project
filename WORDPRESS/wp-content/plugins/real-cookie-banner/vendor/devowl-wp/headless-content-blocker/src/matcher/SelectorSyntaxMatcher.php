<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\SelectorSyntaxMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AbstractBlockable;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AttributesHelper;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\HeadlessContentBlocker;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins\Image;
/**
 * Block a HTML element by CSS-like selectors, e.g. `div[class="my-class"]`.
 */
class SelectorSyntaxMatcher extends
    \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\AbstractMatcher {
    private $blockable;
    private $blockAutomatically;
    /**
     * C'tor.
     *
     * @param HeadlessContentBlocker $headlessContentBlocker
     * @param AbstractBlockable $blockable
     * @param boolean $blockAutomatically By default a selector-syntax matcher automatically blocks the found matches
     * @codeCoverageIgnore
     */
    public function __construct($headlessContentBlocker, $blockable, $blockAutomatically = \true) {
        parent::__construct($headlessContentBlocker);
        $this->blockable = $blockable;
        $this->blockAutomatically = $blockAutomatically;
    }
    /**
     * See `AbstractMatcher`.
     *
     * @param SelectorSyntaxMatch $match
     */
    public function match($match) {
        $result = $this->createResult($match);
        if (!$result->isBlocked()) {
            return $result;
        }
        $this->applyCommonAttributes($result, $match);
        // Disable all blocked items
        foreach ($match->getFinder()->getAttributes() as $attributeInstance) {
            $attribute = $attributeInstance->getAttribute();
            $this->applyNewLinkElement($match, $attribute, $match->getAttribute($attribute));
        }
        // Disable known loading attributes like `href` or `src`
        $tagAttributeMap = $this->getHeadlessContentBlocker()->getTagAttributeMap();
        $loadingAttributes =
            $tagAttributeMap[
                \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\HeadlessContentBlocker
                    ::TAG_ATTRIBUTE_MAP_LINKABLE
            ]['attr'] ?? [];
        // Edge cases: Plugins
        $loadingAttributes[] =
            \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins\Image::HTML_ATTRIBUTE_SRCSET;
        foreach ($loadingAttributes as $loadingAttr) {
            if ($match->hasAttribute($loadingAttr)) {
                $newAttribute = \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AttributesHelper::transformAttribute(
                    $loadingAttr
                );
                $match->setAttribute($newAttribute, $match->getAttribute($loadingAttr));
                $match->setAttribute($loadingAttr, null);
            }
        }
        return $result;
    }
    /**
     * See `AbstractMatcher`.
     *
     * @param SelectorSyntaxMatch $match
     */
    public function createResult($match) {
        $result = $this->createPlainResultFromMatch($match);
        if ($this->blockAutomatically) {
            $result->setBlocked([$this->blockable]);
            $result->setBlockedExpressions([$match->getFinder()->getExpression()]);
        } else {
            foreach ($match->getFinder()->getAttributes() as $attribute) {
                $value = $match->getAttribute($attribute->getAttribute());
                $this->iterateBlockablesInString($result, $value);
                if ($result->isBlocked()) {
                    break;
                }
            }
        }
        $this->probablyDisableDueToSkipped($result, $match);
        return $this->applyCheckResultHooks($result, $match);
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function isBlockAutomatically() {
        return $this->blockAutomatically;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getBlockable() {
        return $this->blockable;
    }
}
