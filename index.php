<?php
 
/**
 * Its return Addition
 *
 * @param integer $num1
 * @param integer $num2
 * @return integer
 */
// function testFunction(int $num1, int $num2):int{
//      return  $num1+$num2;
// }

// $result=testFunction(12, 40);
// echo $result;



// $arr=[1,2,3,4,5];

// echo $arr[3];

// for ($i=0; $i < count($arr) ; $i++) { 
//     echo $arr[$i]."\n";
// }

// $a=0;
// while ($a <= 10) {
//     echo "hello world";

//     $a++;
// }

$arr=["name"=>"anis", "age"=>23, "class"=>"eight", "dist"=>"comilla", "city"=>"dhaka" ];

foreach ($arr as  $key=>$value) {
    if($key=='class'){
        continue;
    }
    
    echo $key."=".$value.PHP_EOL;
    
    if ($key=='dist') {
        break;
    }
}

