<?php 
session_start();
$_SESSION["user_id"];
$db_connect = mysqli_connect("localhost", "root", "", "bookkeeping");

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION["user_id"];
$email = $_SESSION["email"];
$expense_sql = "SELECT SUM(amount) AS total_expense FROM expense WHERE user_id='$user_id'";
$expense_result = mysqli_query($db_connect, $expense_sql);
$expense_row = mysqli_fetch_assoc($expense_result);
$total_expense = $expense_row['total_expense'] ?? 0;
$income_sql = "SELECT SUM(amount) AS total_income FROM income WHERE user_id='$user_id'";
$income_result = mysqli_query($db_connect, $income_sql);
$income_row = mysqli_fetch_assoc($income_result);
$total_income = $income_row['total_income'] ?? 0;
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
        #income{
          background-color: #33170d;
          color:#fbd189;
          width:200px;
          height:200px;
          padding-top:100px;
          padding-left:20px;
          border-radius:10px
        }
        #welcome{
          background-color: #33170d;
          font-size:50px;
          color:#fbd189;
          font-weight:bold;
          padding-left:220px;
          border-radius:10px
        }
        #header{
            background-color: #33170d;
            color: #fbd189;
            padding: 10px 20px;
            display: flex;
            justify-content:center;
            align-items: center;
            border-radius:10px;
            margin-top:20px
            }
            .nav{
              margin-left:40px;
              color:#fbd189

            }

    </style>
</head>
<body>
  <div id="welcome">
    welcome <?= htmlspecialchars($email) ?>
</div>
<div id="header">
<a href="http://localhost/online-bookkeeping/income.php" class="nav">
  income

</a>
<a href="http://localhost/online-bookkeeping/expense.php" class="nav">
  expense

</a>
<a href="log-out.php" class="nav">Logout</a>
<a href="profile.php" class="nav">profile</a>
</div>
<div>
    <h1>overview:</h1>
  </div>
    <div id="income">
    <p>total income =₦<?= number_format($total_income, 2) ?></p>

    <p>total expense=₦<?= number_format($total_expense, 2) ?></p>
    </div>
</div>


</body>
</html>