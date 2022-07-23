<?php


require_once('./DB.php');

$db=new DB();

$res=$db->get('users', '*');
var_dump($res);


 
