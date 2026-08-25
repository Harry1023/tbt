<?php 
// Constants
define('BASE_PATH', __DIR__);


// Globals
global $date_seperator;


// Requires
require(BASE_PATH . '/con_db.php');


// Returns System Configuration
function get_configuration() {
    $sql = mysqli_prepare(con, "SELECT * FROM `configuration`");
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);

    $config_list = [];
    while($row = mysqli_fetch_assoc($result)) {
        $config_list[$row['name']] = $row['value'];
    }
return $config_list;
    }


// Now Returning
$config = get_configuration();
$date_seperator = $config['date_seperator'];
$timezone = $config['timezone'];



// Set Default Timezone from Configuration
date_default_timezone_set($config['timezone']);


// Returns Timestamp
function timestamp() {
    global $date_seperator;
  return date("d" . $date_seperator . "m" . $date_seperator . "Y");
}

$timestamp = timestamp();


/*
* Checks User Authorization against Mentioned Role
* This Check will Grant All Permission(s) to a User with Higher Role
*/

function is_authorized($role) {
    $usr = $_SESSION['email'];
    $pwd = $_SESSION['pwd'];

    $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE email = ? AND password = ? AND role >= ?");
    mysqli_stmt_bind_param($sql, "ssi", $usr, $pwd, $role);
    mysqli_stmt_execute($sql);
    $result = mysqli_stmt_get_result($sql);

    return mysqli_fetch_assoc($result) ? true : false;
}


// Checks if User Already Exists
function user_exists($usr) {
    $sql = mysqli_prepare(con, "SELECT * FROM `users` WHERE email = ?");
    mysqli_stmt_bind_param($sql, "s", $usr);
    mysqli_stmt_execute($sql);
    $res = mysqli_stmt_get_result($sql);
    return mysqli_fetch_assoc($res) ? true : false;
}


// Checks if User Input is Safe against mentioned type(s)
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

        case 'url':
            return filter_var($input, FILTER_VALIDATE_URL) !== false;

        case 'int':
return filter_var($input, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 0]
]) !== false;

        default:
            return preg_match("/^[a-zA-Z0-9\s,.!?'-]+$/", $input);
    }
}



// Is Valid Domain checks for Full URLs

function isValidPublicUrl(string $url): bool
{
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return false;
    }

    $parts = parse_url($url);

    // Only allow HTTP/HTTPS
    if (!in_array($parts['scheme'] ?? '', ['http', 'https'], true)) {
        return false;
    }

    $host = $parts['host'] ?? '';

    // Require something like example.com or sub.example.co.uk
    if (!preg_match('/^(?:[a-z0-9-]+\.)+[a-z]{2,63}$/i', $host)) {
        return false;
    }

    return true;
}














// Issues Notifications
function issue_notification($type, $msg) {

$notification_id = uniqid('notification_');

echo "<div id='$notification_id' class='notification $type'>
 $msg
</div>";

echo "<script>$(function () {
    $('#$notification_id').each(function () {
        $(this).delay(3000).slideUp(400, function () {
            $(this).remove();
        });
    });
});</script>";
;

}




// Request Dropdown

function max_units_dropdown($max_units, $current_status, $id, $external_redirects) {

echo "<div class='dropdown'>
  <div class='dropdown-trigger'>
    <button class='button' aria-haspopup='true' aria-controls='dropdown-menu'>
      <span id='current_val$id'>$current_status</span>
      <span class='icon is-small'>
        <i class='fas fa-angle-down' aria-hidden='true'></i>
      </span>
    </button>
  </div>
  <div class='dropdown-menu' id='dropdown-menu' role='menu'>
    <div class='dropdown-content'>";
    
    for($b = 1; $b <= $max_units; $b++) {
        echo "
            <a class='dropdown-item' hx-target='#current_val$id' hx-trigger='click' hx-post='../api/users.php?upd_member_status=$b&uuid=$id'>$b</a>
        ";
    }    


    echo " <hr class='dropdown-divider' />";


$exr = explode(",",$external_redirects);

    foreach($exr as $redirect) {
        echo "
                    <a class='dropdown-item' hx-target='#current_val$id' hx-trigger='click' hx-post='../api/users.php?upd_member_status=$redirect&uuid=$id'>$redirect</a>
        ";
    }

    
      echo "</div>
  </div>
</div>";


}




// Log Out
function logout($reason) {
    session_destroy();
    echo "
    <script>
    window.location = '/';
    console.log('You were logged out');
    </script>
    ";

    exit;
}


?>