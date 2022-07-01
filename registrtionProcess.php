<?php

$inactive=10;
require_once('./validation.php');
require_once('./session.php');
require_once('./config.php');
 
  $name=inputValidation($_POST['name']);
  $password=password_hash(inputValidation($_POST['password']), PASSWORD_BCRYPT);
  $email=inputValidation($_POST['email']);
  $phone=inputValidation($_POST['phone']);
  $dob=inputValidation($_POST['dob']);
  $gender=inputValidation($_POST['gender']);
  $role=inputValidation($_POST['role']);

  //check unique email

  $sql="SELECT COUNT(email) from users where email='{$email}'" ;
  $res=mysqli_query($mysql, $sql);
  echo mysqli_num_rows($res);
  if (mysqli_num_rows($res)!=1) {
      $sql="INSERT INTO `users` (`name`, `password`, `email`, `phone`, `dob`, `gender`, `role`)
      VALUES ( '{$name}', '{$password}', '{$email}', '{$phone}', '{$dob}', '{$gender}', '{$role}' )" ;

      $result=mysqli_query($mysql, $sql);

      if ($result) {
          $_SESSION['success']="Successfully created";
          $_SESSION['expire'] = time() + $inactive;
          header("Location: ./login.php");
      } else {
          $_SESSION['error']=mysqli_error($mysql);
          $_SESSION['expire'] = time() + $inactive;
          header("Location: ./registration.php");
      }
  } else {
      $_SESSION['error']='Email Allready Exist!';
      $_SESSION['expire'] = time() + $inactive;
      header("Location: ./registration.php");
  }
  


mysqli_close($mysql);
