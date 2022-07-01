<?php
     require_once('./config.php');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $role=$_POST['role'];

  try {
      $sql="UPDATE users SET 
      name= '{$name}',  
      phone='{$phone}',
      gender='{$gender}', 
      role='{$role}',
      dob='{$dob}'
      WHERE id={$id}" ;

      $result=mysqli_query($mysql, $sql); 
  } catch (\Throwable $th) {
      throw $th->getMessage();
  }
  
  if ($result) {
      header("Location: ./user.php");
  } else {
      header("Location: ./edit-user.php");
  }
