<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\Freemium;

use DevOwl\RealCookieBanner\Vendor\MatthiasWeb\Utils\Base;
// @codeCoverageIgnoreStart
\defined('ABSPATH') or die('No script kiddies please!');
// Avoid direct file request.
// @codeCoverageIgnoreEnd
/**
 * Extends the UtilsProvider with freemium provider.
 */
trait FreemiumProvider {
    /**
     * Is the current using plugin Pro version?
     *
     * @return boolean
     */
    public function isPro() {
        /**
         * This trait always needs to be used along with base trait.
         *
         * @var Base
         */
        $base = $this;
        return $base->getPluginConstant(\DevOwl\RealCookieBanner\Vendor\DevOwl\Freemium\Constants::PLUGIN_CONST_IS_PRO);
    }
}
