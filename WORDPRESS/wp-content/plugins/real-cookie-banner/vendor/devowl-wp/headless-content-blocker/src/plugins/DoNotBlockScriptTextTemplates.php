<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\plugins;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\ScriptInlineMatch;
use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\ScriptInlineFinder;
use DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AbstractPlugin;
/**
 * This plugin allows you to not block content within `script[type="text/template"]` markups.
 *
 * If you want to use this plugin, make sure, that this is the first registered plugin!
 */
class DoNotBlockScriptTextTemplates extends
    \DevOwl\RealCookieBanner\Vendor\DevOwl\HeadlessContentBlocker\AbstractPlugin {
    const MASK_INLINE_SCRIPT_PRINTF = 'DO_NOT_BLOCK_%s_SCRIPT_TEXT_TEMPLATE';
    const TYPE_TEXT_TEMPLATE = 'text/template';
    const TYPE_TEXT_TEMPLATE_MASK = 'text/content-blocker-do-not-block-script';
    private $md5ToInlineScriptMap = [];
    // Documented in AbstractPlugin
    public function init() {
        $finder = new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\ScriptInlineFinder();
        $finder->addCallback(function ($match) {
            /**
             * Var.
             *
             * @var ScriptInlineMatch
             */
            $match = $match;
            if ($match->getAttribute('type') === self::TYPE_TEXT_TEMPLATE) {
                $script = $match->getScript();
                $scriptMd5 = \md5($script);
                $mapKey = \sprintf(self::MASK_INLINE_SCRIPT_PRINTF, $scriptMd5);
                // Modify script while blocking other content
                $match->setScript($mapKey);
                $match->setAttribute('type', self::TYPE_TEXT_TEMPLATE_MASK);
                // Memorize so we can revert this
                $this->md5ToInlineScriptMap[$mapKey] = $script;
            }
        });
        $this->getHeadlessContentBlocker()->addFinder($finder);
    }
    // Documented in AbstractPlugin
    public function afterSetup() {
        $this->getHeadlessContentBlocker()->addCallback(function ($html) {
            $html = \str_replace(self::TYPE_TEXT_TEMPLATE_MASK, self::TYPE_TEXT_TEMPLATE, $html);
            $html = \str_replace(
                \array_keys($this->md5ToInlineScriptMap),
                \array_values($this->md5ToInlineScriptMap),
                $html
            );
            return $html;
        });
    }
}
