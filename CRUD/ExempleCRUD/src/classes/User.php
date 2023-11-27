<?php

namespace Src\Classes;

require_once 'Database.php';

use Src\Classes\Database;

class User
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function createTable()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL
        )";

        if ($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getAll()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "SELECT * FROM users";
        $result = $connection->query($sql);

        $users = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User($row["id"], $row["name"]);
                array_push($users, $user);
            }
        }

        return $users;
    }

    public function save()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "INSERT INTO users (name) VALUES ('$this->name')";

        if ($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "UPDATE users SET name = '$this->name' WHERE id = $this->id";

        if ($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "DELETE FROM users WHERE id = $this->id";

        if ($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
