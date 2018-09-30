<?php
require 'data.php';
session_start();
$from = $_POST[from];
$to = $_POST[to];
$val = $_POST[value];

$len = $Length;
$temp = $Units['Temperature'];
$wt = $Units['Weight'];
$time = $Units['Time'];

switch ($from) {
    case 'Meter':
        $len['Meter'] = $val;
        $len['Kilometer'] = $val * 0.001;
        $len['Mile'] = $val * 0.000621371;
        $len['Centimeter'] = $val * 100;
        $len['Millimeter'] = $val * 1000;
        $len['Inch'] = $val * 39.3701;
        $len['Foot'] = $val * 3.28084;
        $len['Yard'] = $val * 1.09361;
        break;
}

$_SESSION['result'] = $len[$to];
header('Location: index.php');