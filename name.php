<?php
include 'configuration.php';
$id=$_POST['id'];

$name="SELECT user_name,dp,online_status FROM users WHERE U_id='{$id}'";
$search=mysqli_query($conn,$name) or die('error connection');
if(mysqli_num_rows($search)>0)
{
    while($row=mysqli_fetch_assoc($search))
    {
        echo $row['user_name'];
        if(!empty($row['dp']))
        {
    ?>
    
    <img  style="width:40px; height:40px;border-radius:50%"src='<?php echo "images/".$row["dp"]?>'/>
    <?php }else{
    
    ?>
    <img  style="width:40px; height:40px;border-radius:50%" src="user-icon.png"/>  
    

<?php 
} if($row['online_status']=='1')
{
?>
<p style="font-size:20px"class="text-center  text-success">Online</p>
<?php }
else{ ?>
   <p  style="font-size:20px "class="text-center  text-danger">Offline</p>

<?php  } } }?>


  