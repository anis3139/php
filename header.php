<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body>

  <?php

require_once('./session.php');

// error message time second
$inactive = 15;

//check route
$route=$_SERVER['REQUEST_URI'];

require_once('./authCheck.php');
// logout
if (isset($_REQUEST['logout'])) {
    $delID= $_REQUEST['logout'];
    session_destroy();
    header("Location: ./login.php");
}

?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary logout">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">PHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link <?php echo $route=='/'|| $route=='/index.php'? 'active':'' ;?> "
              aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?php echo $route=='/user.php'? 'active':'' ;?>"" aria-current="
              page" href="./user.php">User</a>
          </li>

        </ul>
        <div onmouseover="openLogout(this)">
          <a href="#" onmouseout="logoutRemove(this)">
            <img class="rounded-circle" src="./images/download.png" width="50px" height="50px" alt="">
          </a>
          <div class="logout-div">
            <?php  if (isset($_SESSION['name'])): ;?>
            <p>
              <?php  echo   $_SESSION['name']; ?>
              ( <?php  echo   $_SESSION['role']; ?>)
            </p>
            <?php  endif ;?>
            <a href="./?logout" onclick="return confirm('Are u sure?')">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <script>
    var x = document.querySelector('.logout-div');

    function openLogout() {
      x.style.display = "block";
    }

    function logoutRemove() {
      setTimeout(function() {
        x.style.display = 'none';
      }, 3000);
    }
  </script>