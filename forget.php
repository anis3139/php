<?php
require_once('./header2.php');

    if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
        header('location:index.php');
    }
    if (isset($_POST['email']) && isset($_POST['phone'])) {
        require_once('./validation.php');
        $email=inputValidation($_POST['email']);
        $phone=inputValidation($_POST['phone']);
        if (strlen($email)>0 && strlen($phone)>0) {
            $sql= "SELECT * from users  WHERE email='{$email}'  LIMIT 1";
            $queryResult=mysqli_query($mysql, $sql) or die('no result found');
            if (mysqli_num_rows($queryResult)>0) {
                $userResult=mysqli_fetch_assoc($queryResult);
                header("location: recover.php?email={$userResult['email']}&phone={$userResult['phone']}");
            } else {
                $_SESSION['login']=false;
                alertMessage('error', "email or phone dosn't match");
                header('location:login.php');
            }
        } else {
            $_SESSION['login']=false;
            alertMessage('error', "Email and phone required");
            header('location:login.php');
        }
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
            <form class="p-3 mt-3"
                action="<?php $_SERVER['PHP_SELF'];?>"
                method="post">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input required type="text" name="email" id="userName" placeholder="email">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-phone"></span>
                    <input required type="text" name="phone" id="pwd" placeholder="phone">
                </div>
                <button class="btn mt-3">Reset Password</button>
            </form>
            <div class="text-center fs-6">
                <a href="./login.php">Sign in?</a> or <a href="./registration.php">Sign up</a>
            </div>
        </div>

    </div>
</div>



<?php
require_once('./footer2.php');
