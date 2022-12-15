<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins\scanner;

/**
 * Describe scan options for a specific expression.
 */
class Rule {
    private $expression;
    /**
     * Group name(s).
     *
     * @var null|string[]
     */
    private $assignedToGroups;
    /**
     * A list of query argument validations. Example:
     *
     * ```
     * [
     *      [
     *          'queryArg' => 'id',
     *          'isOptional' => true,
     *          'regexp' => '/^UA-/'
     *      ]
     * ]
     * ```
     */
    private $queryArgs;
    /**
     * C'tor.
     *
     * @param string $expression
     * @param string|string[] $assignedToGroups
     * @param array[] $queryArgs
     * @codeCoverageIgnore
     */
    public function __construct($expression, $assignedToGroups = [], $queryArgs = []) {
        $this->expression = $expression;
        $this->assignedToGroups = \is_array($assignedToGroups) ? $assignedToGroups : [$assignedToGroups];
        $this->queryArgs = $queryArgs;
    }
    /**
     * Check if a given URL matches our query argument validations.
     *
     * @param string $url
     */
    public function urlMatchesQueryArgumentValidations($url) {
        // E.g. URLs without Scheme
        if (\filter_var(set_url_scheme($url, 'http'), \FILTER_VALIDATE_URL)) {
            $query = $this->parseUrlQueryEncodedSafe($url);
            // Remove empty values, so they get considered as null
            foreach ($query as $key => $value) {
                if (empty($value)) {
                    $query[$key] = null;
                }
            }
            foreach ($this->queryArgs as $queryKey => $queryArg) {
                $queryKey = $queryArg['queryArg'];
                $isOptional = $queryValidation['isOptional'] ?? \false;
                $queryValue = $query[$queryKey] ?? null;
                if (!$isOptional && $queryValue === null) {
                    return \false;
                } elseif ($isOptional && $queryValue === null) {
                    continue;
                }
                if ($queryValue !== null) {
                    $regexp = $queryArg['regexp'] ?? null;
                    if ($regexp !== null && !\preg_match($regexp, $queryValue)) {
                        return \false;
                    }
                }
            }
            return \true;
        }
        return \false;
    }
    /**
     * In some cases, a URL could contain `&#038;` instead of `&`. This function returns the
     * query string decoded from an URL whether it is using `&` or `&#038;`.
     *
     * @param string $url
     * @param int $iteration As this function is recursively used, we need to pass the iteration so we can e.g.
     *                       avoid memory leaks when using a `$url` like `https://www.google.com/recaptcha/api.js?hl=en&ver=6.0.2#038;render=explicit`.
     *                       Why? As you can see in the URL, `#038;` is used without `&` -> falsy query args,
     *                       but should be treated as-is.
     */
    protected function parseUrlQueryEncodedSafe($url, $iteration = 0) {
        $queryString = \parse_url($url, \PHP_URL_QUERY);
        $query = [];
        if (!empty($queryString)) {
            $unsafeContainsString = \sprintf('?%s#038;', $queryString);
            if (\strpos($url, $unsafeContainsString) !== \false && $iteration < 2) {
                return $this->parseUrlQueryEncodedSafe(wp_specialchars_decode($url), $iteration + 1);
            } else {
                \parse_str($queryString, $query);
            }
        }
        return $query;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getExpression() {
        return $this->expression;
    }
    /**
     * Getter.
     *
     * @return null|string[]
     * @codeCoverageIgnore
     */
    public function getAssignedToGroups() {
        return $this->assignedToGroups;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getQueryArgs() {
        return $this->queryArgs;
    }
}
