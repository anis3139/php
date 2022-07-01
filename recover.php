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
    
    $inactive = 10;
    $mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');

    if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
        header('location:index.php');
    }
    if (isset($_GET['email']) && isset($_GET['phone'])) {
        require_once('./validation.php');
        $email=inputValidation($_GET['email']);
        $phone=inputValidation($_GET['phone']);
        if (strlen($email)>0 && strlen($phone)>0) {
            $sql= "SELECT * from users  WHERE email='{$email}' AND phone='{$phone}'  LIMIT 1";
            $loginResult=mysqli_query($mysql, $sql) or die('no result found');
            if (mysqli_num_rows($loginResult)>0) {
                $userResult=mysqli_fetch_assoc($loginResult);
            } else {
                $_SESSION['login']=false;
                $_SESSION['error']="User not found";
                $_SESSION['expire'] = time() + $inactive;
                header('location:forget.php');
            }
        } else {
            $_SESSION['login']=false;
            $_SESSION['error']="Email and phone required";
            $_SESSION['expire'] = time() + $inactive;
            header('location:forget.php');
        }
    } else {
        $_SESSION['login']=false;
        $_SESSION['error']="Email and phone required";
        $_SESSION['expire'] = time() + $inactive;
        header('location:forget.php');
    }

?>


    <div class="row">
        <div class="col-md-8 offset-md-2 error-div mt-3">
            <?php
                                    if (isset($_SESSION['error'])):
                                        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> <?php  echo  $_SESSION['error']; ?>
                <button type="button" class="btn-close" onclick="closeAlert()"></button>
            </div>
            <?php
                                    endif;?>
        </div>
        <div class="col-lg-12">
            <div class="wrapper">
                <div class="logo">
                    <img src="./images/download.png" alt="">
                </div>
                <form class="p-3 mt-3" action="./updatePassword.php" method="POST">
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input readonly type="email" name="email" id="userName" placeholder="email"
                            value="<?php echo isset($userResult['email'])?$userResult['email']:''; ?>">
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input readonly type="text" name="phone" id="userName" placeholder="phone"
                            value="<?php echo isset($userResult['phone'])?$userResult['phone']:''; ?>">
                    </div>

                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input required type="password" name="password" id="pwd" placeholder="Enter your new password">
                    </div>
                    <button class="btn mt-3">submit</button>
                </form>
                <div class="text-center fs-6">
                    <a href="./forget.php">Sign in</a> or <a href="./registration.php">Sign up</a>
                </div>
            </div>

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


</body>

</html>