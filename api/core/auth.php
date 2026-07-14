<?php
require __DIR__ . "/functions.php"; 

if($_SERVER['REQUEST_METHOD'] !=  "POST") {exit("invalid");}

$usr = $_POST['email'];
$pwd = $_POST['password'];



$sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE email = ? AND password = ?");
mysqli_stmt_bind_param($sql, "ss", $usr, $pwd);
mysqli_stmt_execute($sql);
$result = mysqli_stmt_get_result($sql);

if($row = mysqli_fetch_assoc($result)) {
$id = $row['id'];
$profile_photo = $row['pfp'];    
$name = $row['name'];
$role = $row['role'];
$status = $row['status']; // Can be a number or link

session_start();
$_SESSION['id'] = $id;
$_SESSION['pfp'] = $profile_photo;
$_SESSION['name'] = $name;
$_SESSION['email'] = $usr;
$_SESSION['pwd'] = $pwd;
$_SESSION['role'] = $role;
$_SESSION['status'] = $status;

switch ($role) {

CASE '1':

if (filter_var($status, FILTER_VALIDATE_URL)) {
    header("HX-Redirect: $status");
} else {
    header("HX-Redirect: dashboard");    
}

break;


CASE '2':
header("HX-Redirect: admin-dashboard");
break;

CASE '3':
header("HX-Redirect: admin-dashboard?god=1");
break;


}


}
else {exit("<div class='notification is-danger'>Please check your Credentials and try again!</div>");}
?>