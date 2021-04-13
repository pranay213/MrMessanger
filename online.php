
<?php 
include 'configuration.php';
$offline="UPDATE users SET online_status=1 WHERE user_email='{$_COOKIE["email"]}'";
$offline_check=mysqli_query($conn,$offline) or die('error in offline ');
?>