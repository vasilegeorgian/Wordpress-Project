<?php

/**
 * Verse.php
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
 * Verse Provider
 * Create immersive interactive content with your videos.
 *
 * @link https://verse.com
 *
 */
class Verse extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.verse.com/services/oembed/?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['verse.com'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~verse\\.com/stories/([^/]+)~i', (string) $url);
    }
    /** inline {@inheritdoc} */
    public function normalizeUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }
    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $attr = [];
        $attr[] = 'src="' . $this->url . '"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'webkitallowfullscreen mozallowfullscreen allowfullscreen';
        return ['type' => 'rich', 'provider_name' => 'Verse', 'provider_url' => 'https://verse.com', 'title' => 'Unknown title', 'html' => '<iframe ' . \implode(' ', $attr) . '></iframe>'];
    }
}
