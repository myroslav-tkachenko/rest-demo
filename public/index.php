<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("../templates");
// $container['settings'] = ['displayErrorDetails' => true];

$app->get('/', 'App\Controller\Front:home');

$app->group('/items', function () {
    $this->get('', 'App\Controller\Items:all');
    $this->get('/{id}', 'App\Controller\Items:get');
    $this->post('', 'App\Controller\Items:create');
    $this->put('/{id}', 'App\Controller\Items:update');
    $this->delete('/{id}', 'App\Controller\Items:delete');
});
// ->add(function ($request, $response, $next) {
//     if ($request->getHeader('HTTP_AUTHORIZATION')[0] == 'token_123') {
//         $response = $next($request, $response);
//     } else {
//         $response = $response->withStatus(403);
//     }
//     return $response;
// });

$app->run();
