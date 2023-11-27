<?php

namespace bd;

class Database
{
    private $_connection;
    private static $_instance;
    private $_host = "db";
    private $_username = "root";
    private $_password = "rootpassword";
    private $_database = "mydatabase";

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->_connection = new \mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        if ($this->_connection->connect_errno) {
            trigger_error("Failed to connect to MySQL: " . $this->_connection->connect_error, E_USER_ERROR);
        }
    }

    private function __clone()
    {
    }

    public function getConnection()
    {
        return $this->_connection;
    }
}
