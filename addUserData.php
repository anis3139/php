<?php
  $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
  $name=$_POST['name'];
  $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $role=$_POST['role'];

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
