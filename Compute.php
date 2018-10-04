<?php

namespace Converter;

class Compute
{
    public function getResult(String $fromUnit, String $toUnit, float $value)
    {
        $baseUnitVal = $this->convertToMeter($fromUnit, $value);
        $convertedVal = $this->getLengthConvert($toUnit, $baseUnitVal);

        return $convertedVal;
    }

    public function convertToMeter(String $fromUnit, float $value)
    {
        $baseval = 0.0;
        switch ($fromUnit) {
            case 'Meter':
                $baseval = $value;
                break;
            case 'Kilometer':
                $baseval = $value * 1000;
                break;
            case 'Mile':
                $baseval = $value * 1609.34;
                break;
            case 'Centimeter':
                $baseval = $value * 0.01;
                break;
            case 'Millimeter':
                $baseval = $value * 0.001;
                break;
            case 'Inch':
                $baseval = $value * 0.0254;
                break;
            case 'Foot':
                $baseval = $value * 0.3048;
                break;
            case 'Yard':
                $baseval = $value * 0.9144;
                break;
        }

        return $baseval;
    }

    public function getLengthConvert(String $toUnit, float $value)
    {
        $conval = 0.0;
        switch ($toUnit) {
            case 'Meter':
                $conval = $value;
                break;
            case 'Kilometer':
                $conval = $value * 0.001;
                break;
            case 'Mile':
                $conval = $value * 0.000621371;
                break;
            case 'Centimeter':
                $conval = $value * 100;
                break;
            case 'Millimeter':
                $conval = $value * 1000;
                break;
            case 'Inch':
                $conval = $value * 39.3701;
                break;
            case 'Foot':
                $conval = $value * 3.28084;
                break;
            case 'Yard':
                $conval = $value * 1.09361;
                break;
        }

        return $conval;
    }
}