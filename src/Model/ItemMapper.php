<?php

namespace App\Model;

use \PDO;
use App\Model\Mapper;
use App\Model\ItemEntity;

class ItemMapper extends Mapper
{
    public function save(ItemEntity $item)
    {
        $sql = "INSERT INTO items (name, link) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $item->getName(),
            $item->getLink(),
        ]);

        return $this->db->lastInsertId();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
