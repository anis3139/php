 
<?php
$mysql= mysqli_connect('localhost', 'anis', 'password', 'school') or die('Connection Error');
 
$sql="CREATE TABLE students (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
	  class VARCHAR(50) NOT NULL ,
	  district VARCHAR(50) NOT NULL, 
    PRIMARY KEY (id)
  );";
$result=mysqli_query($mysql, $sql) or die("something wrong");

if ($result) {
    echo "Successfully Created DB";
} else {
    echo "Something Wrong";
}
