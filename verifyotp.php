<?php
session_start();

$message="";
if(isset($_POST["verify"])){
    $otp=$_POST["otp"];
    
  if ($otp == $_SESSION["otp"]){
      header("location:resetpassword.php");
      unset($_SESSION["otp"]);
  }
  else{
      $message="invalid otp";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
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
    <div id="content" >
    <div>
    <label>enter otp code being sent to you</label>
    <input name="otp" type="number">
    </div>
    <div>
    <button name="verify" id="button" type="submit">verify</button>
    </div>
    <p><?php echo $message; ?></p>
    <div>
    </form>
</body>
</html>