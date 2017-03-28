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
        $mapper = new ItemMapper();
        $items = $mapper->all();
        $response = $response->withJson($items);
        return $response;
    }

    public function get($request, $response, $args)
    {
        $mapper = new ItemMapper();
        $item = $mapper->get($args['id']);
        // $response = $response->withHeader('Content-type', 'application/json');
        $response = $response->withJson($item);
        return $response;
    }

    public function create($request, $response)
    {
        $data = $request->getParsedBody();
        $item = new ItemEntity($data);
        $mapper = new ItemMapper();
        $item_id = $mapper->save($item);
        // $response = $response->withRedirect('/items/' . $item_id);
        return $response->withStatus(201);
    }

    public function update($request, $response, $args)
    {
        $data = $request->getParsedBody();
        $mapper = new ItemMapper();
        $data['id'] = $args['id'];
        $item = new ItemEntity($data);
        $item_id = $mapper->save($item);
        // $response = $response->withRedirect('/items/' . $item_id);
        return $response;
    }

    public function delete($request, $response, $args)
    {
        $mapper = new ItemMapper();
        $result = $mapper->delete($args['id']);

        if ($result) {
            $response = $response->withStatus(204);
        }
        
        return $response;
    }
}
