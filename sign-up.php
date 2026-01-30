
<?php
 $db_connect = mysqli_connect("localhost","root","","bookkeeping","3306");
 if (!$db_connect) {
    die("Database connection failed: " . mysqli_connect_error());
}


   if(isset($_POST["submit"])){
  $email=$_POST["email"];
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $companyname=$_POST["companyname"];
  $companycategory=$_POST["companycategory"];
  $password=$_POST["password"];
  $check="SELECT * FROM signup WHERE email='$email'";
  $result=mysqli_query($db_connect,$check);
  if (mysqli_num_rows($result)>0){
      echo "<script>alert('email already used');</script>";
      exit();
  }
   $sql = "INSERT INTO signup (email, firstname, lastname, companyname, companycategory, password)
    VALUES ('$email', '$firstname', '$lastname', '$companyname', '$companycategory', '$password')";
  if (mysqli_query($db_connect, $sql)) {
    header("Location: log-in.php");
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
        background-color:#fbd189;
        border-radius:10px
            }
    #sign{
        color:#fbd189;
    }
    .input{
        border-radius:10px;
        width:200px;
        padding:10px
    }
    </style>

</head>
<head>
  <div id="container">  
<form method="POST">
    <div class="text">
        <label>enter email</label>
            <input type="text" class="input"  name="email"  required>
    </div>

    <div  class="text">
         <label>first name</label>
             <input type="text" class="input"   name="firstname" required>
    </div>

    <div   class="text">
        <label>last name</label>
            <input type="text" class="input"   name="lastname" required>
    </div>

    <div  class="text">
        <label>company name</label>
             <input type="text" class="input"   name="companyname" required>
    </div>

    <div  class="text">
        <label>company category</label>
             <input type="text" class="input"   placeholder="e.g beauty,hospitality" name="companycategory" required>
    </div>

    <div class="text">
        <label>password</label>
              <input  type="password" class="input"   name="password" required>
    </div>
    
    <button type="submit" name="submit" id="button">submit</button>
    <h4  class="text">already have an account?<a href="log-in.php" id="sign">sign-in here</a></h4>
</form>
</div>
</body>
</html>