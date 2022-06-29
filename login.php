<?php

require_once('header.php'); 

    if(isset($_SESSION['login']) && $_SESSION['login']=='success'){
         header('location:index.php');
    }
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
         
        $sql= "SELECT * from users 
        WHERE username='{$username}' AND 
        password='{$password}' LIMIT 1";
        $result=mysqli_query($mysql, $sql) or die('no result found');

        if(mysqli_num_rows($result)>0){
            $_SESSION['login']='success';
            header('location:index.php');
        }else{
            $_SESSION['login']=false; 
            $_SESSION['error']="username or password dosn't match";
            header('location:login.php');
        }
        
                
    }

?>

<div class="row mt-5">
    <div class="col-md-8 offset-md-2">
        <?php
          if( isset($_SESSION['error'])):
              ?>
            <blockquote>
                <?php  echo  $_SESSION['error']; ?>
            </blockquote>
            <?php
            session_destroy();
          endif;
        ?>
        <form action=" <?php $_SERVER['PHP_SELF'] ?> " method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="text" name="username" id="form2Example1" class="form-control" />
                <label class="form-label"  for="form2Example1">User Name</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="form2Example2" class="form-control" />
                <label class="form-label" for="form2Example2">Password</label>
            </div>

           

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            
        </form>
    </div>
</div>