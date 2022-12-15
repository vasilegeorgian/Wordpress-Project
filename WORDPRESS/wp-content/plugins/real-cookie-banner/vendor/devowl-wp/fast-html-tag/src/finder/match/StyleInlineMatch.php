<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\StyleInlineFinder;
use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils;
/**
 * Match defining a `StyleInlineFinder` match.
 */
class StyleInlineMatch extends \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\AbstractMatch {
    private $style;
    /**
     * C'tor.
     *
     * @param StyleInlineFinder $finder
     * @param string $originalMatch
     * @param array $attributes
     * @param string $style
     */
    public function __construct($finder, $originalMatch, $attributes, $style) {
        parent::__construct($finder, $originalMatch, 'style', $attributes);
        $this->style = $style;
    }
    // See `AbstractRegexFinder`.
    public function render() {
        $attributes = $this->getAttributes();
        return $this->encloseRendered(
            $this->hasChanged()
                ? \sprintf(
                    '<%1$s%2$s>%3$s</%1$s>',
                    $this->getTag(),
                    \count($attributes) > 0
                        ? ' ' . \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::htmlAttributes($attributes)
                        : '',
                    $this->getStyle()
                )
                : $this->getOriginalMatch()
        );
    }
    /**
     * Check if the style is CSS.
     */
    public function isCSS() {
        $type = $this->getAttribute('type');
        return empty($type) ? \true : \strpos($type, 'css') !== \false;
    }
    /**
     * Setter.
     *
     * @param string $style
     * @codeCoverageIgnore
     */
    public function setStyle($style) {
        $this->setChanged(\true);
        $this->style = $style;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getStyle() {
        return $this->style;
    }
    /**
     * Getter.
     *
     * @return StyleInlineFinder
     * @codeCoverageIgnore
     */
    public function getFinder() {
        return parent::getFinder();
    }
}
