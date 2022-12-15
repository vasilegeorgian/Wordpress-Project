<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches;

use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\AbstractCache;
/**
 * NitroPack.
 *
 * @see https://wordpress.org/plugins/nitropack/
 * @codeCoverageIgnore
 */
class NitroPackImpl extends \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\AbstractCache {
    const IDENTIFIER = 'nitropack';
    // Documented in AbstractCache
    public function isActive() {
        return \function_exists('nitropack_sdk_purge');
    }
    // Documented in AbstractCache
    public function invalidate() {
        return nitropack_sdk_purge();
    }
    /**
     * Exclude JavaScript and CSS assets.
     *
     * @param ExcludeAssets $excludeAssets
     */
    public function excludeAssetsHook($excludeAssets) {
        $excludeAttribute = $this->excludeHtmlAttribute();
        foreach (['js', 'css'] as $type) {
            $typeTag = $type === 'js' ? 'script' : 'style';
            add_filter(
                \sprintf('%s_loader_tag', $typeTag),
                function ($tag, $handle) use ($type, $excludeAssets, $typeTag, $excludeAttribute) {
                    $handles = $excludeAssets->getHandles()[$type];
                    if (\in_array($handle, $handles, \true) && \strpos($tag, $excludeAttribute) === \false) {
                        return \str_replace(
                            \sprintf('<%s ', $typeTag),
                            \sprintf('<%s %s ', $typeTag, $excludeAttribute),
                            $tag
                        );
                    }
                    return $tag;
                },
                10,
                2
            );
        }
    }
    // Documented in AbstractCache
    public function label() {
        return 'NitroPack';
    }
    // Documented in AbstractCache
    public function excludeHtmlAttribute() {
        return 'nitro-exclude';
    }
}
