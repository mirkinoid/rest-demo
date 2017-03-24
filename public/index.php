<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

require '../vendor/autoload.php';

$app = new \Slim\App;
$container = $app->getContainer();
$container['renderer'] = new PhpRenderer("../templates");

$app->get('/', 'App\Controller\Front:home');

$app->group('/items', function() {
    $this->get('', 'App\Controller\Items:list');
    $this->get('/{id}', 'App\Controller\Items:listItem');
    $this->post('', 'App\Controller\Items:createItem');
    $this->put('/{id}', 'App\Controller\Items:updateItem');
    $this->delete('/{id}', 'App\Controller\Items:deleteItem');
});

$app->run();
