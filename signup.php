<?php
include("class/connect.php");
include("class/signup.php");


$firstName="";
$lastName="";
$gender="";
$email="";
$password="";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $signup = new SignUp();
    $result =  $signup->evaluate($_POST);  
    if ($result != "") {

        echo $result; 
 

    }
    else {
        header("Location: login.php");
        die; // 

    } 
    $firstName=$_POST['fname'];
    $lastName=$_POST['lname'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];
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
    
      <a href="login.php">
			<div class="btn_signup">Log in</div>
	  </a>

    </div>


    <div class="bar2">
        
        Sign up to My SocialMedia <br><br>
        <form action="" method="post">
            <input type="text" name="fname" id="text" placeholder="First Name "><br><br>
            <input type="text" name="lname" id="text" placeholder="Last Name "><br><br>
            <span > Gender:</span>  <br><br>
            <select name="gender" id="text">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>  <br><br>
            <input type="email" name="email" id="text" placeholder="Email"><br><br>
            <input type="password" name="password" id="text" placeholder="Password"><br><br>
            <input type="password2" name="password" id="text" placeholder="Retype  Password"><br><br>
            <input type="submit" value="Sign Up " class="btn_signup"><br><br>
        </form>
     

    </div>
    
</body>
</html>