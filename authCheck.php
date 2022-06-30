<?php
//mysql connection
$mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
// check valied user
$isLogin=$_SESSION['login'];
$token=$_SESSION['token'];
$sessionEmail=$_SESSION['email'];

$sql= "SELECT * from users WHERE email='{$sessionEmail}' LIMIT 1";
$loginResult=mysqli_query($mysql, $sql) or die('no result found');
$logedInUser=mysqli_fetch_assoc($loginResult);
 
if (mysqli_num_rows($loginResult)==0 || md5($logedInUser['email']) != $token || $isLogin!='success') {
    session_destroy();
    header('location:login.php');
}
//roll and permission
$isAdmin;
$isUser;
if ($logedInUser['role'] == 'admin') {
    $isAdmin=true;
} elseif ($logedInUser['role'] == 'user') {
    $isUser=true;
}
