<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate;

use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\AutoptimizeCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BorlabsCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BreezeImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CacheEnablerImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CometCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\HummingbirdImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\LiteSpeedCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\MergeMinifyRefreshImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NginxHelperImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NitroPackImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SGOptimizeImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\W3TotalCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpFastestCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpOptimizeImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpRocketImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpSuperCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SwiftPerformanceCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\ThemifyImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CloudflareImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\IonosPerformanceCacheImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\OneComImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\RaidboxesImpl;
use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BunnyCDNCacheImpl;
use Exception;
/**
 * Use this class to detect used caching plugins / mechanism and trigger
 * an invalidate.
 */
class CacheInvalidator {
    const CACHE_IMPLEMENTATIONS = [
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\AutoptimizeCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\AutoptimizeCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpSuperCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpSuperCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpRocketImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpRocketImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\W3TotalCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\W3TotalCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpFastestCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpFastestCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\LiteSpeedCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\LiteSpeedCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BreezeImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BreezeImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpOptimizeImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\WpOptimizeImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SGOptimizeImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SGOptimizeImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\HummingbirdImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\HummingbirdImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CacheEnablerImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CacheEnablerImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NginxHelperImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NginxHelperImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CometCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CometCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BorlabsCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BorlabsCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SwiftPerformanceCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\SwiftPerformanceCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\MergeMinifyRefreshImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\MergeMinifyRefreshImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\ThemifyImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\ThemifyImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NitroPackImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\NitroPackImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CloudflareImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\CloudflareImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\OneComImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\OneComImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\RaidboxesImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\RaidboxesImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\IonosPerformanceCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\IonosPerformanceCacheImpl::class,
        \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BunnyCDNCacheImpl::IDENTIFIER =>
            \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches\BunnyCDNCacheImpl::class
    ];
    /**
     * Singleton instance.
     *
     * @var CacheInvalidator
     */
    private static $me = null;
    /**
     * C'tor.
     *
     * @codeCoverageIgnore
     */
    private function __construct() {
        // Silence is golden.
    }
    /**
     * Get implementations as instances.
     *
     * @codeCoverageIgnore
     */
    public function getImplementations() {
        $result = [];
        foreach (self::CACHE_IMPLEMENTATIONS as $id => $clazz) {
            $result[$id] = new $clazz();
        }
        return $result;
    }
    /**
     * Get all available caches.
     *
     * @return AbstractCache[]
     */
    public function getCaches() {
        $result = [];
        foreach ($this->getImplementations() as $id => $instance) {
            if ($instance->isActive()) {
                $result[$id] = $instance;
            }
        }
        return $result;
    }
    /**
     * Get all available caches with label.
     *
     * @return string[]
     */
    public function getLabels() {
        $result = [];
        foreach ($this->getCaches() as $key => $instance) {
            $result[$key] = $instance->label();
        }
        return $result;
    }
    /**
     * See `AbstractCache#excludeHtmlAttribute()`.
     *
     * @return string
     */
    public function getExcludeHtmlAttributesString() {
        $result = [];
        foreach ($this->getCaches() as $instance) {
            $result[] = $instance->excludeHtmlAttribute();
        }
        return \join(' ', $result);
    }
    /**
     * Invalidate all available caches.
     *
     * @param boolean $objectCache
     */
    public function invalidate($objectCache = \false) {
        $result = [];
        if ($objectCache) {
            $result['wp_cache_flush'] = wp_cache_flush();
        }
        foreach ($this->getCaches() as $cache => $value) {
            try {
                $result[$cache] = $value->invalidate();
            } catch (\Exception $e) {
                $result[$cache] = \false;
            }
        }
        return $result;
    }
    /**
     * Get singleton instance.
     *
     * @codeCoverageIgnore
     */
    public static function getInstance() {
        return self::$me === null
            ? (self::$me = new \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\CacheInvalidator())
            : self::$me;
    }
}
