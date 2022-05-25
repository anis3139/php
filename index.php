<?php

/**
 * count word/character
 * word/character position
 * chracter slice
 * word/ charecter replace
 * reverce
 */

// $x = 'hello world   '; 
// $arr=ltrim($x);
// echo ucfirst($arr);

// $number = 9;
// $str = "Beijing";
// printf("There are %u million bicycles in %s.",$number,$str);

// $str = "Hello World";
// echo str_pad($str,20," ....");


// echo ucwords("I love php, I love php too!");


// $arr=['mangoo', 'banana', 'orange'];
// echo implode('-', $arr);

$str='hello world';           
echo print_r(explode(' ', $str));

$arr = array('Hello','World!','Beautiful','Day!');
echo join("- ",$arr);