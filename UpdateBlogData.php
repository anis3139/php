<?php
     require_once('./config.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $district=$_POST['district'];

  try {
      $sql="UPDATE blogs SET name= '{$name}', class= '{$class}', district='{$district}' WHERE id={$id}" ;
 

      $result=mysqli_query($mysql, $sql);
  } catch (\Throwable $th) {
      throw $th->getMessage();
  }
  
  if ($result) {
      header("Location: ./blogs.php");
  } else {
      header("Location: ./edit-blogs.php");
  }
 
