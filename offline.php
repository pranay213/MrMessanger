
<?php 
include 'configuration.php';
echo $offline="UPDATE users SET online_status=0 WHERE user_email='{$_COOKIE["email"]}'";
$offline_check=mysqli_query($conn,$offline) or die('error in offline ');
?>