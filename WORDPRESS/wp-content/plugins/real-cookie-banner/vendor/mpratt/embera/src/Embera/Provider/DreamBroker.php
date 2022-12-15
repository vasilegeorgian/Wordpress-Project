<?php

/**
 * DreamBroker.php
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
 * DreamBroker Provider
 *
 * @link https://dreambroker.com
 */
class DreamBroker extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://dreambroker.com/channel/oembed';
    /** inline {@inheritdoc} */
    protected static $hosts = ['dreambroker.com'];
    /** inline {@inheritdoc} */
    protected $allowedParams = ['maxwidth', 'maxheight'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    protected $responsiveSupport = \false;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~dreambroker\\.com/channel/([^/]+)/([^/]+)~i', (string) $url);
    }
}
