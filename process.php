<?php
require 'Compute.php';
require 'Form.php';

use Converter\Compute;
use DWA\Form;

session_start();

#Compute and Form objects
$compute = new Compute();
$form = new Form($_POST);

$fromUnit = $form->get('from');
$toUnit = $form->get('to');
$valToConvert = $form->get('value');
$roundUp = $form->get('roundUp');
$clear = $form->get('clear');

$errors = $form->validate([
    'value' => 'required|numeric'
]);

#Calling compute module
if (!$form->hasErrors && !isset($clear)) {
    $result = $compute->getResult($fromUnit, $toUnit, $valToConvert);
}

if ($roundUp == 'on') {
    $result = (int)$result;
}

$_SESSION['errors'] = $errors;
$_SESSION['hasErrors'] = $form->hasErrors;
$_SESSION['from'] = $fromUnit;
$_SESSION['to'] = $toUnit;
$_SESSION['val'] = $valToConvert;
$_SESSION['roundUp'] = $roundUp;
$_SESSION['result'] = (String)$result;
$_SESSION['alert'] = 1;

if (isset($clear)) {
    $_SESSION = null;
}

header('Location: index.php');