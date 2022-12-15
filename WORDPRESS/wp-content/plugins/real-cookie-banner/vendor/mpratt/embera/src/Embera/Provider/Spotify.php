<?php

/**
 * Spotify.php
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
 * Spotify Provider
 * En Spotify, puedes encontrar toda la música que necesitas.
 *
 * @link https://spotify.com
 *
 */
class Spotify extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://open.spotify.com/oembed?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['open.spotify.com'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) (\preg_match('~spotify\\.com/(?:track|album|playlist|show|episode)/(?:[^/]+)(?:/[^/]*)?$~i', (string) $url) || \preg_match('~spotify\\.com/user/(?:[^/]+)/playlist/(?:[^/]+)/?$~i', (string) $url));
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
