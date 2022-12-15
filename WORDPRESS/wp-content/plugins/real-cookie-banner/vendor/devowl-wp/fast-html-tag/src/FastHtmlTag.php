<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\AbstractFinder;
/**
 * Initialize a new parser.
 */
class FastHtmlTag {
    /**
     * Callbacks.
     *
     * @var callable[]
     */
    private $callbacks = [];
    /**
     * Callbacks for `SelectorSyntaxAttributeFunction`.
     *
     * @var callable[]
     */
    private $selectorSyntaxFunctions = [];
    /**
     * See `AbstractFinder`.
     *
     * @var AbstractFinder[]
     */
    private $finder = [];
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    public function __construct() {
        // Silence is golden.
    }
    /**
     * Add a finder scheme. See `finder/` for available ones.
     *
     * @param AbstractFinder $finder
     */
    public function addFinder($finder) {
        $this->finder[] = $finder;
    }
    /**
     * Add a callable. The first parameter is the HTML string and should return HTML.
     *
     * @param callable $callback
     */
    public function addCallback($callback) {
        $this->callbacks[] = $callback;
    }
    /**
     * Add a callable for a Selector Syntax function.
     *
     * The callback gets the following parameters and expects `boolean` as result:
     *
     * `SelectorSyntaxAttributeFunction $function, SelectorSyntaxMatch $match, mixed $value`
     *
     * @param string $functionName
     * @param callable $callback
     */
    public function addSelectorSyntaxFunction($functionName, $callback) {
        $this->selectorSyntaxFunctions[$functionName] = $callback;
    }
    /**
     * Allows to parse and modify any content. This could be e.g. a JSON string
     * (each value gets iterated and parsed if it is a HTML).
     *
     * @param string $mixed
     */
    public function modifyAny($mixed) {
        $json = \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::isJson($mixed);
        // Avoid JSON primitives to be replaced
        if (\is_int($json) || $json === \true || \is_float($json)) {
            return $mixed;
        }
        if ($json !== \false) {
            // We have now a complete JSON array, let's walk it recursively and apply content blocker
            \array_walk_recursive($json, function (&$value) {
                if (\DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::isHtml($value)) {
                    $value = $this->modifyHtml($value);
                }
            });
            return \json_encode($json);
        } else {
            // Usual string
            return $this->modifyHtml($mixed);
        }
    }
    /**
     * Allow to parse and modify a given HTML string.
     *
     * @param string $html
     */
    public function modifyHtml($html) {
        // With our complex regular expressions, `preg_replace[_callback]` can sometimes lead
        // to `PREG_BACKTRACK_LIMIT_ERROR` errors with large strings. Unfortunately, we can only
        // fix this by setting the backtrack limit to a very high value via PHP configuration (`php.ini`)
        $originalBacktrackLimit = \function_exists('ini_get') ? \ini_get('pcre.backtrack_limit') : \false;
        $canModifyBacktrackLimit =
            $originalBacktrackLimit !== \false && wp_is_ini_value_changeable('pcre.backtrack_limit');
        if ($canModifyBacktrackLimit) {
            // phpcs:disable WordPress.PHP.NoSilencedErrors.Discouraged
            @\ini_set('pcre.backtrack_limit', '10000000');
            // phpcs:enable WordPress.PHP.NoSilencedErrors.Discouraged
        }
        foreach ($this->finder as $finder) {
            $finder->setFastHtmlTag($this);
            $html = $finder->replace($html);
            $finder->setFastHtmlTag(null);
        }
        if ($canModifyBacktrackLimit) {
            // phpcs:disable WordPress.PHP.NoSilencedErrors.Discouraged
            @\ini_set('pcre.backtrack_limit', $originalBacktrackLimit);
            // phpcs:enable WordPress.PHP.NoSilencedErrors.Discouraged
        }
        foreach ($this->callbacks as $callback) {
            $html = $callback($html);
        }
        return $html;
    }
    /**
     * Get a defined selector syntax function by name.
     *
     * @param string $functionName
     */
    public function getSelectorSyntaxFunction($functionName) {
        return $this->selectorSyntaxFunctions[$functionName] ?? null;
    }
}
