<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\SelectorSyntaxMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils;
/**
 * An attribute definition for `SelectorSyntaxFinder` with attribute name, operator
 * and the requested value.
 */
class SelectorSyntaxAttribute {
    private $finder;
    private $attribute;
    private $comparator;
    private $value;
    /**
     * Functions.
     *
     * @var SelectorSyntaxAttributeFunction[]
     */
    private $functions = [];
    const COMPARATOR_EXISTS = 'EXISTS';
    const COMPARATOR_EQUAL = '=';
    const COMPARATOR_CONTAINS = '*=';
    const COMPARATOR_STARTS_WITH = '^=';
    const COMPARATOR_ENDS_WITH = '$=';
    const ALLOWED_COMPARATORS = [
        self::COMPARATOR_EQUAL,
        self::COMPARATOR_CONTAINS,
        self::COMPARATOR_STARTS_WITH,
        self::COMPARATOR_ENDS_WITH
    ];
    /**
     * C'tor.
     *
     * @param SelectorSyntaxFinder $finder
     * @param string $attribute
     * @param string $comparator
     * @param string $value
     * @param string $functions
     * @codeCoverageIgnore
     */
    public function __construct($finder, $attribute, $comparator, $value, $functions) {
        $this->finder = $finder;
        $this->attribute = $attribute;
        $this->comparator = $comparator;
        $this->value = $value;
        if (!empty($functions)) {
            $this->functions = \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttributeFunction::fromExpression(
                $this,
                $functions
            );
        }
    }
    /**
     * Checks if the current attribute and value matches the comparator.
     *
     * @param string $value
     */
    public function matchesComparator($value) {
        switch ($this->comparator) {
            case self::COMPARATOR_EXISTS:
                return $value !== null;
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_EQUAL:
                return $value === $this->getValue();
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_CONTAINS:
                return $value !== null && \strpos($value, $this->getValue()) !== \false;
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_STARTS_WITH:
                return \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::startsWith($value, $this->getValue());
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_ENDS_WITH:
                return \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::endsWith($value, $this->value);
            // @codeCoverageIgnoreStart
            default:
                return \false;
        }
    }
    /**
     * Checks if the current attribute satisfies the passed functions.
     *
     * @param SelectorSyntaxMatch $match
     */
    public function satisfiesFunctions($match) {
        foreach ($this->functions as $fn) {
            if (!$fn->execute($match)) {
                return \false;
            }
        }
        return \true;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getAttribute() {
        return $this->attribute;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getComparator() {
        return $this->comparator;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getValue() {
        return $this->value;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getFinder() {
        return $this->finder;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getFunctions() {
        return $this->functions;
    }
    /**
     * Setter.
     *
     * @param SelectorSyntaxFinder $finder
     * @codeCoverageIgnore
     */
    public function setFinder($finder) {
        $this->finder = $finder;
    }
}
