 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
         integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="./css/login.css">
 </head>

 <body>

     <?php
    session_start();
    
    $inactive = 5;
     require_once('./config.php');

    if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
        header('location:index.php');
    }
    if (isset($_POST['email']) && isset($_POST['password'])) {
        require_once('./validation.php');
        $email=inputValidation($_POST['email']);
        $password=inputValidation($_POST['password']);
        if (strlen($email)>0 && strlen($password)>4) {
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
                    $_SESSION['success']="Login Successfull";
                    $_SESSION['expire'] = time() + $inactive;
                    header('location:index.php');
                } else {
                    $_SESSION['login']=false;
                    $_SESSION['error']="Password is incorrect";
                    $_SESSION['expire'] = time() + $inactive;
                    header('location:login.php');
                }
            } else {
                $_SESSION['login']=false;
                $_SESSION['error']="email or password dosn't match";
                $_SESSION['expire'] = time() + $inactive;
                header('location:login.php');
            }
        } else {
            $_SESSION['login']=false;
            $_SESSION['error']="Email and password required";
            $_SESSION['expire'] = time() + $inactive;
            header('location:login.php');
        }
    }

?>


     <div class="row">
         <?php  include('./errorMessage.php') ;?>
         <div class="col-lg-12">
             <div class="wrapper">
                 <div class="logo">
                     <img src="./images/download.png" alt="">
                 </div>
                 <form class="p-3 mt-3"
                     action="<?php $_SERVER['PHP_SELF'];?>"
                     method="post">
                     <div class="form-field d-flex align-items-center">
                         <span class="far fa-user"></span>
                         <input required type="text" name="email" id="userName" placeholder="email">
                     </div>
                     <div class="form-field d-flex align-items-center">
                         <span class="fas fa-key"></span>
                         <input required type="password" name="password" id="pwd" placeholder="Password">
                     </div>
                     <button class="btn mt-3">Login</button>
                 </form>
                 <div class="text-center fs-6">
                     <a href="./forget.php">Forget password?</a> or <a href="./registration.php">Sign up</a>
                 </div>
             </div>

         </div>
     </div>


     <?php
           
           if (isset($_SESSION['expire']) && time() > $_SESSION['expire']) {
               if (isset($_SESSION['error'])) {
                   unset($_SESSION['error']);
               }
               if (isset($_SESSION['success'])) {
                   unset($_SESSION['success']);
               }
           }
       ?>


     <script>
         function closeAlert() {
             window.location = "./signout.php";
         }
     </script>


 </body>

 </html>