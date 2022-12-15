<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\caches;

use DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\AbstractCache;
use Ionos\Performance\Manager;
/**
 * IONOS Performance plugin.
 *
 * @codeCoverageIgnore
 */
class IonosPerformanceCacheImpl extends \DevOwl\RealCookieBanner\Vendor\DevOwl\CacheInvalidate\AbstractCache {
    const IDENTIFIER = 'ionos-performance';
    // Documented in AbstractCache
    public function isActive() {
        return \class_exists(\Ionos\Performance\Manager::class);
    }
    // Documented in AbstractCache
    public function invalidate() {
        return \Ionos\Performance\Manager::flush_total_cache(\true);
    }
    // Documented in AbstractCache
    public function label() {
        return 'IONOS Performance';
    }
}
