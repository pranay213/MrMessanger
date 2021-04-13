<? php
    if($row['update_time']==$time)
    {
    ?>
    <p class="text-center ml-5 mt-2 text-success">Online</p>
    <?php }
    else{ ?>
        <p class="text-center ml-5 mt-2 text-danger"><?php echo "last seen: ".$row['update_time'];?></p>
    
    <?php }?> 