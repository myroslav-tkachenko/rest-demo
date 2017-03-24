<?php

namespace App\Model;

use \PDO;

abstract class Mapper
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO("mysql:host=localhost;dbname=rest_items;charset=utf8", "root", "123");
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
