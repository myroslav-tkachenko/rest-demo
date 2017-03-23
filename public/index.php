<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("../templates");

$app->get('/', function(Request $request, Response $response) {
    $data = ['title' => 'My Application'];
    $response = $this->renderer->render($response, "/index.tpl.php", $data);
    return $response;
});

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