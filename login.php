<?php

require_once('./header2.php');
     
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
                    $_SESSION['token']=md5(trim($userResult['email']));
                    alertMessage('success', 'Login Successfull');
                    header('location:index.php');
                } else {
                    $_SESSION['login']=false;
                    alertMessage('error', "Password is incorrect");
                    header('location:login.php');
                }
            } else {
                $_SESSION['login']=false;
                alertMessage('error', "User not found");
                header('location:login.php');
            }
        } else {
            $_SESSION['login']=false;
            alertMessage('error', "Email and password required");
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

<?php  require_once('./footer2.php') ;
