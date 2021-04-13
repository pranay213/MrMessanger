<total1><?php
include 'configuration.php';
if(isset($_COOKIE['email']))
{
    date_default_timezone_set('Asia/Kolkata');
$time= date("h:i:s A");

include 'online.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Passero+One&display=swap" rel="stylesheet">
<!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"

    />
    <link rel="stylesheet" href="style.css">
</head>
<body onload="myLoading()">
    <div class="mx-1 mt-1 row  ">
        <div class="col-md-3 col-lg-0">
        </div>
        <div class="col-md-6 col-lg-12 ">
            <div class="card">
                <div class="card-header   display-5 text-white bg-pink">
                       <div class="menu">
                       <p class="active">Contacts</p>
                       <i class="fa fa-tools"></i>
                       </div>
                       <div class="search-1">
                            <input type="text" class="form-control"Placeholder="Search Your Contact....">
                           
                       </div>
                </div>
                <div class="card-body h-1 ">
                        <?php 
                        include 'configuration.php';
                        $friends="SELECT friend_id FROM friend_list WHERE my_id='{$_COOKIE['user_id']}'";
                        $friends_check=mysqli_query($conn,$friends) or die('friend list not found');
                        if(mysqli_num_rows($friends_check)>0)
                        {
                            while($details=mysqli_fetch_assoc($friends_check))
                            {
                    
                                $user_check="SELECT user_name,U_id,dp,online_status,update_time FROM users WHERE U_id='{$details["friend_id"]}'";
                                $check=mysqli_query($conn,$user_check) or die('error user details');

                            
                        
                    
                    
                            if(mysqli_num_rows($check)>0)
                            {
                            while($row=mysqli_fetch_assoc($check))
                            {
                        
                        ?>  <abc>
                            <div class="c-1 user_id" data-id="<?php echo $row['U_id'];?>">
                                <?php
                                if(!empty($row['dp']))
                                {   if(isset($_COOKIE['f_image']))
                                    {
                                        setcookie('f_image','',time()-(60*60),"/");
                                    }
                                    setcookie('f_image',$row["dp"],time()+(60*60),"/");
                                    ?>
                                <img  style="padding:5px"src="<?php echo "images/".$row['dp']?>" >
                                <?php }
                                else{
                                    if(isset($_COOKIE['f_image']))
                                    {
                                        setcookie('f_image','',time()-(60*60),"/");
                                    }
                                    setcookie('f_image','user-icon.png',time()+(60*60),"/");
                                    ?>
                                <img src="user-icon.png" >
                                <?php }?>
                                <h5 class="user_id" data-id="<?php echo $row['U_id'];?>"><?php echo $row['user_name'];?></h3> 
                               <?php
                                if($row['update_time']==$time)
                                {
                                ?>
                                <p class="text-center ml-5 mt-2 text-success">Online</p>
                                <?php }
                                else{ ?>
                                    <p class="text-center ml-5 mt-2 text-danger"><?php echo "last seen: ".$row['update_time'];?></p>
                                
                                <?php }?>
                                
                            </div>
                            <hr>
                        
                            <?php 
                            }
                            }
                              }
                              }?>
                            
                        
                            <div class=" add-user mt-2">
                            
                                <h3 class="btn btn-block btn-primary" id="add-user-now">ADD User +</h3> 
                                
                            </div>
                            </abc>
                            
                        </div>
                        <div class="msg-box ">
                            
                            </div>
                    
                    
               
                    </div>
        </div>
        <div class="col-md-3 col-lg-0">
        </div>
    </div>
   

    <div hidden class="you"></div>
    
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
    ></script>
    <script src="m.js"></script>
</html>

<?php
}
else{
    header('Location: signin.php');
}

?>
</total1>