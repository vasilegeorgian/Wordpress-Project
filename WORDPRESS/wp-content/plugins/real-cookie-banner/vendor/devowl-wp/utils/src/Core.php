<?php

namespace DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils;

\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
/**
 * Base class for the applications Core class.
 */
trait Core {
    /**
     * The stored plugin data.
     */
    private $plugin_data;
    /**
     * The plugins activator class.
     *
     * @see Activator
     */
    private $activator;
    /**
     * The plugins asset class.
     *
     * @see Assets
     */
    private $assets;
    /**
     * The utils service class.
     *
     * @see Service
     */
    private $service;
    /**
     * The constructor handles the core startup mechanism.
     *
     * The constructor is protected because a factory method should only create
     * a Core object.
     */
    protected function construct() {
        // Define lazy constants
        $pluginFile = $this->getPluginConstant(
            \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_FILE
        );
        // Register immediate actions and filters
        $this->activator = $this->getPluginClassInstance(
            \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CLASS_ACTIVATOR
        );
        $this->assets = $this->getPluginClassInstance(
            \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CLASS_ASSETS
        );
        $this->service = \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Service::instance($this);
        add_action('after_setup_theme', [$this, 'i18n']);
        // `after_setup_theme` cause `functions.php` can add additional hooks for i18n
        add_action('plugins_loaded', [$this, 'updateDbCheck']);
        add_action('init', [$this, 'init']);
        add_action('rest_api_init', [$this->getService(), 'rest_api_init']);
        add_action('admin_notices', [$this->getService(), 'admin_notices']);
        // Localize the plugin and package itself
        $this->getPluginClassInstance(
            \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CLASS_LOCALIZATION
        )->hooks();
        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\PackageLocalization::instance(
            $this->getPluginConstant(
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_ROOT_SLUG
            ),
            \dirname(__DIR__)
        )->hooks();
        register_activation_hook($pluginFile, [$this->getActivator(), 'install']);
        register_activation_hook($pluginFile, [$this->getActivator(), 'activate']);
        register_deactivation_hook($pluginFile, [$this->getActivator(), 'deactivate']);
    }
    /**
     * The plugin is loaded. Start to register the localization (i18n) files.
     * Also respect packages in vendor dir.
     */
    public function i18n() {
        load_plugin_textdomain(
            $this->getPluginConstant(
                \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_TEXT_DOMAIN
            ),
            \false,
            \dirname(
                plugin_basename(
                    $this->getPluginConstant(
                        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_FILE
                    )
                )
            ) . $this->getPluginData('DomainPath')
        );
        // Include text domains of packages
        $packages = $this->getInternalPackages();
        $locale = determine_locale();
        foreach ($packages as $package => $path) {
            $textdomain =
                $this->getPluginConstant(
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_ROOT_SLUG
                ) .
                '-' .
                $package;
            $locale = apply_filters('plugin_locale', $locale, $textdomain);
            $mofile = \dirname($path) . '/' . $package . '-' . $locale . '.mo';
            load_textdomain($textdomain, $mofile);
        }
    }
    /**
     * Updates the database version in the options table.
     * It also installs the needed database tables.
     */
    public function updateDbCheck() {
        $installed = $this->getActivator()->getDatabaseVersion();
        if (
            $installed !==
            $this->getPluginConstant(\DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_VERSION)
        ) {
            $this->debug('(Re)install the database tables', __FUNCTION__);
            $this->getActivator()->install();
            /**
             * A new version got installed for this plugin. Consider to use the `versionCompareOlderThan()` method from the Core class.
             *
             * @hook DevOwl/Utils/NewVersionInstallation/$slug
             * @param {string} $installed Previously version, can be also `null` for new installations
             */
            do_action(
                'DevOwl/Utils/NewVersionInstallation/' .
                    $this->getPluginConstant(
                        \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_SLUG
                    ),
                $installed
            );
        }
    }
    /**
     * Get a list of internal packages (our own, symlinked from the monorepo).
     *
     * @return object
     */
    public function getInternalPackages() {
        $result = [];
        $globPath = path_join(
            $this->getPluginConstant(\DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_PATH),
            'vendor/' .
                $this->getPluginConstant(
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_ROOT_SLUG
                ) .
                '/*/languages/backend/*.pot'
        );
        foreach (\glob($globPath) as $path) {
            $package = \pathinfo($path, \PATHINFO_FILENAME);
            $result[$package] = $path;
        }
        return $result;
    }
    /**
     * Gets the plugin data.
     *
     * @param string $key The key of the data to return
     * @return string[]|string|null
     * @see https://developer.wordpress.org/reference/functions/get_plugin_data/
     */
    public function getPluginData($key = null) {
        // @codeCoverageIgnoreStart
        if (!\defined('PHPUNIT_FILE')) {
            require_once ABSPATH . '/wp-admin/includes/plugin.php';
        }
        // @codeCoverageIgnoreEnd
        $data = isset($this->plugin_data)
            ? $this->plugin_data
            : ($this->plugin_data = get_plugin_data(
                $this->getPluginConstant(
                    \DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Constants::PLUGIN_CONST_FILE
                ),
                \false,
                \false
            ));
        return $key === null ? $data : (isset($data[$key]) ? $data[$key] : null);
    }
    /**
     * Getter.
     *
     * @return Activator
     * @codeCoverageIgnore
     */
    public function getActivator() {
        return $this->activator;
    }
    /**
     * Getter
     *
     * @return Assets
     * @codeCoverageIgnore
     */
    public function getAssets() {
        return $this->assets;
    }
    /**
     * Getter
     *
     * @return Service
     * @codeCoverageIgnore
     */
    public function getService() {
        return $this->service;
    }
    /**
     * Checks if a previously installed version is lower than an expected version.
     * Additionally, we can check for a prerelease version, too. The `$allowedPrerelease` needs
     * to be an array (e.g. `["2.15.1", "2.16.0"]`), and if the installed version is a prerelease
     * (e.g. `2.15.1-9507`), the version `2.15.1` gets extracted and checked for existence in the array.
     *
     * Usage with `$prereleaseAdditionalCheck`: You can pass an additional callback which is executed before
     * returning `true` when a prerelease got found. An example scenario for this callable is to check for
     * a specific database table if you drop a column. Why is this needed? Imagine you are sending multiple
     * prerelease to a customer.
     *
     * @param string|false $installed
     * @param string $version
     * @param string[] $allowedPrerelease
     * @param callable $prereleaseAdditionalCheck `($prereleaseVersion, $prereleaseCiIid) => boolean`
     */
    public static function versionCompareOlderThan(
        $installed,
        $version,
        $allowedPrerelease = [],
        $prereleaseAdditionalCheck = null
    ) {
        if ($installed) {
            $prerelease = \explode('-', $installed, 2);
            $prereleaseVersion = \count($prerelease) > 1 ? $prerelease[0] : null;
            $prereleaseCiIid = \count($prerelease) > 1 && \is_numeric($prerelease[1]) ? \intval($prerelease[1]) : null;
            if (\version_compare($installed, $version, '<=') || $prereleaseVersion === $version) {
                return \true;
            }
            if (\count($allowedPrerelease) > 0 && $prereleaseVersion !== null) {
                if (\in_array($prereleaseVersion, $allowedPrerelease, \true)) {
                    if (\is_callable($prereleaseAdditionalCheck)) {
                        return $prereleaseAdditionalCheck($prereleaseVersion, $prereleaseCiIid);
                    }
                    return \true;
                }
            }
        }
        return \false;
    }
}
