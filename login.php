 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Document</title>
     <style>
         .add-btn {
             display: inline-block;
             float: right;
             margin: 20px;
             padding: 5px 10px;
         }
     </style>
 </head>

 <body>

     <?php
    session_start();
    
    $inactive = 10;
    $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
    
 

    if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
        header('location:index.php');
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email=$_POST['email'];
        $password=$_POST['password'];
         
        $sql= "SELECT * from users  WHERE email='{$email}'  LIMIT 1";
        $loginResult=mysqli_query($mysql, $sql) or die('no result found');
        if (mysqli_num_rows($loginResult)>0) {
            $userResult=mysqli_fetch_assoc($loginResult);
            if (password_verify($password, $userResult['password'])) {
                $_SESSION['login']='success';
                $_SESSION['name']=$userResult['name'];
                $_SESSION['role']=$userResult['role'];
                $_SESSION['email']=trim($userResult['email']);
                $_SESSION['token']=md5($userResult['email']);
                header('location:index.php');
            } else {
                $_SESSION['login']=false;
                $_SESSION['error']="Password is incorrect";
                $_SESSION['expire'] = time() + $inactive;
                header('location:login.php');
            }
        } else {
            $_SESSION['login']=false;
            $_SESSION['error']="name or password dosn't match";
            $_SESSION['expire'] = time() + $inactive;
            header('location:login.php');
        }
    }

?>
     <div class="row text-center mt-2">
         <h1>Sign in Form</h1>
     </div>
     <div class="row mt-5">
         <div class="col-md-8 offset-md-2">
             <?php
          if (isset($_SESSION['error'])):
              ?>
             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <strong>Error!</strong> <?php  echo  $_SESSION['error']; ?>
                 <button type="button" class="btn-close" onclick="closeAlert()"></button>
             </div>
             <?php
          endif;
        ?>
             <form
                 action=" <?php $_SERVER['PHP_SELF'] ?> "
                 method="POST">
                 <!-- Email input -->
                 <div class="form-outline mb-4">
                     <label class="form-label" for="form2Example1">Email</label>
                     <input type="text" name="email" id="form2Example1" class="form-control" />

                 </div>

                 <!-- Password input -->
                 <div class="form-outline mb-4">
                     <label class="form-label" for="form2Example2">Password</label>
                     <input type="password" name="password" id="form2Example2" class="form-control" />

                 </div>



                 <!-- Submit button -->
                 <div class="row">
                     <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                     <a class="btn btn-success" href="./registration.php">Sign up</a>
                 </div>

             </form>
         </div>
     </div>

     <?php
           
            if (isset($_SESSION['expire']) && time() > $_SESSION['expire']) {
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                }
            }
        ?>
     <script>
         function closeAlert() {
             window.location = "./signout.php";
         }
     </script>
     <!-- endfile  -->