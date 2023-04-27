<?php 
//echo $_POST["username"]; 

$username = $_POST['username'];
$password = $_POST['password'];

if (($username == 'kofi' ) && ($password == '1234')) {
    // echo "Welcome $username";
    header("Location:teams.php");
    exit();
    
}
else {
    // echo 'Incorrect username or password.Try again!';
    header("Location:index.php");
    exit();
}