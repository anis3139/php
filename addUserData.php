<?php
require_once('./validation.php');
  $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
  $name=inputValidation($_POST['name']);
  $password=password_hash(inputValidation($_POST['password']), PASSWORD_BCRYPT);
  $email=inputValidation($_POST['email']);
  $phone=inputValidation($_POST['phone']);
  $dob=inputValidation($_POST['dob']);
  $gender=inputValidation($_POST['gender']);
  $role=inputValidation($_POST['role']);

  $sql="INSERT INTO `users` (`name`, `password`, `email`, `phone`, `dob`, `gender`, `role`)
                      VALUES ( '{$name}', '{$password}', '{$email}', '{$phone}', '{$dob}', '{$gender}', '{$role}' )" ;
 echo $sql;
  $result=mysqli_query($mysql, $sql) or die("insert failed");
  
  if ($result) {
      header("Location: ./user.php");
  } else {
      header("Location: ./add-user.php");
  }

mysqli_close($mysql);
