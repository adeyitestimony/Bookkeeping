<?php
session_start();
 if (!isset($_SESSION["user_id"])){ header("Location: login.php");
        exit();}
$db_connect = mysqli_connect("localhost","root","","bookkeeping","3306");
if (!$db_connect){
    die("database connection failed:". mysqli_connect_error());
}
$user_id = $_SESSION["user_id"];
if (isset($_POST["save"])) {    
  $recipientname=$_POST["recipientname"];
  $service=$_POST["service"];
  $amount=$_POST["amount"];
  $time=$_POST["time"];
  $sql = "INSERT INTO income (`recipientname`, `service`, `amount`,`time`,`user_id`)
  VALUES ('$recipientname', '$service', '$amount', '$time','$user_id')";
  if (mysqli_query($db_connect, $sql)) {
    header("Location:income.php");
    exit();
} else {
    echo "Error: " . mysqli_error($db_connect);
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
    #container{
        background-color: #33170d;
    border-radius: 30px;
    padding: 20px;         
    margin: 200px auto;     
    width: 700px; 
    height:400px;
    color:#fbd189;
    }
    .text{
        margin-top:40px;
        color:#fbd189;
        margin-left:200px;
        font-size:30px
    
    }</style>
</head>
<body>
  <div id="container">
    <form method="POST">
      <div class="text">
      <label>recipient name</label>
      <input name="recipientname">
     </div>
     <div class="text">
        <label>service</label>
        <input name="service">
    </div>
    <div class="text">
        <label>amount</label>
        <input name="amount" type="number">
    </div>
    <div class="text">
        <label>time</label>
        <input type="time" name="time">
    </div>
    <div>
        <button name="save" class="text" type="submit">save</button>
    </div>
    </form>
    </div>
</body>
</html>