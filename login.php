<?php
session_start();

include("class/connect.php");
include("class/login.php");

$email="";
$password="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login = new Login();
    $result =  $login->evaluate($_POST);   // 
    if ($result != "") {
        echo $result;  

    }else {
        header("Location:index.php");
         die; // 

    }

    $email =$_POST['email'];
    $password =$_POST['password'];

}


 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>My Social Network</title>
</head>
<body>
    <div class="nav">
      <div class="tital" > My Social Media</div>
      
      <a href="signup.php">
			<div class="btn_signup">Signup</div>
	  </a>

    </div>


    <div class="bar2">
        log in to My SocialMedia <br><br>
        <form action="" method="post">
            
        <input type="text" name="email" id="text" placeholder="Email "><br><br>
        <input type="password" name="password" id="text" placeholder="Password"><br><br>
        <input type="submit" value="Login " name="login_btn" class="btn_log">
        </form>


    </div>
    
</body>
</html>
