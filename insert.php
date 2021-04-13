<?php
include 'configuration.php';
    if(isset($_POST['submit']))
    {
      $name= $_POST['user_name'];
      $email=$_POST['email'];
      $number=$_POST['number'];
      $password=md5($_POST['password']);
      $otp=$_POST['otp'];
       $chek="SELECT user_number FROM users WHERE user_number='{$number}' AND user_otp=$otp AND user_status=0";
       $res=mysqli_query($conn,$chek) or die("checking failed");
       
       if(mysqli_num_rows($res)>0)
       {
       $insert="UPDATE  users set user_name='{$name}',user_email='{$email}',user_password='{$password}',user_status=1    WHERE user_number='{$number}' AND user_otp=$otp";
        $create=mysqli_query($conn,$insert) or ('creating error');
        header("Location: success.php");
       }
       else{
        
        header("Location: fail.php");
       }
      
    }
    else{
      echo "not correct";

    }

?>