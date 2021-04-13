<div class="chat-body"><?php
include 'configuration.php';
 if(isset($_COOKIE['rec_id']))
 {  
     setcookie('rec_id','',time()-(60*60),"/");

 }
 $rec_id=$_POST['id'] or $rec_id=$_COOKIE['rec_id'];
 $my_id=$_COOKIE['user_id'];

 setcookie('rec_id',$rec_id,time()+(60*60),"/");
 $chek_msg="SELECT my_msg,rec_msg,time_stamp FROM chat_db WHERE my_id='{$my_id}' AND rec_id='{$rec_id}'";
 $chek=mysqli_query($conn,$chek_msg) or die(" error checking database");
 if(mysqli_num_rows($chek)>0)
 {
    while($row=mysqli_fetch_assoc($chek))
    {
 
        if(!empty($row['rec_msg']))
        {
?> 
<div class=" chat-div mt-1  l">

    <img src="<?php echo "images/".$_COOKIE['f_image']?>" alt="">
    <div class="tri-left"></div>
    <p ><?php echo $row['rec_msg']." <span style='color:blue ;font-size:10px ' >".$row['time_stamp'] ."<span>"?>
    
    </p>
    
    </div>
    <br>
        <div class="row mt-5">
    
         </div>
         <?php }
          if(!empty($row['my_msg']))
          {
         ?>
         

        <div class="chat-div mt-1  r">
        <p ><?php echo $row['my_msg']." <span style='color:blue ;font-size:10px ' >".$row['time_stamp'] ."<span>"?>
    
    </p>
            <div class="tri-right">

            </div>
            <img src="<?php echo "images/".$_COOKIE['my_image']?>" alt="">
        </div>
        <br>
        <div class="row mt-5">
    
         </div>
         <?php 
         }?>

           
</div>     
<?php 
    }
}?>   
<div class="row mt-5"></div>
<div>