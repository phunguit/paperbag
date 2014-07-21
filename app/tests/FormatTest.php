<?php

class FormatTest extends \PHPUnit_Framework_TestCase
{
    public function testFormatMoney()
    {
        $format = new Format();
        $format->setSymbol('Rp');
        $format->setSymbolPlacement('prefix');
        $format->setDecimalPoint(',');
        $format->setThousandSeparator('.');
        $format->setDecimals(2);
        echo $format->money(999999999) . PHP_EOL;
    }
}
