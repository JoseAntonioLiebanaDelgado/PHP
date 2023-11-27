<?php

namespace Src\db_config;

require_once 'db_connect.php';

class Store
{
    private $id;
    private $city;
    private $address;
    private $phone;
    private $email;
    private $opening_time;
    private $closing_time;

    // Constructor para inicializar la instancia de la clase
    public function __construct($id, $city, $address, $phone, $email, $opening_time, $closing_time)
    {
        $this->id = $id;
        $this->city = $city;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->opening_time = $opening_time;
        $this->closing_time = $closing_time;
    }

    // Métodos getters para acceder a los atributos privados

    public function getId()
    {
        return $this->id;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getOpeningTime()
    {
        return $this->opening_time;
    }

    public function getClosingTime()
    {
        return $this->closing_time;
    }

    public static function createTable()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "CREATE TABLE `Stores` (
            `id` int(11) NOT NULL,
            `city` int(11) NOT NULL,
            `address` varchar(80) NOT NULL,
            `phone` int(9) NOT NULL,
            `email` varchar(80) NOT NULL,
            `opening_time` time NOT NULL,
            `closing_time` time(11) NOT NULL,
            `last_updated` datetime NOT NULL,
            PRIMARY KEY (id),
            FOREIGN KEY (city) REFERENCES Cities(id)
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

        $sql = "SELECT * FROM Stores";
        $result = $connection->query($sql);

        $stores = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $store = new Store($row["id"], $row["city"]);
                array_push($stores, $store);
            }
        }

        return $stores;
    }

    public function save()
    {
        $database = Database::getInstance();
        $connection = $database->getConnection();

        $sql = "INSERT INTO Stores (city) VALUES ('$this->city')";

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

        $sql = "UPDATE Stores SET name = '$this->name' WHERE id = $this->id";

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

        $sql = "DELETE FROM Stores WHERE id = $this->id";

        if ($connection->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
