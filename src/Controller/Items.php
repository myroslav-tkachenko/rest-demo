<?php

namespace App\Controller;

use App\Model\ItemEntity;
use App\Model\ItemMapper;

class Items
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function all($request, $response)
    {
        $response = $response->getBody()->write('Items list');
        return $response;
    }

    public function get($request, $response, $args)
    {
        $response = $response->getBody()->write('Item ' . $args['id']);
        return $response;
    }

    public function create($request, $response) {
        $data = $request->getParsedBody();
        $item = new ItemEntity($data);
        $mapper = new ItemMapper();
        $mapper->save($item);
        $response = $response->getBody()->write(print_r($item, 1));
        return $response;
    }

    public function update($request, $response, $args) {
        $data = $request->getParsedBody();
        $response = $response->getBody()->write('Update item' . $args['id'] . "\n" . print_r($data, 1));
        return $response;
    }

    public function delete($request, $response, $args) {
        $response = $response->getBody()->write('Delete item' . $args['id']);
        return $response;
    }
}
