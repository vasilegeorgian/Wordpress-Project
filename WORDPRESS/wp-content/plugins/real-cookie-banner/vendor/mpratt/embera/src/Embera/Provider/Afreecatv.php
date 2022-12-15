<?php

/**
 * Afreecatv.php
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
 * Afreecatv Provider
 *
 * @link https://*.afree.ca *.afreecatv.com
 */
class Afreecatv extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://openapi.afreecatv.com/vod/embedinfo?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['*.afree.ca', '*.afreecatv.com'];
    /** inline {@inheritdoc} */
    protected $allowedParams = ['maxwidth', 'maxheight', 'width', 'height'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    protected $responsiveSupport = \false;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~(afree\\.ca|afreecatv\\.com)/(ST|PLAYER/STATION)/([^/]+)~i', (string) $url);
    }
    /** inline {@inheritdoc} */
    public function normalizeUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        $url->convertToHttps();
        $url->removeLastSlash();
        return $url;
    }
}
