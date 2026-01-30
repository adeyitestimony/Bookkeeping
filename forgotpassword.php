<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require  'PHPMailer/src/SMTP.php';
$db_connect = mysqli_connect("localhost","root","","bookkeeping");
if(!$db_connect){
    die ("connection fail:". mysqli_connect_error());
}
session_start();


if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $sql= "SELECT id,firstname,lastname,companyname,companycategory
    FROM  signup WHERE email='$email'";
    $result=mysqli_query($db_connect,$sql);
    $message="";
     if(mysqli_num_rows($result)===1){
         $row=mysqli_fetch_assoc($result);
         $firstname=$row["firstname"];
         $lastname=$row["lastname"];
         $companyname=$row["companyname"];
         $companucategory=$row["companycategory"];
         $otp=mt_rand(100000,999999);

         
         $_SESSION["otp"]=$otp;
         $_SESSION["email"]=$email;
         $mail= new PHPMailer(true);
           try{

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->SMTPAuth=true;
            $mail->Username="adeyitestimony802@gmail.com";
            $mail->Password="edvu atdy dnuc ghwd";
            $mail->SMTPSecure='ssl';
            $mail->Port=465;
           $mail->setFrom('adeyitestimony802@gmail.com','online-bookkeeping');
            $mail->addAddress($email,$firstname);
            $mail->isHTML(true);
            $mail->subject="your otp code";
         $mail->Body="hello $firstname,\n\n yout otp code is :$otp\n\n do not share with anyone";
         $headers="From:no-reply@bookkeeping.com";
         $mail->send();
         $message="otp sent to your email";
             header("location:verifyotp.php");
             exit();
         }
         catch (Exception $e){
           $message=" fail to send otp,check your mail server".$mail->errorInfo;
         }
     }
     else{
         $message= "no email found";
     }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
      body{
        background-color:#fbd189
      }
      #content{
          background-color:#33170d;
          color:#fbd189;
          width:700px;
          margin:100px auto;
          padding:20px;
          border-radius:20px;

      }
      #button{

        width:150px;
        margin-top:20px;
        background-color:;
        border-radius:10px;
        

    
    }
    </style>
</head>
<body>
<form method="POST">
<div id="content">
<label>enter Email</label>
<input name="email" type="text">
<div id="button">
<button type="submit" name="submit">submit</button>
</div>
<div>
<?php if(!empty($message)) { ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php } ?>
    </div>
    </div>
</form>
</body>