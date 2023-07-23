<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\Controller\ProductController;
use app\Router;


$router = new Router();
initialRouter($router);
$router->resolve();

function initialRouter(Router $router): void
{
    $productController = new ProductController();
    $router->get('/', [$productController, 'index']);
    $router->get('/product', [$productController, 'index']);
    $router->get('/product/create', [$productController, 'create']);
    $router->get('/product/update', [$productController, 'update']);
    $router->post('/product/create', [$productController, 'create']);
    $router->post('/product/update', [$productController, 'update']);
    $router->post('/product/delete', [$productController, 'delete']);
    $router->get('/product/phone', [$productController, 'phone']);
    $router->post('/product/phone', [$productController, 'phone']);
}