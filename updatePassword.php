<?php
require_once('./validation.php');
require_once('./session.php');
$inactive = 5;
    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])) {
        $requestEmail=inputValidation($_POST['email']);
        $requestPhone=inputValidation($_POST['phone']);
        $requestPassword=inputValidation($_POST['password']);
        if (strlen($requestEmail)>0 && strlen($requestPassword)>0) {
            if (strlen($requestPassword)>5) {
                 require_once('./config.php');
                $newPassword=password_hash($requestPassword, PASSWORD_BCRYPT);
                $sql =  "UPDATE users SET  `password` = '{$newPassword}' WHERE `email`='{$requestEmail}' AND `phone` = '{$requestPhone}'";
                $response=mysqli_query($mysql, $sql);
                if ($response) {
                    $_SESSION['login']=false;
                    $_SESSION['success']="Password reset successfull.. ";
                    $_SESSION['expire'] = time() + $inactive;
                    header("Location: ./login.php");
                } else {
                    $_SESSION['login']=false;
                    $_SESSION['error']="Something went wrong!";
                    $_SESSION['expire'] = time() + $inactive;
                    header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
                }
            } else {
                $_SESSION['login']=false;
                $_SESSION['error']="Password must be mare then 5 carrecter";
                $_SESSION['expire'] = time() + $inactive;
                header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
            }
        }
    } else {
        $_SESSION['login']=false;
        $_SESSION['error']="Something went wrong..!";
        $_SESSION['expire'] = time() + $inactive;
        header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
    }
