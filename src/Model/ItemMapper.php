<?php

namespace App\Model;

use App\Model\Mapper;
use App\Model\ItemEntity;

class ItemMapper extends Mapper
{
    public function save($item)
    {
        $sql = "INSERT INTO items (name, link) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            $item->getName(),
            $item->getLink(),
        ]);
    }
}
