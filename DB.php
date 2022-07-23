<?php

class DB
{
    public $host;
    public $user;
    public $password;
    public $db;
    public $conn;

    public function __construct()
    {
        $conn= mysqli_connect('localhost', 'anis', 'password', 'php');
        if ($conn->connect_error) {
            echo 'Something went wrong'. $conn->connect_error;
        } else {
            $this->conn=$conn;
        }
    }

    public function insert($table, $col)
    {
        $sql="insert into {$table} set {$col}";
        $this->conn->query($sql);
        if ($this->conn->affected_rows>0) {
            echo 'successfully created';
        }
    }

    public function get($table, $col)
    {
        $sql="select {$col} from {$table}";
        $result=$this->conn->query($sql);
        if ($result->num_rows>0) {
            return $result->fetch_assoc();
        } else {
            echo  "something wrong";
        }
    }

    public function getById($table, $col, $id)
    {
        $sql="select {$col} from {$table} where id='{$id}'";
        $result=$this->conn->query($sql);
        if ($result->num_rows>0) {
            return $result->fetch_assoc();
        } else {
            echo  "Data not found";
        }
    }

    public function update($table, $col, $id)
    {
        $sql="UPDATE $table SET $col WHERE id='{$id}'";
        $this->conn->query($sql);
        if ($this->conn->affected_rows>0) {
            return true;
        }
    }

    public function delete($table, $id)
    {
        $sql="delete from { $table} where id='{$id}'";
        $result=$this->conn->query($sql);
        if ($result) {
            return 'deleted';
        } else {
            echo  "Data not found";
        }
    }
}

// $db=new DB();

// $db->insert('students', "name='anis', age='20'");

// $db->insert('blogs', "title='test title', description='test description',image='/images/blog/1657901928.png', user_id='1'");

// print_r($db->getById('blogs', '*', 14));
