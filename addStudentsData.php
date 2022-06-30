<?php
$mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
  $name=$_POST['name'];
  $class=$_POST['class'];
  $district=$_POST['district'];

  $sql="INSERT INTO `students` (`name`, `class`, `district`) VALUES ( '{$name}', '{$class}', '{$district}' )" ;
 
  $result=mysqli_query($mysql, $sql) or die("insert failed");
  
  if( $result){
      header("Location: ./index.php");
  }else{
    header("Location: ./add-students.php");
  }

mysqli_close($mysql);