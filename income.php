<?php
session_start();
if (!isset($_SESSION["user_id"])){ header("Location: login.php");
    exit();}
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");
if(!$db_connect){
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = $_SESSION["user_id"];
$sql="SELECT * FROM income WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($db_connect, $sql);
    

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
        background-color: #fbd189;
    }
    #table{
        background-color:#33170d;
        color:#fbd189;
        width:40%;
        border-radius:20px;
        margin:200px;
        padding:150px 200px;
        font-size:20px
    

    }
    </style>
</head>
<body>
<div id="table">
<table>
<tr>
<th>recipient</th>
<th>service</th>
<th>amount</th>
<th>time</th>
<th>date</th>
</tr>
<?php if (mysqli_num_rows($result) > 0): ?>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
<td><?=htmlspecialchars($row["recipientname"])?></td>
<td><?= htmlspecialchars($row["service"])?></td>
<td><?=number_format($row["amount"], 2)?></td>
<td><?= $row["time"]?></td>
<td><?= $row["created_at"]?></td>
<td>
        <a class="action edit" href="editincome.php?id=<?= $row['id'] ?>">✏️</a>
        <a class="action delete" 
           href="deleteincome.php?id=<?= $row['id'] ?>"
           onclick="return confirm('Are you sure you want to delete this record?');">
           🗑️
        </a>
    </td>
</tr>
<?php endwhile;?>
<?php else: ?>
<tr>
<td colspan="5">No income records found</td>
</tr>
<?php endif; ?>
</table>
   <a href="http://localhost/online-bookkeeping/newincome.php"> <button>add record</button></a>
   <a href="http://localhost/online-bookkeeping/dashboard.php"> back to home</a>
   </div>
</body>
</html>