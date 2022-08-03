<?php

use Child as GlobalChild;

abstract class AB{
    public $name;
    abstract function callme();
    public function sayHello(){
        echo "hello";
    }
}

class Child extends AB{
    public function callme(){

    }
}

$child=new Child();
$child->sayHello();