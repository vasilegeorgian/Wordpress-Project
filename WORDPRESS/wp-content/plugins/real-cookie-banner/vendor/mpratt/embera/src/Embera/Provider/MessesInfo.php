<?php

/**
 * MessesInfo.php
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
 * MessesInfo Provider
 * 
 *
 * @link https://messes.info
 *
 */
class MessesInfo extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'http://egliseinfo.catholique.fr/api/oembed?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['messes.info'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~messes\\.info/([^/]+)~i', (string) $url);
    }
    /** inline {@inheritdoc} */
    public function normalizeUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();
        return $url;
    }
}
