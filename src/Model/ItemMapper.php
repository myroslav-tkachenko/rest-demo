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
        if ($item->getId()) {
            $sql = "UPDATE items SET name = ?, link = ? WHERE id = {$item->getId()}";
        }
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $item->getName(),
            $item->getLink(),
        ]);

        return $this->db->lastInsertId();
    }

    public function all()
    {
        $sql = "SELECT * FROM items";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        
        return $stmt->rowCount();
    }
}
