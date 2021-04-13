<div class="card-body h-1 ">
                      <?php 
                        include 'configuration.php';
                        $friends="SELECT friend_id FROM friend_list WHERE my_id='{$_COOKIE['user_id']}'";
                        $friends_check=mysqli_query($conn,$friends) or die('friend list not found');
                        if(mysqli_num_rows($friends_check)>0)
                        {
                            while($details=mysqli_fetch_assoc($friends_check))
                            {
                    
                                $user_check="SELECT user_name,U_id,dp,online_status FROM users WHERE U_id='{$details["friend_id"]}'";
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
                                if($row['online_status']=='1')
                                {
                                ?>
                                <p class="text-center ml-5 mt-2 text-success">Online</p>
                                <?php }
                                else{ ?>
                                    <p class="text-center ml-5 mt-2 text-danger">Offline</p>
                                
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