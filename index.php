<?php

define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/Core/Router.php';

$router = new Router();

$router->get('/','HomeController@index');
// Article routes
$router->get('/articles',          'ArticleController@index');
$router->get('/articles/{id}',     'ArticleController@show');


$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
