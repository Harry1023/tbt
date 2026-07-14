<?php 
session_start();
require __DIR__ . "/core/functions.php"; 


switch($_SERVER['REQUEST_METHOD']) {

CASE 'GET':


// Filter Record by Status

if(isset($_GET['filter_status'])) {
    if(is_authorized(2) || is_authorized(3)) {
        $term = $_GET['filter_status'];

        $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE status = ?");
        mysqli_stmt_bind_param($sql, "s", $term);
        mysqli_stmt_execute($sql);
        $res = mysqli_stmt_get_result($sql);
        while($row = mysqli_fetch_assoc($res)) {
            // Enter HTML return for Search
        }

    }
}







// Returns search result for a User

if(isset($_GET['search'])) {
    if(is_authorized(2) || is_authorized(3)) {
        $term = $_GET['search'];

        $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE (name LIKE ? OR email LIKE ? OR phone LIKE ?)");
        mysqli_stmt_bind_param($sql, "s", $term);
        mysqli_stmt_execute($sql);
        $res = mysqli_stmt_get_result($sql);
        while($row = mysqli_fetch_assoc($res)) {
            // Enter HTML return for Search
        }

    }
}





// Returns single User from ID

if(isset($_GET['id'])) {

// Get data for Self
if(is_authorized(1)) {
    $param = $_SESSION['id'];
}

// Get data for Others
else if(is_authorized(2) || is_authorized(3)) {
    $param = $_GET['id'];
}
else {exit("invalid id");}

$sql = mysqli_prepare(con,"SELECT * FROM users WHERE id = ?");
mysqli_stmt_bind_param($sql, "i", $param);
mysqli_stmt_execute($sql);
$res = mysqli_stmt_get_result($sql);

while($row = mysqli_fetch_assoc($res)) {
    
// Returning Self Data for Users  
    if(is_authorized(1)) {
echo "
 <tr><td><small>Phone</small></td><td><small>{$row['phone']}</small></td></tr>
    <tr><td><small>Occupation</small></td><td><small>{$row['occupation']}</small></td></tr>
    <tr><td><small>Address</small></td><td><small>{$row['address']}</small></td></tr>
    <tr><td><small>Password</small></td><td><small><div class='tag'>Last Updated {$row['pwd_timestamp']}</div></small></td></tr>
";}



}
}

// Returns all Users with Access below Requestee 

else {

if(is_authorized(2) || is_authorized(3)) {
$sql = mysqli_prepare(con, "SELECT * FROM users WHERE role < ?");
mysqli_stmt_bind_param($sql, "i", $_SESSION['role']);
mysqli_stmt_execute($sql);
$res = mysqli_stmt_get_result($sql);

while($row = mysqli_fetch_assoc($res)) {
// Return HTML data here
}
}

}

break;


CASE 'POST':

if(isset($_POST['create_user'])) {
$usr = $_POST['email'];
$tel = $_POST['phone'];
$nam = $_POST['name'];


if(!user_exists($usr)) {

if(is_safeInput($usr, 'email') && is_safeInput($tel, 'phone') && is_safeInput($nam, 'name')) {

$sql = mysqli_prepare(con, "INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($sql, "sss", $nam, $usr, $tel);
mysqli_stmt_execute($sql);

// Action after registration successful
}

else {exit("Account can't be created at this moment!");}

}

else {exit("Account already exists!");}

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
if(isset($_POST['address']) && is_safeInput($_POST['address'])) {$table_posted['address'] = $_POST['address'];}
if(isset($_POST['password']) && is_safeInput($_POST['password'], 'password')) {$table_posted['password'] = $_POST['password'];}
if(isset($_POST['occupation']) && is_safeInput($_POST['occupation'])) {$table_posted['occupation'] = $_POST['occupation'];}
if(isset($_POST['phone']) && is_safeInput($_POST['phone'], 'phone')) {$table_posted['phone'] = $_POST['phone'];}
if(isset($_POST['status']) && is_safeInput($_POST['status'])) {$table_posted['status'] = $_POST['status'];}


if(isset($table_posted['password'])) {
    $timestamp = timestamp();
    $sql_timestamp_update = mysqli_prepare(con, "UPDATE users SET pwd_timestamp = ? WHERE email = '$usr'");
    mysqli_stmt_bind_param($sql_timestamp_update, 's', $timestamp); 
    mysqli_stmt_execute($sql_timestamp_update);
}


// Fields that pass the check are broken into 3 Arrays
foreach($table_posted as $key => $value) {
    $valueName[] = "$key = ?"; // Contains Field Name
    $valueData[] = $value; // Contains Field Value
    $valueTypes[] = "s"; // Contains Field Type
    }

    // PHP Spread Operator ... Used Cause PHP converts Array Values into Comma Seperated Arguments BUT only works inside Functions
    $commaRemoveTypes = implode("",$valueTypes); 
    $sql = mysqli_prepare(con, "UPDATE users SET " . implode(",",$valueName) . " WHERE email = '$usr'");
    mysqli_stmt_bind_param($sql, $commaRemoveTypes, ...$valueData);
    mysqli_stmt_execute($sql);

    if(mysqli_stmt_execute($sql)) {issue_notification("primary", "Your profile was updated!");}
    else {issue_notification("primary", "Unfortunately, changes could not be made!");}

}

break;




}

?>