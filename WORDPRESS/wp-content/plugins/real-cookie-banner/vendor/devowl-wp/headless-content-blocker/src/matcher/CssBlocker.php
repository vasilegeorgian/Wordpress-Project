<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\StyleInlineMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\TagAttributeMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\BlockedResult;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\Constants;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\finder\match\StyleInlineAttributeMatch;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\Document;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Property\Import;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\AtRuleSet;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSString;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\RuleValueList;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\URL;
/**
 * Takes a match and checks for blocked URLs. If there got something blocked, you can
 * extract two CSS documents.
 */
class CssBlocker {
    const EXTRACT_COMPLETE_AT_RULE_INSTEAD_OF_SINGLE_PROPERTY = ['font-face'];
    const DEFAULT_DUMMY_URL = 'https://assets.devowl.io/packages/devowl-wp/headless-content-blocker/';
    private $extract;
    private $match;
    private $matcher;
    /**
     * Blocked URLs.
     *
     * @var string[]
     */
    private $blockedUrls = [];
    /**
     * C'tor.
     *
     * @param boolean $extract
     * @param StyleInlineAttributeMatch|StyleInlineMatch $match
     * @param AbstractMatcher $matcher
     */
    public function __construct($extract, $match, $matcher) {
        $this->extract = $extract;
        $this->match = $match;
        $this->matcher = $matcher;
    }
    /**
     * Parse a CSS and remove blocked URLs.
     */
    public function parse() {
        $this->blockedUrls = [];
        // Original document (only CSS rules without blocked URLs)
        $parser = new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser($this->getStyle());
        $document = $parser->parse();
        // Extracted document (only CSS rules with blocked URLs)
        if ($this->extract) {
            $parser = new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parser($this->getStyle());
            $extractedDocument = $parser->parse();
        } else {
            $extractedDocument = null;
        }
        list(
            $setUrlChanges,
            $removedFromOriginalDocument,
            $removedRuleSetsFromOriginalDocument
        ) = $this->generateLocationChangeSet($document);
        // Prepare extracted document
        if ($extractedDocument !== null) {
            \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::removeNonBlockedRulesFromDocument(
                $extractedDocument,
                $removedFromOriginalDocument,
                $removedRuleSetsFromOriginalDocument
            );
        }
        // Finally, block the URLs
        \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::applyLocationChangeSet(
            $setUrlChanges,
            $extractedDocument === null ? $document : $extractedDocument
        );
        // Remove blanks
        \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::removeBlanksFromCSSList(
            $document
        );
        \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::removeBlanksFromCSSList(
            $extractedDocument
        );
        return [$document, $extractedDocument, $this->blockedUrls];
    }
    /**
     * Generate a list of changed `URL`s with their new URL. It also respects rule sets which needs to be completely
     * blocked and moved to the extracted document (e.g. `@font-face`).
     *
     * @param Document $document
     */
    protected function generateLocationChangeSet($document) {
        // A list of rule values which should be removed lazily so our processor can still
        // access the rule set itself.
        $removeLazily = [];
        $removed = [];
        $removedRuleSets = [];
        // Delay the changes to the URLs so we can correctly extract the inline script (compare values)
        $setUrlChanges = [];
        // Iterate known rule-sets which need to be completely extracted when one value inside it is blocked (e.g. `@font-face`)
        foreach ($document->getAllRuleSets() as $ruleSet) {
            if (
                $ruleSet instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\RuleSet\AtRuleSet &&
                \in_array($ruleSet->atRuleName(), self::EXTRACT_COMPLETE_AT_RULE_INSTEAD_OF_SINGLE_PROPERTY, \true)
            ) {
                foreach ($ruleSet->getRules() as $rule) {
                    $val = $rule->getValue();
                    if ($val !== null) {
                        /**
                         * All rule values for this rule.
                         *
                         * @var array<RuleValueList|CSSFunction|CSSString|LineName|Size|URL|string>
                         */
                        $ruleValues = [];
                        if ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\RuleValueList) {
                            $ruleValues = $val->getListComponents();
                        } elseif ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSString) {
                            $ruleValues[] = $val;
                        }
                        foreach ($ruleValues as $ruleValue) {
                            $ruleResult = $this->generateLocationChangeSetForSingleValue(
                                $document,
                                $ruleValue,
                                \false,
                                $removed,
                                $setUrlChanges
                            );
                            if ($ruleResult) {
                                $removedRuleSets[] = $ruleSet;
                                // Special case: Extract the complete rule set
                                if ($this->extract) {
                                    $document->remove($ruleSet);
                                }
                            }
                            if ($this->extract) {
                                $removeLazily[] = $ruleValue;
                            }
                        }
                    }
                }
            }
        }
        // Iterate each value in our stylesheet
        foreach ($document->getAllValues() as $val) {
            $this->generateLocationChangeSetForSingleValue($document, $val, $this->extract, $removed, $setUrlChanges);
        }
        foreach ($removeLazily as $remove) {
            if ($this->extract) {
                foreach (
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::removeValueFromDocument(
                        $remove,
                        $document
                    )
                    as $remove
                ) {
                    $removed[] = $remove;
                }
            }
        }
        return [$setUrlChanges, $removed, $removedRuleSets];
    }
    /**
     * Generate a list of changed `URL`s with their new URL for a single value inside our parsed document.
     *
     * @param Document $document
     * @param Value $val
     * @param boolean $extract
     * @param array $removed
     * @param array $setUrlChanges
     */
    protected function generateLocationChangeSetForSingleValue($document, $val, $extract, &$removed, &$setUrlChanges) {
        /**
         * The found URL instance.
         *
         * @var URL
         */
        $location = null;
        if ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Property\Import) {
            $location = $val->getLocation();
            $dummyFileName = 'dummy.css';
        } elseif ($val instanceof \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\URL) {
            $location = $val;
            $dummyFileName = 'dummy.png';
        }
        if ($location !== null) {
            $url = $location->getURL()->getString();
            $ruleResult = $this->createResultForSingleUrl(\html_entity_decode($url));
            if ($ruleResult->isBlocked()) {
                // Remove from original document
                if ($extract) {
                    foreach (
                        \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\matcher\CssHelper::removeValueFromDocument(
                            $val,
                            $document
                        )
                        as $remove
                    ) {
                        $removed[] = $remove;
                    }
                }
                // Adjust URL
                $setUrlChanges[] = [
                    $location,
                    new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSString(
                        $this->generateDummyUrl($ruleResult, $dummyFileName, $url)
                    )
                ];
                return \true;
            }
        }
        return \false;
    }
    /**
     * Check if a given URL is blocked.
     *
     * @param string $url
     * @return BlockedResult
     */
    public function createResultForSingleUrl($url) {
        $result = new \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\BlockedResult(
            'style',
            [],
            $this->getStyle()
        );
        $cb = $this->matcher->getHeadlessContentBlocker();
        // Find all public content blockers and check URL
        foreach ($cb->getBlockables() as $blockable) {
            // Iterate all wildcarded URLs
            foreach ($blockable->getContainsRegularExpressions() as $expression => $regex) {
                // m: Enable multiline search
                if (\preg_match($regex . 'm', $url)) {
                    // This link is definitely blocked by configuration
                    $result->setBlocked([$blockable]);
                    $result->setBlockedExpressions([$expression]);
                    $this->blockedUrls[] = $url;
                    $this->blockedUrls = \array_values(\array_unique($this->blockedUrls));
                    break 2;
                }
            }
        }
        return $cb->runInlineStyleBlockRuleCallback($result, $url, $this, $this->match);
    }
    /**
     * Get the new URL for a blocked value.
     *
     * @param BlockedResult $result
     * @param string $dummyFileName
     * @param string $originalUrl
     */
    protected function generateDummyUrl($result, $dummyFileName, $originalUrl) {
        $pseudoMatch = new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\TagAttributeMatch(
            null,
            null,
            null,
            [],
            null,
            null,
            null,
            null
        );
        $this->matcher->applyConsentAttributes($result, $pseudoMatch);
        $pseudoMatch->setAttribute(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\Constants::URL_QUERY_ARG_ORIGINAL_URL_IN_STYLE,
            \sprintf('%s-', \base64_encode($originalUrl))
        );
        // add trailing `-` to avoid removal of `==`]
        $configuredUrl = $this->matcher->getHeadlessContentBlocker()->getInlineStyleDummyUrlPath();
        return add_query_arg(
            $pseudoMatch->getAttributes(),
            ($configuredUrl !== null ? $configuredUrl : self::DEFAULT_DUMMY_URL) . $dummyFileName
        );
    }
    /**
     * Get the style as string from our match.
     */
    protected function getStyle() {
        if (
            $this->match instanceof
            \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\finder\match\StyleInlineAttributeMatch
        ) {
            return $this->match->getStyle(\true);
        } else {
            return $this->match->getStyle();
        }
    }
}
