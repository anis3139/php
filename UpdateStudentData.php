<?php
     require_once('./config.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $district=$_POST['district'];

  try {
      $sql="UPDATE students SET name= '{$name}', class= '{$class}', district='{$district}' WHERE id={$id}" ;
 

      $result=mysqli_query($mysql, $sql);
  } catch (\Throwable $th) {
      throw $th->getMessage();
  }
  
  if ($result) {
      header("Location: ./students.php");
  } else {
      header("Location: ./edit-students.php");
  }
 
