<?php
include 'configuration.php';
$my_msg=$_POST['msg'];
 $my_id=$_COOKIE['user_id'];
 $rec_id=$_COOKIE['rec_id'];
 date_default_timezone_set('Asia/Kolkata');
 $time= date("h:i A");
 $msg_insert="INSERT INTO chat_db(my_id,rec_id,my_msg,time_stamp) VALUES ('{$my_id}','{$rec_id}','{$my_msg}','{$time}')";
 $msg_insert2="INSERT INTO chat_db(my_id,rec_id,rec_msg,time_stamp) VALUES ('{$rec_id}','{$my_id}','{$my_msg}','{$time}')";
 $res_1=mysqli_query($conn,$msg_insert) or die("msg insert fail");
 $res_2=mysqli_query($conn,$msg_insert2) or die("msg insert fail 2");

?>