<?php

session_start();


/**
 * Show Alert Message
 *
 * @param string $type
 * @param string $message
 * @return void
 */
function alertMessage(string $type, string $message):void
{
    $_SESSION[$type]=$message;
    $_SESSION['expire'] = time() + 5;
}

// alert message destroy by key
if (isset($_SESSION['expire']) && time() > $_SESSION['expire']) {
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        unset($_SESSION['success']);
    }
}



//WHOLE APPLICATION SESSION DESTROY FOR 2 HOURS

//Set the session duration for 5 seconds
$duration = 7200;

//Read the request time of the user
$time = $_SERVER['REQUEST_TIME'];

//Check the user's session exist or not
if (isset($_SESSION['LAST_ACTIVITY']) &&  ($time - $_SESSION['LAST_ACTIVITY']) > $duration) {
    
    //Unset the session variables
    session_unset();

    //Destroy the session
    session_destroy();

    //Start another new session
    session_start();
}
//Set the time of the user's last activity
$_SESSION['LAST_ACTIVITY'] = $time;

?>





<!--  alert message destroy all -->
<script>
    function closeAlert() {
        window.location = "./signout.php";
    }
</script>