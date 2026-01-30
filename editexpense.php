<?php
session_start();
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$id = $_GET["id"];
$user_id = $_SESSION["user_id"];

$result = mysqli_query(
    $db_connect,
    "SELECT * FROM expense WHERE id='$id' AND user_id='$user_id'"
);

$row = mysqli_fetch_assoc($result);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $service = $_POST["service"];
    $amount  = $_POST["amount"];
    $time    = $_POST["time"];

    mysqli_query(
        $db_connect,
        "UPDATE expense 
         SET  service='$service', amount='$amount', time='$time' 
         WHERE id='$id' AND user_id='$user_id'"
    );

    header("Location: expense.php");
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

    <input type="text" class="text" name="service" value="<?= htmlspecialchars($row['service']) ?>" required>
    <input type="number" class="text" name="amount" value="<?= $row['amount'] ?>" required>
    <input type="time" class="text" name="time" value="<?= $row['time'] ?>" required>
    <button type="submit">Update</button>
</form>
</div>
</body>
</html>
