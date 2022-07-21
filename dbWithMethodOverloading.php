<?php
class Db
{
    private $conn;
    private $table;
    public function __construct($host, $user, $pass, $db)
    {
        $this->conn=new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_errno) {
            die("Connection Fail for: ".$this->conn->connect_error);
        }
    }


    
    public function table($value)
    {
        $this->table=$value;
        return $this;
    }

    public function __call($method, $params)
    {
        extract($params[0]);
        switch ($method) {
            case "read":
                if (isset($where)) {
                    $sql="SELECT $cols FROM $this->table WHERE $where";
                    $result=$this->conn->query($sql);
                    if ($result->num_rows>0) {
                        return $result->fetch_assoc();
                    }
                } else {
                    $sql="SELECT $cols FROM $this->table";
                    $result=$this->conn->query($sql);
                    if ($result->num_rows>0) {
                        return $result->fetch_all(MYSQLI_ASSOC);
                    }
                }
                break;
            case "insert":
                $sql="INSERT INTO $this->table SET $cols";
                $result=$this->conn->query($sql);
                if ($this->conn->affected_rows>0) {
                    return true;
                }
                break;
            case "update":
                $sql="UPDATE $this->table SET $cols WHERE $where";
                $result=$this->conn->query($sql);
                if ($this->conn->affected_rows>0) {
                    return true;
                }
                break;
            case "delete":
                $sql="DELETE FROM $this->table WHERE $where";
                $result=$this->conn->query($sql);
                if ($this->conn->affected_rows>0) {
                    return true;
                }
                break;
            default:
                return false;
                break;
        }
    }
}

$connect=new Db("localhost", "anis", "password", "php");
echo "<pre>";

// print_r($connect->readAll(array("table"=>"users","cols"=>"*", "action"=>"read")));

// print_r($connect->getById(array("table"=>"users","cols"=>"name,mobile","where"=>"id=4","action"=>"read")));

// echo $connect->Add(array("table"=>"users","cols"=>"name='Anis', email='anis90467922@gmail.com', password='anis9046922@gmail.com',phone='01816366535',gender='1'","action"=>"insert"))?"Insert Success":"Insert Fail";

// print_r($connect->update(array("table"=>"users","cols"=>"email='anis90sas4692@gmail.com'","action"=>"update", "where"=>"id=9"))?"Insert Success":"Insert Fail");

// echo $connect->removeData(array("table"=>"users","action"=>"delete","where"=>"id=9"))?"Delete Success":"Delete Fail";


print_r($connect->table('users')->read(["cols"=>"*"]));

echo "</pre>";
