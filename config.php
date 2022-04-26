<?php
session_start();
error_reporting(0);
$username = "";
$email = "";
$errors=array();

$db=mysqli_connect('localhost', 'root', '', 'blueelectronics') or die("Could not connect to database!");
if(isset($_POST['reg_user'])){
$username=mysqli_real_escape_string($db, $_POST['username']);
$area=mysqli_real_escape_string($db, $_POST['area']);
$email=mysqli_real_escape_string($db, $_POST['email']);
$phone=mysqli_real_escape_string($db, $_POST['phone']);
$password=mysqli_real_escape_string($db, $_POST['password']);
$repassword=mysqli_real_escape_string($db, $_POST['repassword']);

if($password!=$repassword){array_push($errors, "Passwords do not match");}

$user_check_query="SELECT * FROM users WHERE email='$email' LIMIT 1";
$result=mysqli_query($db, $user_check_query);
$user=mysqli_fetch_assoc($result);

if($user) {
    if($user['email']==$email){array_push($errors, "Email already exists");}
}

if (count($errors)==0) {
    $query="INSERT INTO users (username, area, phoneno, email, password) VALUES('$username','$area','$phone','$email','$password')";
    mysqli_query($db, $query);

    $_SESSION['username']=$username;
    $_SESSION['success']="Login Successful";

    header('location: index.php');
}
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>