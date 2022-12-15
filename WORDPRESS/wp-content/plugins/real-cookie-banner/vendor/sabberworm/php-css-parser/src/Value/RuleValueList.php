<?php

namespace DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value;

class RuleValueList extends \DevOwl\RealCookieBanner\Vendor\Sabberworm\CSS\Value\ValueList
{
    /**
     * @param string $sSeparator
     * @param int $iLineNo
     */
    public function __construct($sSeparator = ',', $iLineNo = 0)
    {
        parent::__construct([], $sSeparator, $iLineNo);
    }
}
