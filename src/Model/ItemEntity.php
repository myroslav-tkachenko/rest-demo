<?php

namespace App\Model;

class ItemEntity
{
    private $id;
    private $name;
    private $link;

    public function __construct(array $data)
    {
        if (isset($data['id'])) {
            $this->id = $data['id'];
        }

        $this->name = $data['name'];
        $this->link = $data['link'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLink()
    {
        return $this->link;
    }
}