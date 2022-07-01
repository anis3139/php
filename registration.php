<?php

require_once('./header2.php');
        if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
            header('location:index.php');
        }
    ?>

<?php require_once('./errorMessage.php')  ;?>

<div class="d-flex justify-content-center wrapper">
    <div class="w-100">
        <div class="   text-center">
            <h2>Registration Form</h2>
            <hr>
        </div>
        <div class="row p-5 pt-2">
            <div class="col-md-10 offset-md-1 mt-2">
                <form action="./registrtionProcess.php" method="POST">
                    <?php  include('./registrationForm.php') ;?>
                </form>
            </div>
        </div>
        <div class="text-center fs-6">
            <a href="./forget.php">Forget password?</a> or <a href="./login.php">log in</a>
        </div>
    </div>
</div>

<?php

require_once('./footer2.php');
