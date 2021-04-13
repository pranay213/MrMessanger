<?php

include 'configuration.php';

if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$check_credentials="SELECT user_name,U_id,dp FROM users WHERE user_email='{$email}' AND user_password='{$password}'";
$cheking=mysqli_query($conn,$check_credentials) or die('error checking');
if(mysqli_num_rows($cheking)>0)
{   $online="UPDATE users SET online_status=1 WHERE user_email='{$email}'";
 $online_check=mysqli_query($conn,$online ) or die('error in online status');
    setcookie("email", $email, time() + (60*60*24*365), "/");
    while($row=mysqli_fetch_assoc($cheking))
    {
        setcookie("user_id", $row['U_id'], time() + (60*60*24*365), "/");
        if(!empty($row['dp']))
        {
        setcookie("my_image", $row['dp'], time() + (60*60*24*365), "/");
        }
        else{
            setcookie("my_image", "user-icon.png", time() + (60*60*24*365), "/");
        }
    }
    
     header("Location: m.php");
}
else{
    header("Location: index.php");
}
}
?>