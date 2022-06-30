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
        if (isset($_SESSION['login']) && $_SESSION['login']=='success') {
            header('location:index.php');
        }
    ?>
    <div class="row text-center mt-2">
        <h1>Sign up Form</h1>
    </div>
    <?php  include('./registrationForm.php') ;?>  
</body>
</html>