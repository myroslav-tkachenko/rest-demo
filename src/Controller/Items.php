<?php

namespace App\Controller;

class Items
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function list($request, $response)
    {
        $response = $response->getBody()->write('Items list');
        return $response;
    }

    public function listItem($request, $response, $args)
    {
        $response = $response->getBody()->write('Item ' . $args['id']);
        return $response;
    }

    public function createItem($request, $response) {
        $response = $response->getBody()->write('Create item');
        return $response;
    }

    public function updateItem($request, $response, $args) {
        $response = $response->getBody()->write('Update item' . $args['id']);
        return $response;
    }

    public function deleteItem($request, $response, $args) {
        $response = $response->getBody()->write('Delete item' . $args['id']);
        return $response;
    }
}
