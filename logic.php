<?php

$Units = ['Meter', 'Kilometer', 'Mile', 'Centimeter', 'Millimeter', 'Inch', 'Foot', 'Yard'];

session_start();

$from = $_SESSION['from'];
$to = $_SESSION['to'];
$val = $_SESSION['val'];
$result = $_SESSION['result'];
$errors = $_SESSION['errors'];
$hasErrors = $_SESSION['hasErrors'];
$roundUp = $_SESSION['roundUp'];
$alert = $_SESSION['alert'];

session_unset();