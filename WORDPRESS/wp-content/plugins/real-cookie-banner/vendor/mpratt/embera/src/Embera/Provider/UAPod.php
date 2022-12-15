<?php

/**
 * UAPod.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DevOwl\RealCookieBanner\Vendor\Embera\Provider;

use DevOwl\RealCookieBanner\Vendor\Embera\Url;
/**
 * UAPod Provider
 *
 * @link https://uapod.univ-antilles.fr
 */
class UAPod extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://uapod.univ-antilles.fr/oembed/?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['uapod.univ-antilles.fr'];
    /** inline {@inheritdoc} */
    protected $allowedParams = ['maxwidth', 'maxheight'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    protected $responsiveSupport = \false;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~uapod\\.univ\\-antilles\\.fr/video/([^/]+)~i', (string) $url);
    }
    /** inline {@inheritdoc} */
    public function normalizeUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }
}
