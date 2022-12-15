<?php

/**
 * Knacki.info.php
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
 * Knacki Provider
 * No description.
 *
 * @link https://knaci.info
 *
 */
class Knacki extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://jdr.knacki.info/oembed?format=json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['jdr.knacki.info'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    protected $responsiveSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~jdr\\.knacki\\.info/meuh/([^/]+)~i', (string) $url);
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
    public function getFakeResponse()
    {
        $embedUrl = $this->url . '?embed';
        $attr = [];
        $attr[] = 'width="100%"';
        $attr[] = 'height="{height}"';
        $attr[] = 'scrolling="no"';
        $attr[] = 'frameborder="0"';
        $attr[] = 'src="' . $embedUrl . '"';
        return ['type' => 'rich', 'provider_name' => 'Knacki.info', 'provider_url' => 'https://jdr.knacki.info', 'title' => 'Unknown title', 'html' => '<iframe ' . \implode(' ', $attr) . '></iframe>'];
    }
}
