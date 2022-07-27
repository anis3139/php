<?php

use Anis3139\Php\Contacts;
use Anis3139\Php\Database\DB;
use Anis3139\Php\Database\Seed\Seeder;
use Anis3139\Php\Users;

require_once __DIR__ . '/vendor/autoload.php';

$contancts= new Contacts();
$contancts->hello();

$user=new Users();
$user->hello();

$seeder=new Seeder();
$seeder->hello();

$db = DB::getInstance();

// $users = $db->select('users');
// $blogs = $db->select('blogs');
// echo '<pre>';  print_r($blogs); echo '</pre>';

// $newData= $db->insert('blogs', array ('title'=>'test title','description'=>'description','image'=>'/images/blog/1657777729.jpg','user_id'=>'1', ));

// echo '<pre>';  print_r($newData); echo '</pre>';

//  echo $db->update('blogs',array("title"=>'edited',"description"=>'123'),array('id'=>28));

//  echo $db->delete('blogs', array('id'=>'22'));  


// $list = $db->select('users', array('name'=>'tom','password'=>'ds'),array('name','password'));



 
