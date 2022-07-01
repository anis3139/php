<?php
require_once('./config.php');
  $name=$_POST['name'];
  $class=$_POST['class'];
  $district=$_POST['district'];
  $user_id=$_POST['user_id'];

  $sql="INSERT INTO `students` (`name`, `class`, `district`, `user_id`) VALUES ( '{$name}', '{$class}', '{$district}', '{$user_id}' )" ;
 
  $result=mysqli_query($mysql, $sql) or die("insert failed");
  
  if ($result) {
      header("Location: ./students.php");
  } else {
      header("Location: ./add-students.php");
  }

mysqli_close($mysql);
