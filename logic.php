<?php

$Length = ['Meter', 'Kilometer', 'Mile', 'Centimeter', 'Millimeter', 'Inch', 'Foot', 'Yard'];
$Units = [
    'Temperature' => ['Celsius', 'Kelvin', 'Fahrenheit'],
    'Weight' => ['Gram', 'Kilogram', 'Milligram', 'Metric Ton', 'Pound', 'Ounce'],
    'Time' => ['Second', 'Millisecond', 'Minute', 'Hour', 'Day', 'Week']
];

session_start();

$from = $_SESSION['from'];
$to = $_SESSION['to'];
$val = $_SESSION['val'] ;
$result = $_SESSION['result'];
$errors = $_SESSION['errors'];
$hasErrors = $_SESSION['hasErrors'];
$roundUp = $_SESSION['roundUp'];
$session = $_SESSION;

session_unset();