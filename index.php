<?php

use Anis3139\Php\Database\DB;

require_once __DIR__ . '/vendor/autoload.php';

$user = DB::table('blogs')->get();
echo '<pre>';
print_r($user);
echo '</pre>';

// $user = DB::table('blogs')->find(43);
// echo '<pre>';
// print_r($user);
// echo '</pre>';

// $newData= DB::table('blogs')->insert([
//         'title'=>'test title',
//         'description'=>'description',
//         'image'=>'/images/blog/1657777729.jpg',
//         'user_id'=>'1'
//     ]);

// echo '<pre>';
// print_r($newData);
// echo '</pre>';

// $update= DB::table('blogs')->update(
//             [
//                 "title"=>'edited',
//                 "description"=>'123'
//             ],
//             [
//                 'id'=>43
//             ]
//         );
// echo '<pre>';  print_r($update); echo '</pre>';

// echo DB::table('users')->delete(array('id'=>'22'));
