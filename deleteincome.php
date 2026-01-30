<?php
session_start();
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];
$user_id = $_SESSION["user_id"];

  
   $sql= "DELETE FROM income WHERE id='$id' AND user_id='$user_id'"
;
mysqli_query($db_connect, $sql);
header("Location: income.php");
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

    </style>
    </head>
    <body></body>
</html>