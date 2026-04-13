<?php 
require __DIR__ . "/functions.php"; 


switch($_SERVER['REQUEST_METHOD']) {

CASE 'GET':


// Filter ecord by Status

if(isset($_GET['filter_status'])) {
    if(is_authorized(2) || is_authorized(3)) {
        $term = $_GET['filter_status'];

        $sql = mysqli_prepare(con, "SELECT * FROM `files` WHERE status = ?");
        mysqli_stmt_bind_param($sql, "s", $term);
        mysqli_stmt_execute($sql);
        $res = mysqli_stmt_get_result($sql);
        while($row = mysqli_fetch_assoc($res)) {
            // Enter HTML return for Search
        }

    }
}







// Returns search result for a File

if(isset($_GET['search'])) {
    if(is_authorized(2) || is_authorized(3)) {
        $term = $_GET['search'];

        $sql = mysqli_prepare(con, "SELECT * FROM `files` WHERE (title LIKE ?)");
        mysqli_stmt_bind_param($sql, "s", $term);
        mysqli_stmt_execute($sql);
        $res = mysqli_stmt_get_result($sql);
        while($row = mysqli_fetch_assoc($res)) {
            // Enter HTML return for Search
        }

    }
}





// Returns single File from ID

if(isset($_GET['id'])) {

// Everybody can access all files
if(is_authorized(1) || is_authorized(2) || is_authorized(3)) {
    $param = $_GET['id'];


$sql = mysqli_prepare(con,"SELECT * FROM files WHERE id = ?");
mysqli_stmt_bind_param($sql, "i", $param);
mysqli_stmt_execute($sql);
$res = mysqli_stmt_get_result($sql);

while($row = mysqli_fetch_assoc($res)) {
    // Return HTML data here 
}
}
}
// Returns all Files

else {

if(is_authorized(1) || is_authorized(2) || is_authorized(3)) {
$sql = mysqli_prepare(con, "SELECT * FROM files");
mysqli_stmt_execute($sql);
$res = mysqli_stmt_get_result($sql);

while($row = mysqli_fetch_assoc($res)) {
// Return HTML data here
}
}

}

break;


CASE 'POST':

if(isset($_POST['create_file'])) {
$title = $_POST['title'];
$type = $_POST['type'];
$f_status = $_POST['f_status'];
$desc = $_POST['description'];
$flink = $_POST['flink'];



if(is_safeInput($title) && is_safeInput($desc) && is_safeInput($type)) {

$sql = mysqli_prepare(con, "INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($sql, "sss", $nam, $usr, $tel);
mysqli_stmt_execute($sql);

// Action after registration successful
}

else {exit("Account can't be created at this moment!");}



}

// Update User Record

if(isset($_POST['update_user'])) {


// Update Self
if (is_authorized(1)) {
    $usr = $_SESSION['email'];
}

// Update Others 
else if (is_authorized(2) || is_authorized(3)) {$usr = $_POST['email'];}


$table_posted = [];
$valueName = [];
$valueData = [];
$valueTypes = [];

// Validate and Check What Fields are Available for Update

if(isset($_POST['name']) && is_safeInput($_POST['name'], 'name')) {$table_posted['name'] = $_POST['name'];}
if(isset($_POST['geolocation']) && is_safeInput($_POST['geolocation'])) {$table_posted['geolocation'] = $_POST['geolocation'];}
if(isset($_POST['password']) && is_safeInput($_POST['password'], 'password')) {$table_posted['password'] = $_POST['password'];}
if(isset($_POST['occupation']) && is_safeInput($_POST['occupation'])) {$table_posted['occupation'] = $_POST['occupation'];}
if(isset($_POST['phone']) && is_safeInput($_POST['phone'], 'phone')) {$table_posted['phone'] = $_POST['phone'];}
if(isset($_POST['status']) && is_safeInput($_POST['status'])) {$table_posted['status'] = $_POST['status'];}

// Fields that pass the check are broken into 3 Arrays
foreach($table_posted as $key => $value) {
    $valueName[] = "$key = ?"; // Contains Field Name
    $valueData[] = $value; // Contains Field Value
    $valueTypes[] = "s"; // Contains Field Type
    }

    // PHP Spread Operator ... Used Cause PHP converts Array Values into Comma Seperated Arguments BUT only works inside Functions
    $commaRemoveTypes = implode("",$valueTypes); 
    $sql = mysqli_prepare(con, "UPDATE users SET " . implode(",",$valueName) . " WHERE email = $usr");
    mysqli_stmt_bind_param($sql, $commaRemoveTypes, ...$valueData);
    mysqli_stmt_execute($sql);

}

break;




}

?>