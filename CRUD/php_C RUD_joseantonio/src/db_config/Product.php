<?php

namespace Src\db_config;

require_once 'db_connect.php';

class Product
{
    private $id;
    private $name;
    private $description;
    private $brand;
    private $price;
    private $cost;
    private $weight;
    private $dimensions;
    private $last_updated;

    // Constructor
    public function __construct($id, $name, $description, $brand, $price, $cost, $weight, $dimensions, $last_updated)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->brand = $brand;
        $this->price = $price;
        $this->cost = $cost;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        $this->last_updated = $last_updated;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    public function getLastUpdated()
    {
        return $this->last_updated;
    }
}
