<?php

/**
 * Rumble.php
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
 * Rumble Provider
 * Rumble is your rights management video platform. Host, distribute and monetize all your profess...
 *
 * @link https://rumble.com
 *
 */
class Rumble extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://rumble.com/api/Media/oembed.json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['rumble.com'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    protected $responsiveSupport = \false;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~rumble\\.com/([^/]+)\\.html$~i', (string) $url);
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
        if (!empty($response['html'])) {
            $response['html'] = \preg_replace('~title="(.+)"~', 'title=""', $response['html']);
        }
        return $response;
    }
    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        \preg_match('~rumble\\.com/([^\\-]+)~i', (string) $this->url, $matches);
        $embedUrl = 'https://rumble.com/embed/' . $matches['1'] . '/';
        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'title=""';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';
        return ['type' => 'video', 'provider_name' => 'Rumble', 'provider_url' => 'https://rumble.com', 'title' => 'Unknown title', 'html' => '<iframe ' . \implode(' ', $attr) . '></iframe>'];
    }
}
