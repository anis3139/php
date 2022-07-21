<?php
 require_once('./config.php');
$sql="CREATE TABLE blogs ( 
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description LONGTEXT, 
    image VARCHAR(200),
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
	email VARCHAR(100) NOT NULL UNIQUE,
	phone VARCHAR(50) NOT NULL,
	gender tinyint NOT NULL,
	dob timestamp,
	role ENUM('super-admin','admin', 'editor', 'author', 'user', 'subscriber') DEFAULT 'user',
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
$password=password_hash(123456, PASSWORD_BCRYPT);
$superAdminSeed="INSERT INTO users 
    (`name`, `password`, `email`, `phone`, `dob`, `gender`, `role`) 
    VALUES 
    ('Anis', '{$password}','anis904692@gmail.com','01816366535','2000-07-14', '1' ,'super-admin')";

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
    drop_table('blogs');
    drop_table('address');
    drop_table('users');
    drop_table('wallets');
    mysqli_query($mysql, $sql) or die("something wrong");
    mysqli_query($mysql, $sql1) or die("something wrong ১");
    mysqli_query($mysql, $sql2)or die("something wrong 2");
    mysqli_query($mysql, $sql3) or die("something wrong ৩");
    mysqli_query($mysql, $superAdminSeed) or die("super admin not created");
    echo 'success';
} catch (\Throwable $th) {
    throw $th->getMessage();
}
