<?php
require_once('./config.php');
require_once('./validation.php');
require_once('./session.php');
  $title=inputValidation($_POST['title']);
  $description=inputValidation($_POST['description']);
  $image=inputValidation($_POST['image']);
  $user_id=inputValidation($_POST['user_id']);

  $sql="INSERT INTO `blogs` (`title`, `description`, `image`, `user_id`) VALUES ( '{$title}', '{$description}', '{$image}', '{$user_id}' )" ;
 
  $result=mysqli_query($mysql, $sql);// or die("insert failed");
   
  
  if ($result) {
      header("Location: ./blogs.php");
  } else {
    
      header("Location: ./add-blogs.php");
  }

mysqli_close($mysql); 
