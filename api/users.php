<?php 
require __DIR__ . "/functions.php"; 


switch($_SERVER['REQUEST_METHOD']) {

CASE 'GET':

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
    // Return HTML data here 
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

if(isset($_POST['name']) && is_safeInput($_POST['name'], 'name')) {$table_posted['name'] = $_POST['name'];}
if(isset($_POST['geolocation']) && is_safeInput($_POST['geolocation'])) {$table_posted['geolocation'] = $_POST['geolocation'];}
if(isset($_POST['password']) && is_safeInput($_POST['password'], 'password')) {$table_posted['password'] = $_POST['password'];}
if(isset($_POST['occupation']) && is_safeInput($_POST['occupation'])) {$table_posted['occupation'] = $_POST['occupation'];}
if(isset($_POST['phone']) && is_safeInput($_POST['phone'], 'phone')) {$table_posted['phone'] = $_POST['phone'];}
if(isset($_POST['last_logged_ip']) && is_safeInput($_POST['last_logged_ip'])) {$table_posted['last_logged_ip'] = $_POST['last_logged_ip'];}


foreach($table_posted as $key => $value) {
    $sql = mysqli_prepare(con, "UPDATE users SET $key = ? WHERE email = $usr");
    mysqli_stmt_bind_param($sql, "s", $value);
    mysqli_stmt_execute($sql);
    }

}

break;




}

?>