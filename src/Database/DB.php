<?php

namespace AnisAronno\Php\Database;

use AnisAronno\Php\Database\Connection;

class DB
{
    public $conn;
    public static $sql;
    public static $table;

    public function __construct()
    {
        $connection=new Connection();
        $connectinClass=$connection::init();
        $this->conn=$connectinClass->connection;
    }


    public static function table($table)
    {
        self::$table = $table;
        return new self();
    }


    public function get($condition=array(), $field = array())
    {
        $where='';
        if (!empty($condition)) {
            foreach ($condition as $k=>$v) {
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }

        $fieldstr = '';

        if (!empty($field)) {
            foreach ($field as $k=>$v) {
                $fieldstr.= $v.',';
            }
            $fieldstr = rtrim($fieldstr, ',');
        } else {
            $fieldstr = '*';
        }

        self::$sql = "select {$fieldstr} from ". self::$table ." {$where}";
        $result=mysqli_query($this->conn, self::$sql);

        $resuleRow = array();

        $i = 0;
        while ($row=mysqli_fetch_assoc($result)) {
            foreach ($row as $k=>$v) {
                $resuleRow[$i][$k] = $v;
            }
            $i++;
        }
        return $resuleRow;
    }


    public function find($condition, $field = array())
    {
        $where='';
        if (is_array($condition)) {
            foreach ($condition as $k=>$v) {
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        } else {
            $where="where id='{$condition}'";
        }

        $fieldstr = '';

        if (!empty($field)) {
            foreach ($field as $k=>$v) {
                $fieldstr.= $v.',';
            }
            $fieldstr = rtrim($fieldstr, ',');
        } else {
            $fieldstr = '*';
        }

        self::$sql = "select {$fieldstr} from ". self::$table ." {$where} LIMIT 1";
        $result=mysqli_query($this->conn, self::$sql);

        $resuleRow = array();

        $i = 0;
        while ($row=mysqli_fetch_assoc($result)) {
            foreach ($row as $k=>$v) {
                $resuleRow[$i][$k] = $v;
            }
            $i++;
        }
        return $resuleRow ? $resuleRow[0] : false;
    }


    public function insert($data)
    {
        $keys = '';
        $values = '';

        foreach ($data as $k=>$v) {
            $keys.=$k.',';
            $values.="'$v'".',';
        }

        $keys = rtrim($keys, ',');
        $values  = rtrim($values, ',');

        self::$sql = "INSERT INTO ". self::$table ." ({$keys}) VALUES ({$values})";

        if (mysqli_query($this->conn, self::$sql)) {
            $id= mysqli_insert_id($this->conn);
            $result=$this->get(array('id'=>$id));
            return $result[0];
        } else {
            return 'Something went wrong!';
        };
    }

    public function update($data, $condition=array())
    {
        $where='';

        if (!empty($condition)) {
            foreach ($condition as $k=>$v) {
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }

        $updatastr = '';

        if (!empty($data)) {
            foreach ($data as $k=>$v) {
                $updatastr.= $k."='".$v."',";
            }
            $updatastr = 'set '.rtrim($updatastr, ',');
        }
        self::$sql = "update ". self::$table ." {$updatastr} {$where}";

        if (mysqli_query($this->conn, self::$sql)) {
            $result=$this->get($condition);
            return $result[0];
        } else {
            return 'Something went wrong!';
        }
    }


    public function delete($condition)
    {
        $where='';

        if (!empty($condition)) {
            foreach ($condition as $k=>$v) {
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }

        self::$sql = "delete from ". self::$table ." {$where}";

        return mysqli_query($this->conn, self::$sql);
    }
}
