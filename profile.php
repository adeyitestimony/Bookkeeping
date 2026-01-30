<?php 
session_start();
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION["user_id"];
$email = $_SESSION["email"];
$firstname=$_SESSION["firstname"];
$lastname=$_SESSION["lastname"];
$companyname=$_SESSION["companyname"];
$companycategory=$_SESSION["companycategory"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body{
        background-color:#fbd189

    }
       #container{
        background-color: #33170d;
        color:#fbd189;
    border-radius: 30px;
    padding: 20px;         
    margin: 100px auto;     
    width: 700px;
    font-size:30px          
    }
    .text{
        margin-top:20px;
        color:white;
        margin-left:200px;
    
    }
    
    </style>

</head>
<body>
<div id="container">
<div>
firstName:<?= htmlspecialchars("$firstname")?>
</div>
<div>
lastName:<?= htmlspecialchars("$lastname")?>
</div>
<div>
email:<?=htmlspecialchars("$email")?>
</div>
<div>
companyname:<?=htmlspecialchars("$companyname")?>
</div>
<div>
companycategory:<?=htmlspecialchars("$companycategory")?>
</div>
<a class="action edit" href="editprofile.php?id=<?=$user_id ?>">edit profile</a>
<a class="action edit" href="dashboard.php?id=<?=$user_id ?>">back to home</a>
</div>

</body>
</html>