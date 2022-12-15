<?php

/**
 * EduMedia.php
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
 * EduMedia Provider
 * HTML5 interactive simulations, videos and quizz in physics, chemistry, biology, earth science and math.
 *
 * @link https://www.edumedia-sciences.com
 */
class EduMedia extends \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderAdapter implements \DevOwl\RealCookieBanner\Vendor\Embera\Provider\ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://www.edumedia-sciences.com/oembed.json';
    /** inline {@inheritdoc} */
    protected static $hosts = ['edumedia-sciences.com'];
    /** inline {@inheritdoc} */
    protected $httpsSupport = \true;
    /** inline {@inheritdoc} */
    public function validateUrl(\DevOwl\RealCookieBanner\Vendor\Embera\Url $url)
    {
        return (bool) \preg_match('~edumedia-sciences\\.com/(?:[a-z]{2})/media/([0-9]+)(?:-(?:[^/]+))?$~i', (string) $url);
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
        \preg_match('~edumedia-sciences\\.com/([a-z]{2})/media/([0-9]+)~i', (string) $this->url, $m);
        $embedUrl = 'https://www.edumedia-sciences.com/' . $m['1'] . '/media/frame/' . $m['2'] . '/';
        $attr = [];
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'frameborder="0"';
        return ['type' => 'rich', 'provider_name' => 'EduMedia', 'provider_url' => 'https://www.edumedia-sciences.com', 'thumbnail_url' => 'https://www.edumedia-sciences.com/media/thumbnail/' . $m['2'], 'title' => 'Unknown title', 'html' => '<iframe ' . \implode(' ', $attr) . '></iframe>'];
    }
}
