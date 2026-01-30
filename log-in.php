<?php
session_start();
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");
if (!$db_connect){
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["sign-in"])){
    
 $email=$_POST["email"];
 $password=$_POST["password"];
 $sql = "SELECT id, email, firstname, lastname, companyname, companycategory 
 FROM signup 
 WHERE email='$email' AND password='$password'";

 $result = mysqli_query($db_connect, $sql);
 if(mysqli_num_rows($result)===1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION["user_id"] = $row["id"];
    $_SESSION["companyname"] = $row["companyname"];
    $_SESSION["companycategory"] = $row["companycategory"];
    $_SESSION["email"] = $row["email"];    
    $_SESSION["firstname"] = $row["firstname"]; 
    $_SESSION["lastname"]=$row["lastname"];
     header("location:http://localhost/online-bookkeeping/dashboard.php");
     ;
 }
 else{
     echo "incorrect details";
 };
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
    margin: 100px auto;     
    width: 700px;           
    }
    .text{
        margin-top:20px;
        color:white;
        margin-left:200px;
    
    }
    #button{
        margin-left:300px;
        width:150px;
        margin-top:20px;
        background-color:;
        border-radius:10px
    
    }
    #sign{
        color:#fbd189;
    }
    .input{
        border-radius:30px;
        width:200px;
        padding:10px
    }
    #input1{
        margin-left:22px
    }
    </style>
</head>
<body>
<div id="container">
<form method="POST">
    <div class="text" >
        <label>email</label>
        <input  type="text" class="input" id="input1" name="email">
    </div>
    <div class="text">
            <label >password</label>
            <input  type="password" class="input" name="password">
        </div>
    <button name="sign-in" id="button">submit</button>
    <h4 class="text">did'nt have an account?<a href="sign-up.php" id="sign">sign-up here</a></h4>
    <h4 class="text"><a href="forgotpassword.php" id="sign">forgot password</a></h4>
    
</form>
</div>
</body>
</html>