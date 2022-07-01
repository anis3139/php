<?php

$slug=$_SERVER['DOCUMENT_URI'];

$studentRoute=['/students.php', '/add-students.php', '/edit-students.php'];
$userRoute=['/user.php', '/add-user.php', '/edit-user.php'];

if (in_array($slug, $studentRoute)) {
    $route=  'students';
} elseif (in_array($slug, $userRoute)) {
    $route=  'user';
} else {
    $route=  'home';
}
 
 
