<?php

class Format extends \Phalcon\Mvc\User\Plugin
{
    protected $symbol = '$';

    protected $symbolPlacement = 'prefix';

    protected $decimalPoint = '.';

    protected $thousandSeparator = ',';

    protected $decimals = 2;

    public function money($value)
    {
        $number = number_format($value, $this->decimals, $this->decimalPoint, $this->thousandSeparator);
        if ($this->symbolPlacement == 'suffix') {
            return $number . $this->symbol;
        } else {
            return $this->symbol . $number;
        }
    }

    public function getSymbol()
    {
        return $this->symbol;
    }

    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    public function getSymbolPlacement()
    {
        return $this->symbolPlacement;
    }

    public function setSymbolPlacement($symbolPlacement)
    {
        $this->symbolPlacement = $symbolPlacement;
    }

    public function getDecimalPoint()
    {
        return $this->decimalPoint;
    }

    public function setDecimalPoint($decimalPoint)
    {
        $this->decimalPoint = $decimalPoint;
    }

    public function getThousandSeparator()
    {
        return $this->thousandSeparator;
    }

    public function setThousandSeparator($thousandSeparator)
    {
        $this->thousandSeparator = $thousandSeparator;
    }

    public function getDecimals()
    {
        return $this->decimals;
    }

    public function setDecimals($decimals)
    {
        $this->decimals = $decimals;
    }
}
