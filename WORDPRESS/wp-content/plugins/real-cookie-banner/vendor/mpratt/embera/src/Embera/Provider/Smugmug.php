<?php

/**
 * Smugmug.php
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
 * Smugmug Provider
 * Whether you want a photo website that sells prints, secure client galleries or just need unlimi...
 *
 * @link https://smugmug.com
 * @see https://api.smugmug.com/services/oembed
 */
class Smugmug extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://api.smugmug.com/services/oembed/?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['*.smugmug.com'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~smugmug\\.com/([^/]+)/([^/]+)/([^/]+)$~i', (string) $url);
    }
    /** inline {@inheritdoc} */
    public function normalizeUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();
        return $url;
    }
    /** inline {@inheritdoc} */
    public function modifyResponse(array $response = [])
    {
        if (empty($response['html']) && $response['type'] == 'photo') {
            $html = [];
            $html[] = '<div class="smugmug-html">';
            $html[] = '<a href="' . $response['gallery_url'] . '" title="">';
            $html[] = '<img src="' . $response['url'] . '" alt=""" title="">';
            $html[] = '</a>';
            $html[] = '</div>';
            $response['html'] = \implode('', $html);
        }
        return $response;
    }
}
