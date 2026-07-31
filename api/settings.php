<?php 
session_start();
require __DIR__ . "/core/functions.php"; 

switch($_SERVER['REQUEST_METHOD']) {

CASE 'GET':

// Get Configuration Values 

/*
* This file only delivers configuration values for certain non-sensitive configurations over http
* To use sensitive configurations directly refer to core/functions.php
*/

$configuration_requested = $_GET['configuration'];
$configuration_disallowed = ["bunny_cdntoken", "bunny_accesskey"];

if(!in_array($configuration_requested, $configuration_disallowed, true)) {
echo $config[$configuration_requested];
} 

  

break;

}

?>