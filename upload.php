<?php
include 'configuration.php';

    if(isset($_POST['name']))
    {
        $name=$_POST['name'];
        setcookie("user_name", "", time() - (60*60*24*365), "/");
        setcookie("user_name",$name, time() + (60*60*24*365), "/");
        $insert_name="UPDATE  users SET  user_name='{$name}' WHERE U_id='{$_COOKIE["user_id"]}'";
        $insert=mysqli_query($conn,$insert_name) or die('error in inserting name');
    
      if(isset($_FILES['image']))
    {  $name=$_POST['name'];
        $file_name=$_FILES['image']['name'];
        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
         $_COOKIE["user_id"];
        move_uploaded_file($file_tmp,"images/".$file_name); 
         $insert_image="UPDATE  users SET dp='{$file_name}' WHERE U_id='{$_COOKIE["user_id"]}'";

        $insert=mysqli_query($conn,$insert_image) or die('error in inserting image');
        setcookie("my_image", "", time() - (60*60*24*365), "/");
        setcookie("my_image", $file_name, time() + (60*60*24*365), "/");
        


    }
}
    else{

    }
    header("Location: index.php")
    ?>