<?php

define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/vendor/autoload.php';
require_once BASE_PATH . '/Core/Database.php';
require_once BASE_PATH . '/Core/Model.php';
require_once BASE_PATH . '/Core/Controller.php';
require_once BASE_PATH . '/Core/Router.php';


spl_autoload_register(function (string $class): void {
    $dirs = ['Models', 'Controllers', 'Core'];
    foreach ($dirs as $dir) {
        $file = BASE_PATH . '/' . $dir . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$router = new Router();

$router->get('/','HomeController@index');
$router->get('/categories','CategoryController@index');
$router->get('/categories/{category}','CategoryController@show');
// Article routes
$router->get('/articles',          'ArticleController@index');
$router->get('/articles/{id}',     'ArticleController@show');

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
