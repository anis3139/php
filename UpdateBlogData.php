<?php
     require_once('./config.php');
    $id=$_POST['id'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $imagePath=null;
    if (isset($_FILES['image'])) {
        $imgName=$_FILES['image']['tmp_name'];
        $imgName=$_FILES['image']['name'];
        $target_dir = "./images/blog/";
        $target_file = basename($_FILES["image"]["name"]);
  
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $path=$target_dir.time().'.'.$imageFileType;
  
        if (file_exists($path)) {
            echo "Sorry, file already exists.";
        }
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
  
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $path)) {
            $imagePath=substr($path, 1);
        } else {
            $imagePath=null;
        }
    }

  try {
      $sql="UPDATE blogs SET title= '{$title}', description= '{$description}', image='{$imagePath}' WHERE id={$id}" ;
      $result=mysqli_query($mysql, $sql);
  } catch (\Throwable $th) {
      throw $th->getMessage();
  }
  
  if ($result) {
      header("Location: ./blogs.php");
  } else {
      header("Location: ./edit-blogs.php");
  }
