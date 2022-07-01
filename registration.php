<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php
        require_once('./session.php');
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

</body>

</html>