<?php
require_once('./header2.php');
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
    unset($_SESSION['success']);
}
?>
<script>
    let result = document.referrer.split("?");
    window.location = result[0];
</script>
<?php

require_once('./footer2.php');
