<?php
$mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
  $id=$_POST['id'];
  $name=$_POST['name'];
  $class=$_POST['class'];
  $district=$_POST['district']; 

  $sql="UPDATE students SET (name= '$name' class= '$class', district='$district') WHERE id='$id'" ;

  $result=mysqli_query($mysql, $sql) or die("No Result Found");
  
  if( $result){
      header("Location: ./index.php");
  }else{
    header("Location: ./edit.php");
  }

mysqli_close($mysql);
