<?php 
// Constants
define('BASE_PATH', __DIR__);


// Globals



// Requires
require(BASE_PATH . '/con_db.php');

function is_authorized($role) {
    $usr = $_SESSION['email'];
    $pwd = $_SESSION['pwd'];

    $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE email = ? AND password = ? AND role >= ?");
    mysqli_stmt_bind_param($sql, "ssi", $usr, $pwd, $role);
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);

    return mysqli_fetch_assoc($result) ? true : false;
}

function user_exists($usr) {
    $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE email = ?");
    mysqli_stmt_bind_param($sql, "s", $usr);
    mysqli_stmt_execute($sql);
    $res = mysqli_stmt_get_result($sql);
    return mysqli_fetch_assoc($res) ? true : false;
}



function is_safeInput($input, $type = 'text') {

    // block any HTML/PHP tags
    if (strip_tags($input) !== $input) return false;

    switch($type) {
        case 'name':
            return preg_match("/^[a-zA-Z\s'-]+$/", $input);

        case 'email':
            return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;

        case 'password':
            return preg_match("/^[a-zA-Z0-9!@#$%^&*()_+\-=\[\]{};':\",.<>\/?\\|]+$/", $input);

        case 'phone':
            return preg_match("/^[0-9\s\+\-\(\)]+$/", $input);

        default:
            return preg_match("/^[a-zA-Z0-9\s,.!?'-]+$/", $input);
    }
}


?>