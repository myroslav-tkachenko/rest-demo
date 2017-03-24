<?php

namespace App\Controller;

class Front
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function home($request, $response)
    {
        $data = ['title' => 'My Application'];
        $response = $this->container->renderer->render($response, "/index.tpl.php", $data);
        return $response;
    }
}
