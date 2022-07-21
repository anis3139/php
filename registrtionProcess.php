<?php
 
require_once('./validation.php');
require_once('./session.php');
require_once('./config.php');
 
  $name=inputValidation($_POST['name']);
  $password=password_hash(inputValidation($_POST['password']), PASSWORD_BCRYPT);
  $email=inputValidation($_POST['email']);
  $phone=inputValidation($_POST['phone']);
  $dob=inputValidation($_POST['dob']);
  $gender=inputValidation($_POST['gender']);

  //check unique email

  $sql="SELECT email from users where email='{$email}'" ;
  $res=mysqli_query($mysql, $sql);
  echo mysqli_num_rows($res);
  
  if (mysqli_num_rows($res)!=1) {
      $sql="INSERT INTO `users` (`name`, `password`, `email`, `phone`, `dob`, `gender`)
      VALUES ( '{$name}', '{$password}', '{$email}', '{$phone}', '{$dob}', '{$gender}' )" ;

      $result=mysqli_query($mysql, $sql);

      if ($result) {
          alertMessage('success', "Successfully created");
          header("Location: ./login.php");
      } else {
          alertMessage('error', mysqli_error($mysql));
          header("Location: ./registration.php");
      }
  } else {
      alertMessage('error', 'Email Allready Exist!');
      header("Location: ./registration.php");
  }
  


mysqli_close($mysql);
