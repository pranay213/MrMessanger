<?php 
include 'configuration.php';
date_default_timezone_set('Asia/Kolkata');
$time= date("h:i:s A");
$update="UPDATE users SET update_time='{$time}' WHERE user_email='{$_COOKIE['email']}'";
$check=mysqli_query($conn,$update) or die("update error");
?>