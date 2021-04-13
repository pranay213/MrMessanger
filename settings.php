<h1>Change Your Profile</h1>
<div class="form-group">
  
   <form action="upload.php" method="post" enctype="multipart/form-data">
   Name: <input type="text" class="form-control" name="name" value="<?php echo $_COOKIE['user_name'] ?>">
   <br>
   <img style="width:100px;height:100px" src="<?php echo "images/".$_COOKIE['my_image']?>" alt="">
						<br>	Upload Images/File : <input type="file" name="image">

						   </br>
						   
						   
						    <button type="submit" name="submitform">Update</button>
	</form>

   
</div>