<?php

define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/Core/Router.php';

$router = new Router();

// Article routes
$router->get('/articles',          'ArticleController@index');
$router->get('/articles/{id}',     'ArticleController@show');

// Category routes
$router->get('/categories',        'CategoryController@index');
$router->get('/categories/{id}',   'CategoryController@show');

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
