
<?php 
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");
if (!$db_connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION["user_id"];

$sql = "SELECT * FROM expense WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($db_connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Expenses</title>
    <style>
    body{
        background-color:#fbd189;
    }
    #table{
        background-color:#33170d;
        color: #fbd189;
        width:30%;
        border-radius:20px;
        margin:100px auto;
        padding:150px 200px;
        font-size:20px
    

    }
    </style>
</head>
<body>
<div id="table">
<table border="1">
<tr>
    <th>Service</th>
    <th>Amount</th>
    <th>Time</th>
    <th>Date</th>
    <th>action</th>
</tr>

<?php if (mysqli_num_rows($result) > 0): ?>
<?php while ($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= htmlspecialchars($row["service"]) ?></td>
    <td><?= number_format($row["amount"], 2) ?></td>
    <td><?= $row["time"] ?></td>
    <td><?= $row["created_at"] ?></td>
    <td>
        <a class="action edit" href="editexpense.php?id=<?= $row['id'] ?>">✏️</a>
        <a class="action delete" 
           href="deleteexpense.php?id=<?= $row['id'] ?>"
           onclick="return confirm('Are you sure you want to delete this record?');">
           🗑️
        </a>
    </td>
</tr>
</div>
<?php endwhile; ?>
<?php else: ?>
<tr>
    <td colspan="4">No expense records found</td>
</tr>
<?php endif; ?>
</table>

<a href="dashboard.php">Back to home</a><br>
<a href="newexpense.php">Add record</a>

</body>
</html>
