<?php
require_once('./validation.php');
require_once('./session.php');
    if (isset($_POST['id']) && isset($_POST['oldPass']) && isset($_POST['newPass'])) {
        $oldPass=inputValidation($_POST['oldPass']);
        $newPass=inputValidation($_POST['newPass']);
        $id=inputValidation($_POST['id']);
        if (strlen($oldPass)>0 && strlen($newPass)>0 && strlen($id)>0) {
            if (strlen($newPass)>5) {
                require_once('./config.php');
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
                            alertMessage('success',"Password reset successfull.. "); 
                            header("Location: ./index.php");
                        } else {
                            alertMessage('error',"Something went wrong! "); 
                            header("Location: ./password-reset.php");
                        }
                    } else {
                       
                        alertMessage('error',"Old Password dose not match"); 
                        header("Location: ./password-reset.php");
                    }
                } else {
                    alertMessage('error',"Something went wrong..!"); 
                    header("Location: ./password-reset.php");
                }
            } else {
                alertMessage('error',"Password must be mare then 5 carrecter"); 
                header("Location: ./password-reset.php");
            }
        } else {
            alertMessage('error',"Field must be required"); 
            header("Location: ./password-reset.php");
        }
    } else {
        alertMessage('error',"Something went wrong..!"); 
        header("Location: ./password-reset.php");
    }
