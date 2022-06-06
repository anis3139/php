<?php


// $arr=[
//     ['id'=>1, 'name'=>'anis', 'age'=>24, ['address'=>[
//         'vill'=>'pilgiri', 'p.o'=>'adda', 'p.s'=>'barura', 'dist'=>'comilla'
//     ]]],
//     ['id'=>2, 'name'=>'lima', 'age'=>22],
//     ['id'=>3,'name'=>'rakhia', 'age'=>20]
// ];


// foreach ($arr as $key => $value) {
  
//     foreach ($value as $key2 => $data) {
//           echo '<pre>';
//           print_r($data);
//           echo '</pre>';
//     }
// }


// $arr =[
//         ['id'=>1, 'name'=>'anis', 'age'=>24],
//         ['id'=>2, 'name'=>'lima', 'age'=>22],
//         ['id'=>3,'name'=>'rakhia', 'age'=>20]
// ];


//  print_r(array_column($arr, 'name'));


// $fname=array("Peter","Ben","Joe");
// $age=array("35","37","43");

// $c=array_combine($fname,$age);
// print_r($c);

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("e"=>"red","b"=>"green","d"=>"blue");

// $result=array_diff_key($a1,$a2);
// print_r($result);



// $a1=array(1,3,2,3,4);

// $result= array_filter($a1,function($var){
//     if ($var%2==0) {
//         return true;
//     }
// });

// echo '<pre>';
// print_r($result);
// echo '</pre>';

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"red","f"=>"green","g"=>"blue");

// $result=array_key_exists('a', $a1);
// print_r($result);

// function myfunction($v)
// {
//   return "mr/mrs. {$v}";
// }

// $a=array('anis','lima','shakil','rakhia');

// echo '<pre>';
// print_r(array_map("myfunction",$a));
// echo '</pre>';

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"red","f"=>"green","g"=>"blue");

// $res= array_merge($a1, $a2);

$a=array("red","green","blue");
array_pop($a);
array_push($a, 'anis', 'lima');


// function myfunction($v1, $v2)
// {
//     return $v1 + $v2;
// }

// $a=array(1,2,3,4);

// print_r(array_reduce($a, "myfunction"));


// $a=array("a"=>"red","b"=>"green","c"=>"blue");

// echo array_shift($a);


// $a=array("red","green","blue","yellow","brown");

// echo '<pre>';
// print_r(array_slice($a, 2, 2)); 
// echo '</pre>';

// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"purple","b"=>"orange");
// array_splice($a1,0,1, ['anis', 'shakil']);
// echo '<pre>';
// print_r($a1);
// echo '</pre>';

// $range= range(1,100);

// echo '<pre>';
// print_r($range);
// echo '</pre>';
 