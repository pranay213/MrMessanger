<?php
include "configuration.php";
$email=$_COOKIE['email'];
if(isset($_COOKIE['email']))
{
    $offline="UPDATE users set online_status=0 WHERE U_id='{$_COOKIE["user_id"]}'";
    $offline_check=mysqli_query($conn,$offline) or die('error in offline');
    setcookie('email','',time()-(60*60*24*365),"/");
    setcookie("user_id", '', time() - (60*60*24*365), "/");
    setcookie("my_image", "", time() - (60*60*24*365), "/");
    setcookie('f_image','',time()-(60*60),"/");
    setcookie("user_name", "", time() - (60*60*24*365), "/");

    echo '1';
}


?>