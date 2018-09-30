<?php

namespace Converter;

class Compute
{
    private $Length = ['Meter', 'Kilometer', 'Mile', 'Centimeter', 'Millimeter', 'Inch', 'Foot', 'Yard'];
    private $Units = [
        'Temperature' => ['Celsius', 'Kelvin', 'Fahrenheit'],
        'Weight' => ['Gram', 'Kilogram', 'Milligram', 'Metric Ton', 'Pound', 'Ounce'],
        'Time' => ['Second', 'Millisecond', 'Minute', 'Hour', 'Day', 'Week']
    ];

    public function getResult(String $fromUnit, String $toUnit, float $value)
    {
        $baseUnitVal = 0.0;
        $convertedVal = 0.0;
        if (in_array($fromUnit, $this->Length)) {
            $baseUnitVal = $this->convertToMeter($fromUnit, $value);
            $convertedVal = $this->getLengthConvert($toUnit, $baseUnitVal);
        } else if (in_array($fromUnit, $this->Units['Temperature'])) {
            $baseUnitVal = $this->convertToCelsius($fromUnit, $value);
            $convertedVal = $this->getTemperatureConvert($toUnit, $baseUnitVal);
        } else if (in_array($fromUnit, $this->Units['Weight'])) {
            $baseUnitVal = $this->convertToGram($fromUnit, $value);
            $convertedVal = $this->getWeightConvert($toUnit, $baseUnitVal);
        } else if (in_array($fromUnit, $this->Units['Time'])) {
            $baseUnitVal = $this->convertToSecond($fromUnit, $value);
            $convertedVal = $this->getTimeConvert($toUnit, $baseUnitVal);
        }

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

    public function convertToCelsius(String $fromUnit, float $value)
    {
        $baseval = 0.0;
        switch ($fromUnit) {
            case 'Celsius':
                $baseval = $value;
                break;
            case 'Kelvin':
                $baseval = $value-273.15;
                break;
            case 'Fahrenheit':
                $baseval = ($value-32)*0.55;
                break;
        }
        return $baseval;
    }

    public function convertToGram(String $fromUnit, float $value)
    {
        $baseval = 0.0;
        switch ($fromUnit) {
            case 'Gram':
                $baseval = $value;
                break;
            case 'Kilogram':
                $baseval = $value*1000;
                break;
            case 'Milligram':
                $baseval = $value*0.001;
                break;
            case 'Metric Ton':
                $baseval = $value*1000000;
                break;
            case 'Pound':
                $baseval = $value*453.592;
                break;
            case 'Ounce':
                $baseval = $value*28.3495;
                break;
        }
        return $baseval;
    }

    public function convertToSecond(String $fromUnit, float $value)
    {
        $baseval = 0.0;
        switch ($fromUnit) {
            case 'Second':
                $baseval = $value;
                break;
            case 'Millisecond':
                $baseval = $value*0.001;
                break;
            case 'Minute':
                $baseval = $value*60;
                break;
            case 'Hour':
                $baseval = $value*3600;
                break;
            case 'Day':
                $baseval = $value*86400;
                break;
            case 'Week':
                $baseval = $value*604800;
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

    public function getTemperatureConvert(String $toUnit, float $value)
    {
        $conval = 0.0;
        switch ($toUnit) {
            case 'Celsius':
                $conval = $value;
                break;
            case 'Kelvin':
                $conval = $value+273.15;
                break;
            case 'Fahrenheit':
                $conval = ($value*1.8)+32;
                break;
        }
        return $conval;
    }

    public function getWeightConvert(String $toUnit, float $value)
    {
        $conval = 0.0;
        switch ($toUnit) {
            case 'Gram':
                $conval = $value;
                break;
            case 'Kilogram':
                $conval = $value*0.001;
                break;
            case 'Milligram':
                $conval = $value*1000;
                break;
            case 'Metric Ton':
                $conval = $value*0.000001;
                break;
            case 'Pound':
                $conval = $value*0.0022046244;
                break;
            case 'Ounce':
                $conval = $value*0.0352739907;
                break;
        }
        return $conval;
    }

    public function getTimeConvert(String $toUnit, float $value)
    {
        $conval = 0.0;
        switch ($toUnit) {
            case 'Second':
                $conval = $value;
                break;
            case 'Millisecond':
                $conval = $value*1000;
                break;
            case 'Minute':
                $conval = $value*0.0166666667;
                break;
            case 'Hour':
                $conval = $value*0.0002777778;
                break;
            case 'Day':
                $conval = $value*0.0000115741;
                break;
            case 'Week':
                $conval = $value*0.0000016534;
                break;
        }
        return $conval;
    }
}