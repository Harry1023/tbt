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

if(isset($_GET['configuration'])) {
$configuration_requested = $_GET['configuration'];
$configuration_disallowed = ["bunny_cdntoken", "bunny_accesskey"];

if(!in_array($configuration_requested, $configuration_disallowed, true)) {
echo $config[$configuration_requested];
} 
}
  





if(isset($_GET['list_external_redirects'])) {

$external_redirects = explode(',',$config['external_redirects']);

foreach($external_redirects as $url) {
echo "

  <a class='panel-block'>
    <span class='panel-icon'>
      <i hx-get='../api/settings.php?delete_redirect=$url' hx-trigger='click' hx-swap='delete' hx-target='closest .panel-block' class='fa-solid fa-trash is-red'></i>
    </span>
    $url
  </a>

";
}

}






if(isset($_GET['delete_redirect']) && is_safeInput($_GET['delete_redirect'], 'url')) {

$external_redirects = explode(',',$config['external_redirects']);

$urlToRemove = $_GET['delete_redirect'];

$urls = array_filter($external_redirects, fn($redirect) => $redirect !== $urlToRemove);
$new_external_redirects = implode(',',$urls);

$sql = mysqli_prepare(con, "UPDATE `configuration` SET value = ? WHERE name = 'external_redirects'");
mysqli_stmt_bind_param($sql, 's', $new_external_redirects);
mysqli_stmt_execute($sql);
}


break;


CASE 'POST':

if(isset($_POST['update_configuration'])) {
$table_posted = [];
$valueName = [];
$valueData = [];
$valueTypes = [];

// Validate and Check What Fields are Available for Update

if(isset($_POST['organization_name']) && is_safeInput($_POST['organization_name'], 'name')) {$table_posted['organization_name'] = $_POST['organization_name'];}
if(isset($_POST['organization_url']) && is_safeInput($_POST['organization_url'], 'url')) {$table_posted['organization_url'] = $_POST['organization_url'];}
$table_posted['review_mode'] = $_POST['review_mode'] ?? 0;
if(isset($_POST['unit_label']) && is_safeInput($_POST['unit_label'])) {$table_posted['unit_label'] = $_POST['unit_label'];}
if(isset($_POST['max_units']) && is_safeInput($_POST['max_units'], 'int')) {$table_posted['max_units'] = $_POST['max_units'];}
$table_posted['bunny_ready'] = $_POST['bunny_ready'] ?? 0;
if(isset($_POST['bunny_pullzone']) && is_safeInput($_POST['bunny_pullzone'], 'url')) {$table_posted['bunny_pullzone'] = $_POST['bunny_pullzone'];}
if(isset($_POST['bunny_cdntoken']) && is_safeInput($_POST['bunny_cdntoken'])) {$table_posted['bunny_cdntoken'] = $_POST['bunny_cdntoken'];}
if(isset($_POST['bunny_accesskey']) && is_safeInput($_POST['bunny_accesskey'])) {$table_posted['bunny_accesskey'] = $_POST['bunny_accesskey'];}


if(!empty($table_posted)) {


// Fields that pass the check are broken into 3 Arrays
foreach($table_posted as $key => $value) {
    $valueName[] = "WHEN '$key' THEN ?"; // Contains Field Name
    $valueData[] = $value; // Contains Field Value
    $valueTypes[] = "s"; // Contains Field Type
    }

    // PHP Spread Operator ... Used Cause PHP converts Array Values into Comma Seperated Arguments BUT only works inside Functions
    $commaRemoveTypes = implode("",$valueTypes); 
    $sql = mysqli_prepare(con, "UPDATE configuration SET value = CASE name " . implode(" ",$valueName) . " ELSE value END");
    mysqli_stmt_bind_param($sql, $commaRemoveTypes, ...$valueData);
    mysqli_stmt_execute($sql);

if(mysqli_stmt_execute($sql)) {header('HX-Refresh: true');} 
}
}  


if(isset($_POST['new_external_redirects']) && is_safeInput($_POST['new_external_redirects'], 'url') && isValidPublicUrl($_POST['new_external_redirects'])) {

$newLink = $_POST['new_external_redirects'];
$existingURLs = explode(",",$config['external_redirects']);

if (in_array($newLink, $existingURLs, true)) {
    exit;
}

  $URLs = $newLink . "," . $config['external_redirects'];



  $sql = mysqli_prepare(con, "UPDATE configuration SET value = ? WHERE name = 'external_redirects'");
  mysqli_stmt_bind_param($sql, 's', $URLs);
  mysqli_stmt_execute($sql);
  
}

break;

}

?>