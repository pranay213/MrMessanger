<?php 
include 'configuration.php';
if(isset($_COOKIE['email']))
{
    header("Location: m.php");
}
else{
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn-Chatapp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">    
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"

    />
    <link rel="stylesheet" href="style.css">

</head>
<body>

   <div class="mx-1 mt-1 row">
   <div class="col-md-3 col-lg-0"></div>
    <div class="col-md-6 col-lg-12 ">
        <div class="card  bg-ash ">
            <div class="card-head bg-pink text-white text-center p-2">
                <h5>SignIn Here</h5>
            </div>
            <div class="card-body">
                <form action="signin-data.php" method="post">
               
                
                <div class="form-group">
                    <input type="email" class="form-control" placeholder='email'  name="email" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder='password'required name="password">
                </div>
                <br>
               
                
                <div class="form-group">
                    <input id='signin'type="submit" class=" btn btn-success btn-block" name='signin' >
                </div>
                </form>
                <p class='mt-1'>Don't Have an Account ? <a href="index.php">Click Here</a></p>
                <p class='mt-1'>Forget Your Password ? <a href="index.php">Click Here</a></p>
            </div>
                
        </div>
    </div>
    <div class="col-md-3 col-lg-0"></div>
   </div>

    
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
    ></script>

</html>


<?php 
}

   

?>