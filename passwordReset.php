<?php
require_once('./validation.php');
require_once('./session.php');
$inactive = 5;
    if (isset($_POST['id']) && isset($_POST['oldPass']) && isset($_POST['newPass'])) {
        $oldPass=inputValidation($_POST['oldPass']);
        $newPass=inputValidation($_POST['newPass']);
        $id=inputValidation($_POST['id']);
        if (strlen($oldPass)>0 && strlen($newPass)>0 && strlen($id)>0) {
            if (strlen($newPass)>5) {
                $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
                $passwordSql =  "SELECT `password` FROM users WHERE `id`='{$id}' LIMIT 1";
                $response=mysqli_query($mysql, $passwordSql);
                if (mysqli_num_rows($response)>0) {
                    $passwordResponse= mysqli_fetch_assoc($response);
                    $checkPass=password_verify($oldPass, $passwordResponse['password']);
                    if ($checkPass) {
                        $newPassword=password_hash($newPass, PASSWORD_BCRYPT);
                        $sql =  "UPDATE users SET  `password` = '{$newPassword}' WHERE `id`='{$id}' ";
                        $response=mysqli_query($mysql, $sql);
                        if ($response) {
                            $_SESSION['success']="Password reset successfull.. ";
                            $_SESSION['expire'] = time() + $inactive;
                            header("Location: ./index.php");
                        } else {
                            $_SESSION['error']="Something went wrong! ";
                            $_SESSION['expire'] = time() + $inactive;
                            header("Location: ./password-reset.php");
                        }
                    } else {
                        $_SESSION['error']="Old Password dose not match";
                        $_SESSION['expire'] = time() + $inactive;
                        header("Location: ./password-reset.php");
                    }
                } else {
                    $_SESSION['error']="Something went wrong..!";
                    $_SESSION['expire'] = time() + $inactive;
                    header("Location: ./password-reset.php");
                }
            } else {
                $_SESSION['error']="Password must be mare then 5 carrecter";
                $_SESSION['expire'] = time() + $inactive;
                header("Location: ./password-reset.php");
            }
        } else {
            $_SESSION['error']="Field must be required";
            $_SESSION['expire'] = time() + $inactive;
            header("Location: ./password-reset.php");
        }
    } else {
        $_SESSION['error']="Something went wrong..!";
        $_SESSION['expire'] = time() + $inactive;
        header("Location: ./password-reset.php");
    }
