<?php

global $con;



$con = mysqli_connect("localhost","root","","mileston_tbt_portal");


if (mysqli_connect_errno()) {

  echo "<script>console.log('DATABASE ERROR . mysqli_connect_error();')</script>";

  exit();

}

// Constants
define('con', $con);
?>