<?php
    $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $role=$_POST['role'];

  try {
      $sql="UPDATE users SET 
      name= '{$name}', 
      email= '{$email}', 
      phone='{$phone}',
      gender='{$gender}', 
      role='{$role}',
      dob='{$dob}'
      WHERE id={$id}" ;

      echo $sql;

      $result=mysqli_query($mysql, $sql);
      echo $result;
  } catch (\Throwable $th) {
      throw $th->getMessage();
  }
  
  if ($result) {
      header("Location: ./user.php");
  } else {
      header("Location: ./edit-user.php");
  }
