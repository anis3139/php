<?php

$slug=$_SERVER['DOCUMENT_URI'];

$blogRoute=['/blogs.php', '/add-blogs.php', '/edit-blogs.php'];
$userRoute=['/user.php', '/add-user.php', '/edit-user.php'];

if (in_array($slug, $blogRoute)) {
    $route=  'blogs';
} elseif (in_array($slug, $userRoute)) {
    $route=  'user';
} else {
    $route=  'home';
}
 
 
