<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license;

use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\client\LicenseActivation as ClientLicenseActivation;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate;
use DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils;
use WP_Error;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request
// @codeCoverageIgnoreEnd
/**
 * Use this trait together in `PluginUpdate`.
 */
trait PluginUpdateLicensePool {
    /**
     * License instances.
     *
     * @var License[]
     */
    private $licenses;
    /**
     * License activation client.
     *
     * @var ClientLicenseActivation
     */
    private $licenseActivationClient;
    /**
     * C'tor.
     */
    protected function constructPluginUpdateLicensePool() {
        $this->licenseActivationClient = \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\client\LicenseActivation::instance(
            $this
        );
    }
    /**
     * Update license settings for this plugin.
     *
     * @param array $licenses Pass `null` to activate all unlicensed, free sites
     * @param boolean $telemetry
     * @param boolean $newsletterOptIn
     * @param string $firstName
     * @param string $email
     */
    public function updateLicenseSettings(
        $licenses,
        $telemetry = \false,
        $newsletterOptIn = \false,
        $firstName = '',
        $email = ''
    ) {
        // Validate free products
        if ($licenses === null) {
            if ($this->getInitiator()->isExternalUpdateEnabled()) {
                return new \WP_Error(
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate::ERROR_CODE_INVALID_LICENSES,
                    __('You need to provide at least one license!', RPM_WP_CLIENT_TD),
                    ['status' => 400]
                );
            }
            // Fallback to use free licenses
            $licenses = [];
            foreach ($this->getUniqueLicenses() as $license) {
                if (empty($license->getActivation()->getCode())) {
                    $licenses[] = [
                        'blog' => $license->getBlogId(),
                        'installationType' =>
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license\License::INSTALLATION_TYPE_PRODUCTION,
                        'code' => $license->getActivation()->getCode(),
                        'noUsage' => $license->isNoUsage()
                    ];
                }
            }
        }
        // Validate newsletter input
        if ($newsletterOptIn && (empty($firstName) || empty($email))) {
            return new \WP_Error(
                \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate::ERROR_CODE_INVALID_NEWSLETTER,
                __(
                    'You must provide an email address and a name if you want to subscribe to the newsletter!',
                    RPM_WP_CLIENT_TD
                ),
                ['status' => 400]
            );
        }
        $validateKeys = $this->validateLicenseCodes($licenses, $telemetry, $newsletterOptIn, $firstName, $email);
        if (is_wp_error($validateKeys)) {
            return $validateKeys;
        }
        // Synchronize announcements
        $this->getAnnouncementPool()->sync(\true);
        return \true;
    }
    /**
     * Validate license codes.
     *
     * @param array $licenses
     * @param boolean $telemetry
     * @param boolean $newsletterOptIn
     * @param string $firstName
     * @param string $email
     */
    protected function validateLicenseCodes($licenses, $telemetry, $newsletterOptIn, $firstName, $email) {
        $invalidKeys = [];
        $currentLicenses = $this->getLicenses(\true);
        $provider = $this->getInitiator()->getPrivacyProvider();
        // At least one license need to be used
        if ($this->getFirstFoundLicense() === \false && $this->getInitiator()->isExternalUpdateEnabled()) {
            $noUsageLicenses = \array_filter($licenses, function ($noUsageLicense) {
                return $noUsageLicense['noUsage'];
            });
            if (\count($noUsageLicenses) === \count($licenses)) {
                return new \WP_Error(
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate::ERROR_CODE_NONE_IN_USAGE,
                    __('You must have at least one license of a site in use within your multisite.', RPM_WP_CLIENT_TD)
                );
            }
        }
        // Validate license keys
        foreach ($licenses as $value) {
            $blogId = $value['blog'];
            $installationType = $value['installationType'];
            $code = $value['code'];
            $noUsage = $value['noUsage'];
            if (isset($currentLicenses[$blogId])) {
                $activation = $currentLicenses[$blogId]->getActivation();
                if ($noUsage) {
                    $activation->skip(\true);
                } else {
                    $result = $activation->activate(
                        $code,
                        $installationType,
                        $telemetry,
                        $newsletterOptIn,
                        $firstName,
                        $email
                    );
                    // Ignore already existing activations as they should not lead to UI errors
                    if (
                        is_wp_error($result) &&
                        $result->get_error_code() !==
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license\LicenseActivation::ERROR_CODE_ALREADY_ACTIVATED
                    ) {
                        $errorText = \join(' ', $result->get_error_messages());
                        switch ($result->get_error_code()) {
                            case 'http_request_failed':
                                $errorText = \sprintf(
                                    // translators:
                                    __(
                                        'The license server for checking the license cannot be reached. Please check if you are blocking access to %s e.g. by a firewall.',
                                        RPM_WP_CLIENT_TD
                                    ),
                                    $provider
                                );
                                break;
                            default:
                                break;
                        }
                        $invalidKeys[$blogId] = [
                            'validateStatus' => 'error',
                            'hasFeedback' => \true,
                            'help' => $errorText,
                            'debug' => $result
                        ];
                    }
                }
            } else {
                return new \WP_Error(
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate::ERROR_CODE_BLOG_NOT_FOUND,
                    '',
                    ['blog' => $blogId]
                );
            }
        }
        return empty($invalidKeys)
            ? \true
            : new \WP_Error(
                \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\PluginUpdate::ERROR_CODE_INVALID_KEYS,
                $invalidKeys[\array_keys($invalidKeys)[0]]['help'],
                ['invalidKeys' => $invalidKeys]
            );
    }
    /**
     * Get the license for the current blog id.
     *
     * @return License
     */
    public function getCurrentBlogLicense() {
        $blogId = get_current_blog_id();
        $licenses = $this->getLicenses();
        // Fallback to first found license (can be the case, when per-site multisite-licensing is disabled)
        return isset($licenses[$blogId]) ? $licenses[$blogId] : \array_shift($licenses);
    }
    /**
     * Check if plugin is fully licensed.
     */
    public function isLicensed() {
        foreach ($this->getUniqueLicenses(\true) as $license) {
            if (empty($license->getActivation()->getCode())) {
                return \false;
            }
        }
        return \true;
    }
    /**
     * Check if plugin is unlicensed (also partially licensed).
     */
    public function isUnlicensed() {
        $licensed = $this->isLicensed();
        $partialLicensed = $this->isPartialLicensed();
        return !$licensed || $partialLicensed;
    }
    /**
     * Check if plugin is only partial licensed (e.g. missing sites in multisite).
     */
    public function isPartialLicensed() {
        // If fully licensed, it can never be partial
        if ($this->isLicensed()) {
            return \false;
        }
        foreach ($this->getUniqueLicenses(\true) as $license) {
            if (!empty($license->getActivation()->getCode())) {
                return \true;
            }
        }
        return \false;
    }
    /**
     * Get first found license as we can not update per-site in multisite (?).
     */
    public function getFirstFoundLicense() {
        foreach ($this->getUniqueLicenses(\true) as $license) {
            $code = $license->getActivation()->getCode();
            if (!empty($code)) {
                return $license;
            }
        }
        return \false;
    }
    /**
     * Get all licenses for each blog (when multisite is enabled). Attention: If a blog
     * uses the same hostname as a previous known blog, they share the same `License` instance.
     *
     * @param boolean $checkRemoteStatus
     * @return License[]
     */
    public function getLicenses($checkRemoteStatus = \false) {
        if ($this->licenses === null || $checkRemoteStatus) {
            $blogIds = $this->getPotentialBlogIds();
            $hostnames = \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\Utils::mapBlogsToHosts(
                $blogIds
            );
            // Create licenses per hostname
            $hostLicenses = [];
            foreach ($hostnames['host'] as $host => $hostBlogIds) {
                $hostLicenses[
                    $host
                ] = new \DevOwl\RealCookieBanner\Vendor\DevOwl\RealProductManagerWpClient\license\License(
                    $this,
                    $hostBlogIds[0]
                );
            }
            // Create licenses per blog ID and point to hostname-license
            $this->licenses = [];
            foreach ($blogIds as $blogId) {
                $host = $hostnames['blog'][$blogId];
                $license = $hostLicenses[$host];
                if ($checkRemoteStatus) {
                    $license->fetchRemoteStatus(\true);
                }
                $license->getTelemetryData()->probablyTransmit();
                $license->probablySyncWithRemote();
                $license->probablyMigrate();
                $this->licenses[$blogId] = $license;
            }
        }
        return $this->licenses;
    }
    /**
     * The same as `getLicenses`, but only get unique `License` instances.
     *
     * @param boolean $skipNoUsage Pass `true` to skip licenses which are not in usage
     * @return License[]
     */
    public function getUniqueLicenses($skipNoUsage = \false) {
        $result = [];
        foreach ($this->getLicenses() as $license) {
            if ($skipNoUsage && $license->isNoUsage()) {
                continue;
            }
            $result[$license->getBlogId()] = $license;
        }
        return \array_values($result);
    }
    /**
     * Get license activation client.
     *
     * @codeCoverageIgnore
     */
    public function getLicenseActivationClient() {
        return $this->licenseActivationClient;
    }
}
