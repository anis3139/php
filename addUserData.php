<?php
require_once('./validation.php');
   require_once('./config.php');
   require_once('./authCheck.php');
  $name=inputValidation($_POST['name']);
  $password=password_hash(inputValidation($_POST['password']), PASSWORD_BCRYPT);
  $email=inputValidation($_POST['email']);
  $phone=inputValidation($_POST['phone']);
  $dob=inputValidation($_POST['dob']);
  $gender=inputValidation($_POST['gender']);
  $role=inputValidation($_POST['role']);

  $sql="INSERT INTO `users` (`name`, `password`, `email`, `phone`, `dob`, `gender`, `role`)
                      VALUES ( '{$name}', '{$password}', '{$email}', '{$phone}', '{$dob}', '{$gender}', '{$role}' )" ;
 
  $result=mysqli_query($mysql, $sql) or die("insert failed");
  
  if ($result) {
      header("Location: ./user.php");
  } else {
      header("Location: ./add-user.php");
  }

mysqli_close($mysql);
