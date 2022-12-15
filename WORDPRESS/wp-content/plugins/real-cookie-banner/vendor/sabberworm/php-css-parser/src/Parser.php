<?php

namespace DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS;

use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\Document;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\ParserState;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\SourceException;
/**
 * This class parses CSS from text into a data structure.
 */
class Parser
{
    /**
     * @var ParserState
     */
    private $oParserState;
    /**
     * @param string $sText
     * @param Settings|null $oParserSettings
     * @param int $iLineNo the line number (starting from 1, not from 0)
     */
    public function __construct($sText, \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Settings $oParserSettings = null, $iLineNo = 1)
    {
        if ($oParserSettings === null) {
            $oParserSettings = \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Settings::create();
        }
        $this->oParserState = new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\ParserState($sText, $oParserSettings, $iLineNo);
    }
    /**
     * @param string $sCharset
     *
     * @return void
     */
    public function setCharset($sCharset)
    {
        $this->oParserState->setCharset($sCharset);
    }
    /**
     * @return void
     */
    public function getCharset()
    {
        // Note: The `return` statement is missing here. This is a bug that needs to be fixed.
        $this->oParserState->getCharset();
    }
    /**
     * @return Document
     *
     * @throws SourceException
     */
    public function parse()
    {
        return \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\CSSList\Document::parse($this->oParserState);
    }
}
