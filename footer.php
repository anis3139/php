<?php
  mysqli_close($mysql);
  if (isset($_SESSION['error'])) { 
      unset($_SESSION["error"]);
  }
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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