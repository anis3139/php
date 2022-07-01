<?php
 require_once('./config.php');
$sql="CREATE TABLE students ( 
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    class VARCHAR(50) NOT NULL , 
    district VARCHAR(50) NOT NULL,
    user_id INT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
  );";
$sql1="CREATE TABLE address (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    house VARCHAR(50) NOT NULL,
	po VARCHAR(50) NOT NULL ,
	thana VARCHAR(50) NOT NULL,
	district VARCHAR(50) NOT NULL,
	user_id INT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
  )";

$sql2="CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL ,
	email VARCHAR(100) NOT NULL,
	phone VARCHAR(50) NOT NULL,
	gender tinyint NOT NULL,
	dob timestamp,
	role VARCHAR(50) DEFAULT 'user',
	created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    INDEX (gender, role),
    PRIMARY KEY (id)
  )";

$sql3="CREATE TABLE wallets (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    balance float(10,2) NOT NULL,
    user_id INT NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
  )";

function truncateTable($mysql, $tableName)
{
    $sql="TRUNCATE {$tableName}";
    $result=  mysqli_query($mysql, $sql);
    return $result;
}
function drop_table($table)
{
    global $mysql;
    $truncate_query = "DROP TABLE  `$table`";
    $truncate = mysqli_query($mysql, $truncate_query);
    if ($truncate) {
        echo 'Table droped. <br/>';
    } else {
        echo 'Table not dropes. <br/>';
        echo 'The query was  <br/>' . $truncate_query;
    }
}
try {
    drop_table('students');
    drop_table('address');
    drop_table('users');
    drop_table('wallets');
    mysqli_query($mysql, $sql) or die("something wrong");
    mysqli_query($mysql, $sql1) or die("something wrong ১");
    mysqli_query($mysql, $sql2) or die("something wrong ২");
    mysqli_query($mysql, $sql3) or die("something wrong ৩");
    echo 'success <br/>';
} catch (\Throwable $th) {
    throw $th->getMessage();
}
