<?php

/**
 * class
 * final keyword
 * static method and scope
 * static method and relation with child
 * static property and child class behavior
 * constant
 * interface
 * abstruct class
 * trait
 * method overrite
 * object chaining
 * Expception handaling
 */

interface intClass
{
    public function sayHi();
}

interface intClass2
{
    public function sayHello();
}

trait common
{
    public function error()
    {
        echo "something wrong";
    }
}


class Test
{
    use common;
    public const AGE=23;
    public static $name; //property

    public function __construct($n)
    {
        // $this->name=$n;
    }

    public function sayHi() //method
    {
        echo"hello\n";
    }

    public function sayHello()
    {
        if (self::AGE!==23) {
            throw new \Exception("Value must 23");
        }
        echo self::AGE;
    }

    public static function sayStatic()
    {
        self::$name="static property";
        echo "hey";
    }

    public function chaining($n)
    {
        echo $n;
        return $this;
    }

    public function chaining2($m)
    {
        echo $m;
        return $this;
    }
}

class Child implements intClass2
{
    use common;
    public const AGE=30;

    public function sayHello()
    {
        echo self::AGE;
    }
}

$test=new Test('kjsdfn');
$test->sayHello();

// echo Test::AGE;

// $child= new Child('shakil');
// $child->sayHi();
// $child->sayHi();
// $child->sayHi();
// $child->sayHi();
// $child->sayHi();
// $child->sayHi();
// $test=new Test('new name');
// echo $test->name;
