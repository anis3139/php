<?php
namespace Anis3139\Php\Database;

class Connection
{
    public static $instance=null;
    public $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_DATABASE']);
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
