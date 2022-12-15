<?php

namespace DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils;

// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Base i18n management for backend and frontend for a package.
 * For non-utils packages you need to extend from this class and
 * properly fill the constructor.
 */
class PackageLocalization {
    use Localization;
    private $rootSlug;
    private $packageDir;
    /**
     * C'tor.
     *
     * @param string $rootSlug Your workspace scope name.
     * @param string $packageDir Absolute path to your package.
     * @codeCoverageIgnore
     */
    protected function __construct($rootSlug, $packageDir) {
        $this->rootSlug = $rootSlug;
        $this->packageDir = $packageDir;
    }
    /**
     * Get the directory where the languages folder exists.
     *
     * @param string $type
     * @return string[]
     */
    protected function getPackageInfo($type) {
        $textdomain = $this->getRootSlug() . '-' . $this->getPackage();
        if ($type === \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::LOCALIZATION_BACKEND) {
            return [path_join($this->getPackageDir(), 'languages/backend'), $textdomain, $this->getPackage()];
        } else {
            return [path_join($this->getPackageDir(), 'languages/frontend/json'), $textdomain, $this->getPackage()];
        }
    }
    /**
     * Getter.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getRootSlug() {
        return $this->rootSlug;
    }
    /**
     * Get package name.
     *
     * @return string
     */
    public function getPackage() {
        return \basename($this->getPackageDir());
    }
    /**
     * Getter.
     *
     * @return string
     * @codeCoverageIgnore
     */
    public function getPackageDir() {
        return $this->packageDir;
    }
    /**
     * New instance.
     *
     * @param string $rootSlug
     * @param string $packageDir
     * @return PackageLocalization
     * @codeCoverageIgnore Instance getter
     */
    public static function instance($rootSlug, $packageDir) {
        return new \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\PackageLocalization($rootSlug, $packageDir);
    }
}
