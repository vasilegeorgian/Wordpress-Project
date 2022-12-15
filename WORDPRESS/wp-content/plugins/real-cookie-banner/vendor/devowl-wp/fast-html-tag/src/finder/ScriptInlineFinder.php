<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\ScriptInlineMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils;
/**
 * Find inline scripts.
 */
class ScriptInlineFinder extends \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\AbstractRegexFinder {
    /**
     * Inline scripts are completely different than usual URL scripts. We need to get
     * all available inline scripts, scrape their content and check if it needs to blocked.
     *
     * **Attention**: This also captures usual `script` tags, so you have to check this manually
     * via PHP if the `src` tag is given!
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Attributes string after `<script`
     *      $match[2] => Full inline script
     *
     * @see https://regex101.com/r/7lYPHA/3
     */
    const SCRIPT_INLINE_REGEXP = '/<script([^>]*)>([^<]*(?:<(?!\\/script>)[^<]*)*)<\\/script>/smix';
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    public function __construct() {
        // Silence is golden.
    }
    // See `AbstractRegexFinder`.
    public function getRegularExpression() {
        return self::SCRIPT_INLINE_REGEXP;
    }
    /**
     * See `AbstractRegexFinder`.
     *
     * @param array $m
     */
    public function createMatch($m) {
        list($attributes, $script) = self::prepareMatch($m);
        // Ignore scripts with `src` attribute as they are not treated as inline scripts
        if (self::isNotAnInlineScript($attributes)) {
            return \false;
        }
        return new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\ScriptInlineMatch(
            $this,
            $m[0],
            $attributes,
            $script
        );
    }
    /**
     * Checks if the passed attributes of a found `<script` tag is not an inline script.
     *
     * @param array $attributes
     */
    public static function isNotAnInlineScript($attributes) {
        return isset($attributes['src']) && !empty($attributes['src']);
    }
    /**
     * Prepare the result match of a `createRegexp` regexp.
     *
     * @param array $m
     */
    public static function prepareMatch($m) {
        $attributes = \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::parseHtmlAttributes($m[1]);
        $script = $m[2];
        return [$attributes, $script];
    }
}
