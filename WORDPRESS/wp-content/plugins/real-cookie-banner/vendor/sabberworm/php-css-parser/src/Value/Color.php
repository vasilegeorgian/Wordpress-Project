<?php

namespace DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value;

use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\ParserState;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\UnexpectedEOFException;
use DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\UnexpectedTokenException;
class Color extends \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSFunction
{
    /**
     * @param array<int, RuleValueList|CSSFunction|CSSString|LineName|Size|URL|string> $aColor
     * @param int $iLineNo
     */
    public function __construct(array $aColor, $iLineNo = 0)
    {
        parent::__construct(\implode('', \array_keys($aColor)), $aColor, ',', $iLineNo);
    }
    /**
     * @return Color|CSSFunction
     *
     * @throws UnexpectedEOFException
     * @throws UnexpectedTokenException
     */
    public static function parse(\DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Parsing\ParserState $oParserState)
    {
        $aColor = [];
        if ($oParserState->comes('#')) {
            $oParserState->consume('#');
            $sValue = $oParserState->parseIdentifier(\false);
            if ($oParserState->strlen($sValue) === 3) {
                $sValue = $sValue[0] . $sValue[0] . $sValue[1] . $sValue[1] . $sValue[2] . $sValue[2];
            } elseif ($oParserState->strlen($sValue) === 4) {
                $sValue = $sValue[0] . $sValue[0] . $sValue[1] . $sValue[1] . $sValue[2] . $sValue[2] . $sValue[3] . $sValue[3];
            }
            if ($oParserState->strlen($sValue) === 8) {
                $aColor = ['r' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[0] . $sValue[1], 16), null, \true, $oParserState->currentLine()), 'g' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[2] . $sValue[3], 16), null, \true, $oParserState->currentLine()), 'b' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[4] . $sValue[5], 16), null, \true, $oParserState->currentLine()), 'a' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\round(self::mapRange(\intval($sValue[6] . $sValue[7], 16), 0, 255, 0, 1), 2), null, \true, $oParserState->currentLine())];
            } else {
                $aColor = ['r' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[0] . $sValue[1], 16), null, \true, $oParserState->currentLine()), 'g' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[2] . $sValue[3], 16), null, \true, $oParserState->currentLine()), 'b' => new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size(\intval($sValue[4] . $sValue[5], 16), null, \true, $oParserState->currentLine())];
            }
        } else {
            $sColorMode = $oParserState->parseIdentifier(\true);
            $oParserState->consumeWhiteSpace();
            $oParserState->consume('(');
            $bContainsVarOrCalc = \false;
            $iLength = $oParserState->strlen($sColorMode);
            for ($i = 0; $i < $iLength; ++$i) {
                $oParserState->consumeWhiteSpace();
                if ($oParserState->comes('var')) {
                    $aColor[$sColorMode[$i]] = \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSFunction::parseIdentifierOrFunction($oParserState);
                    $bContainsVarOrCalc = \true;
                } elseif ($oParserState->comes('calc')) {
                    $aColor[$sColorMode[$i]] = \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CalcFunction::parse($oParserState);
                    $bContainsVarOrCalc = \true;
                } else {
                    $aColor[$sColorMode[$i]] = \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Size::parse($oParserState, \true);
                }
                if ($bContainsVarOrCalc && $oParserState->comes(')')) {
                    // With a var argument the function can have fewer arguments
                    break;
                }
                $oParserState->consumeWhiteSpace();
                if ($i < $iLength - 1) {
                    $oParserState->consume(',');
                }
            }
            $oParserState->consume(')');
            if ($bContainsVarOrCalc) {
                return new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\CSSFunction($sColorMode, \array_values($aColor), ',', $oParserState->currentLine());
            }
        }
        return new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\Color($aColor, $oParserState->currentLine());
    }
    /**
     * @param float $fVal
     * @param float $fFromMin
     * @param float $fFromMax
     * @param float $fToMin
     * @param float $fToMax
     *
     * @return float
     */
    private static function mapRange($fVal, $fFromMin, $fFromMax, $fToMin, $fToMax)
    {
        $fFromRange = $fFromMax - $fFromMin;
        $fToRange = $fToMax - $fToMin;
        $fMultiplier = $fToRange / $fFromRange;
        $fNewVal = $fVal - $fFromMin;
        $fNewVal *= $fMultiplier;
        return $fNewVal + $fToMin;
    }
    /**
     * @return array<int, RuleValueList|CSSFunction|CSSString|LineName|Size|URL|string>
     */
    public function getColor()
    {
        return $this->aComponents;
    }
    /**
     * @param array<int, RuleValueList|CSSFunction|CSSString|LineName|Size|URL|string> $aColor
     *
     * @return void
     */
    public function setColor(array $aColor)
    {
        $this->setName(\implode('', \array_keys($aColor)));
        $this->aComponents = $aColor;
    }
    /**
     * @return string
     */
    public function getColorDescription()
    {
        return $this->getName();
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render(new \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat());
    }
    /**
     * @return string
     */
    public function render(\DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\OutputFormat $oOutputFormat)
    {
        // Shorthand RGB color values
        if ($oOutputFormat->getRGBHashNotation() && \implode('', \array_keys($this->aComponents)) === 'rgb') {
            $sResult = \sprintf('%02x%02x%02x', $this->aComponents['r']->getSize(), $this->aComponents['g']->getSize(), $this->aComponents['b']->getSize());
            return '#' . ($sResult[0] == $sResult[1] && $sResult[2] == $sResult[3] && $sResult[4] == $sResult[5] ? "{$sResult[0]}{$sResult[2]}{$sResult[4]}" : $sResult);
        }
        return parent::render($oOutputFormat);
    }
}
