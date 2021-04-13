<?php 
include 'configuration.php';
$number=$_POST['mobile'];
$otp=rand(1000,9999); 
$email=$_POST['email'];
if(strlen($number)==10)
{


    $check_number="SELECT user_number  FROM users WHERE user_number='{$number}'";
$result=mysqli_query($conn,$check_number) or die('query unsuccess');
$stauts="SELECT user_number FROM users WHERE user_status=1 AND user_number='{$number}'";
$s_re=mysqli_query($conn,$stauts) or die('error in status');
$mail_check="SELECT user_number FROM users WHERE user_email='{$email}'";
$s_email=mysqli_query($conn,$mail_check) or die("error in mail");
if(mysqli_num_rows($result)>0 )
{ 
if((mysqli_num_rows($s_email)>0 )|| (mysqli_num_rows($result)>0 && mysqli_num_rows($s_re)>0)){
      echo '-1';
  }
 else  if(mysqli_num_rows($s_re)!=1 )
    {
        echo '1';
    }
}

else{
    if(!empty($number))
    {
     $add="INSERT INTO users(user_number,user_otp) VALUES ('{$number}','{$otp}')";
    $result2=mysqli_query($conn,$add) or die("error in adding number");

    echo '2';
    $field = array(
        "sender_id" => "FSTSMS",
        "language" => "english",
        "route" => "qt",
        "numbers" => "$number",
        "message" => "43042",
        "variables" => "{#AA#}",
        "variables_values" => "$otp"
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($field),
      CURLOPT_HTTPHEADER => array(
        "authorization: e2Eo9jmY1rDF4RxOBgCVwW6NdcIiKXyTZGStuqpQ8AUJzhsl7kAKIZTXLNeR08PFxS5lyWhsqwjtinrz",
        "cache-control: no-cache",
        "accept: */*",
        "content-type: application/json"
      ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
     curl_close($curl);
    }
    
}
}
else
{
    echo '0';
}




?>