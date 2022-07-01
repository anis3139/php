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
    window.location = document.referrer;
</script>
<?php

require_once('./footer2.php');
