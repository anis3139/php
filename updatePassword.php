<?php
require_once('./validation.php');
require_once('./session.php');
require_once('./authCheck.php');
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
                    alertMessage('success', "Password reset successfull.. ");
                    header("Location: ./login.php");
                } else {
                    $_SESSION['login']=false;
                    alertMessage('error', "Something went wrong!");
                    header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
                }
            } else {
                $_SESSION['login']=false;
                alertMessage('error', "Password must be mare then 5 carrecter");
                header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
            }
        }
    } else {
        $_SESSION['login']=false;
        alertMessage('error', "Something went wrong..!");
        header("Location: ./recover.php?email=$requestEmail&phone=$requestPhone");
    }
