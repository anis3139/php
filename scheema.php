 
<?php
$mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
 
$sql="CREATE TABLE students (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
	class VARCHAR(50) NOT NULL ,
	district VARCHAR(50) NOT NULL, 
    PRIMARY KEY (id)
  );";

$sql="CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL ,
	email VARCHAR(50) NOT NULL, 
	phone VARCHAR(50) NOT NULL, 
	gender tinyint NOT NULL, 
	age int NOT NULL, 
    PRIMARY KEY (id)
  );";


$result=mysqli_query($mysql, $sql) or die("something wrong");

if ($result) {
    echo "Successfully Created DB";
} else {
    echo "Something Wrong";
}
