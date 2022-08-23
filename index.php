<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Search</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php
  require './vendor/autoload.php';

  $response=[];

  if (isset($_REQUEST['q']) && !empty($_REQUEST['q'])) {
      $q=$_REQUEST['q'];
      $search = new Wedevsw\Php\GoogleSearch($q);
      $response = $search->getResult();
  }

  ?>
  <div class="container">

    <div>
      <form action="/" method="post">
        <input type="text" id="search" name="q">
        <input type="submit" value="Search">
      </form>
    </div>

    <?php

    foreach ($response as $key => $value):
        ?>

    <div>
      <a class="content"
        href="<?php echo $value['link']; ?> "><?php echo $value['title']; ?></a>
    </div>

    <?php endforeach; ?>


  </div>

</body>

</html>