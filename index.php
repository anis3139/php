<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

    <!-- GET, POST, PUT/PATCH, DELETE -->

    <form action="./data.php" method="POST" enctype="multipart/form-data">
      <label for="fName">First Name</label>
      <input type="text" id="fName" name="fName"> <br><br>
      <label for="lName">Last Name</label>
      <input type="text" id="lName" name="lName"> <br><br>
      <input type="file" name="image[]" id="image"><br><br>
      <input type="file" name="image[]" id="image"><br><br>
      <input type="submit" value="Submit">
    </form>

</body>
</html>