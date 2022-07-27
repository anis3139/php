<?php
namespace Anis3139\Php\Database;

class DB
{
    public $conn;
    public static $sql;
    public static $instance=null;
    public function __construct()
    {
        define("HOST", "localhost");
        define("USER", "anis");
        define("PASSWORD", "password");
        define("DB", "php");
        $this->conn = mysqli_connect(HOST, USER, PASSWORD, DB);
        if (mysqli_connect_error()) {
            trigger_error(
                "Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR
            );
        }
    }

    /**
     * sengelton design pattern
     *
     * @return void
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new DB;
        }
        return self::$instance;
    }

    /**
     * Query the database
     *
     * @param [type] $table
     * @param array $condition
     * @param array $field
     * @return void
     */
    public function select($table, $condition=array(), $field = array())
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

        self::$sql = "select {$fieldstr} from {$table} {$where}";
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
    /**
     * insert data
     *
     * @param [type] $table
     * @param [type] $data
     * @return void
     */
    public function insert($table, $data)
    {
        $keys = '';
        $values = '';

        foreach ($data as $k=>$v) {
            $keys.=$k.',';
            $values.="'$v'".',';
        }

        $keys = rtrim($keys, ',');
        $values  = rtrim($values, ',');
          
        self::$sql = "INSERT INTO {$table} ({$keys}) VALUES ({$values})";
       
        if (mysqli_query($this->conn, self::$sql)) {
            $id= mysqli_insert_id($this->conn);
            $result=$this->select('blogs', array('id'=>$id));
            return $result[0];
        } else {
            return false;
        };
    }
    /**
    * Modify a record
    */
    public function update($table, $data, $condition=array())
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
        self::$sql = "update {$table} {$updatastr} {$where}";
        return mysqli_query($this->conn, self::$sql);
    }
    /**
     * Delete records
     */
    public function delete($table, $condition)
    {
        $where='';
        if (!empty($condition)) {
            foreach ($condition as $k=>$v) {
                $where.=$k."='".$v."' and ";
            }
            $where='where '.$where .'1=1';
        }
        self::$sql = "delete from {$table} {$where}";
        return mysqli_query($this->conn, self::$sql);
    }
    public static function getLastSql()
    {
        echo self::$sql;
    }
}
