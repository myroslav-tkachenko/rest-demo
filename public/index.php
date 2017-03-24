<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("../templates");

$app->get('/', 'App\Controller\Items:home');
$app->get('/items', 'App\Controller\Items:list');
$app->get('/items/{id}', 'App\Controller\Items:listItem');
$app->post('/items', 'App\Controller\Items:createItem');
$app->put('/items/{id}', 'App\Controller\Items:updateItem');
$app->delete('/items/{id}', 'App\Controller\Item:deleteItem');

$app->run();