<?php
 
  if (isset($_SESSION['error'])) {
      unset($_SESSION["error"]);
  }
  mysqli_close($mysql);
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<style>
  .inline {
    display: inline-block;

    float: right;

    margin: 20px 0px;
  }

  input,
  button {
    height: 34px;
  }

  .items {
    display: inline-block;
  }

  .items a {
    font-weight: bold;

    font-size: 18px;

    color: black;

    float: left;

    padding: 8px 16px;

    text-decoration: none;

    border: 1px solid black;

    margin: 2px;
  }

  a {
    text-decoration: none;
  }

  .items a.active {
    background-color: rgba(175, 201, 244, 0.97);
  }

  .items a:hover:not(.active) {
    background-color: #87ceeb;
  }
</style>
<script>
  function go2Page(pageNum) {
    var page = document.getElementById("page").value;

    page = ((page > <?php echo $total_pages; ?> ) ?
      <?php echo $total_pages; ?>
      :
      ((page < 1) ? 1 : page));

    window.location.href = pageNum + '.php?page=' + page;
  }
</script>

</body>

</html>