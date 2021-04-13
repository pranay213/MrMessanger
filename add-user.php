
<?php
$user_number=$_POST['user_number'];

include 'configuration.php';
$chek_user="SELECT U_id FROM users WHERE user_number='{$user_number}'";
$chek=mysqli_query($conn,$chek_user) or die('error in cheking');
if(mysqli_num_rows($chek)>0)
{ 
    while($row=mysqli_fetch_assoc($chek))
    {
        $rec_id=$row['U_id'];
    }
    if($rec_id!=$_COOKIE["user_id"])
    {  
        
        $already="SELECT f_id FROM friend_list WHERE my_id='{$_COOKIE['user_id']}' AND friend_id='{$rec_id}'";
        $user_already=mysqli_query($conn,$already) or die('error in user checking');
    if(!mysqli_num_rows($user_already)>0)
    {
        echo 'true';
        echo $rec_id;
        $add="INSERT INTO friend_list(my_id,friend_id) VALUES('{$_COOKIE["user_id"]}',$rec_id)";
        $add_2="INSERT INTO friend_list(friend_id,my_id) VALUES('{$_COOKIE["user_id"]}',$rec_id)";
        $add_user=mysqli_query($conn,$add) or die('error in adding');
        $add_user=mysqli_query($conn,$add_2) or die('error in adding');

        header("Location: m.php");
    }
    else{
        header("Location: m.php");
    }
   
   
    }
    else{
        header("Location: m.php");
    }
  
}
else{
    header("Location: m.php");
}

?>