<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

$app->get('/items', function (Request $request, Response $response) {
    $response = $response->getBody()->write('Items list');
    return $response;
});

$app->get('/items/{id}', function (Request $request, Response $response, $args) {
    $response = $response->getBody()->write('Item ' . $args['id']);
    return $response;
});

$app->post('/items', function (Request $request, Response $response) {
    $response = $response->getBody()->write('Create item');
    return $response;
});

$app->put('/items/{id}', function (Request $request, Response $response, $args) {
    $response = $response->getBody()->write('Update item' . $args['id']);
    return $response;
});

$app->delete('/items/{id}', function (Request $request, Response $response, $args) {
    $response = $response->getBody()->write('Delete item' . $args['id']);
    return $response;
});

$app->run();