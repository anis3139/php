<?php
namespace Anis3139\Php\Database;

class Connection
{
    private $host= "localhost";
    private $username= "anis";
    private $password= "password";
    private $db= "php";
    public static $instance=null;
    public $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (mysqli_connect_error()) {
            trigger_error(
                "Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR
            );
        }
    }

    public static function init()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Connection;
        }

        return self::$instance;
    }
}
