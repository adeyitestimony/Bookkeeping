<?php
session_start();
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION["user_id"];
$user_id = $_SESSION["user_id"];

$result = mysqli_query(
    $db_connect,
    "SELECT * FROM signup WHERE id='$user_id'"
);

$row = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname  = $_POST["lastname"];
    $companyname = $_POST["companyname"];
    $companycategory = $_POST["companycategory"];
    mysqli_query(
        $db_connect,
        "UPDATE signup
         SET  firstname='$firstname',lastname='$lastname',companyname='$companyname', companycategory ='$companycategory'
         WHERE id='$user_id'"
            
    );
    $_SESSION["firstname"]=$firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["companyname"]= $companyname;
    $_SESSION["companycategory"]= $companycategory;

    header("Location: profile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expenses</title>
    <style>
    body{
        background-color: #fbd189;
    }
    #container{
        background-color:#33170d;
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
    
    }
    </style>

</head>
<body>
<div id="container">
<form method="POST">

    <input type="text" class="text" name="firstname" value="<?= htmlspecialchars($row['firstname']) ?>" required>
    <input type="text" class="text" name="lastname" value="<?= htmlspecialchars($row['lastname']) ?>" required>
    <input type="text" class="text" name="companyname" value="<?=htmlspecialchars($row['companyname'])?>" required>
    <input type="text" class="text" name="companycategory" value="<?=htmlspecialchars($row['companycategory']) ?>" required>
    <button type="submit">Update</button>
</form>
</div>
</body>
</html>
