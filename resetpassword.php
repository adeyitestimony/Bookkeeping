<?php
session_start();
$db_connect=mysqli_connect("localhost","root","","bookkeeping");
if(!$db_connect){
  die("database connection fail:". mysqli_connect_error());
}
if (isset($_POST["save"])){
  $email=$_SESSION["email"];
  $password=$_POST ["password"];
  $confirmpassword=$_POST["confirmpassword"];
  if($password!=$confirmpassword){
      echo "mismatch password";
      exit();
  }
$result = mysqli_query($db_connect,"SELECT * FROM signup WHERE email='$email' ");
$row=mysqli_fetch_assoc($result);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password=$_POST["password"];
    mysqli_query($db_connect,"UPDATE signup SET password='$password' WHERE email='$email'");
    header("Location:log-in.php");
    exit();
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
    <div>
        <label>enter new password</label>
        <input name="password"  type="text">
    </div>
    <div>
        <label>confirm new password</label>
        <input name="confirmpassword" type="text">
    </div>
    <button type="submit" name="save">save</button>

    </form>
</body>
</html>