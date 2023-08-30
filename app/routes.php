<?php

require "../vendor/autoload.php";

use League\Plates\Engine;
use DI\ContainerBuilder;
use FastRoute\RouteCollector;
use Aura\SqlQuery\QueryFactory;


$ContainerBuilder = new ContainerBuilder;
$ContainerBuilder->addDefinitions([
    Engine::class => function () {
        return new Engine("../app/Views");
    },
    QueryFactory::class => function(){
        return new QueryFactory('mysql');
    }
]);

$container = $ContainerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/home', ['App\Controllers\HomeController', 'index']);
    $r->addGroup('/blog', function (RouteCollector $r) {
        $r->addRoute('GET', '/index', ['App\Controllers\BlogController', 'index']);
        $r->addRoute('POST', '/store', ['App\Controllers\BlogController', 'store']);
    });
    $r->addGroup('/auth', function (RouteCollector $r) {
        $r->addRoute('GET', '/regForm', ['App\Controllers\Auth\RegController', 'regForm']);
        $r->addRoute('GET', '/logForm', ['App\Controllers\Auth\LogController', 'logForm']);
    });
    // {id} must be a number (\d+)
    // $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
    // // The /{title} suffix is optional
    // $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});
// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $container->call($handler, $vars);
        break;
}
