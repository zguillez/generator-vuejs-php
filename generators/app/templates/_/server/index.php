<?php

use DI\Container;
use Middlewares\TrailingSlash;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/services/Controller.php';
require __DIR__.'/services/PagesController.php';
require __DIR__.'/services/ApiController.php';
//-----------------------------------------
$container = new Container();
AppFactory::setContainer($container);
$container->set('view', function () {
  return Twig::create(__DIR__.'/templates', ['cache' => false]);
});
$container->set('config', function () {
  return parse_ini_file(__DIR__.'/config.ini');
});
$container->set('database', function ($container) {
  $config = $container->get('config')['database'];

  return new Z\Database(
    $config['servername'],
    $config['username'],
    $config['password'],
    $config['dbname']
  );
});
//-----------------------------------------
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->add(new TrailingSlash(true));
$app->addErrorMiddleware(true, true, true);
//-----------------------------------------
$app->get('/', services\PagesController::class);
$app->get('/page1/', services\PagesController::class);
$app->group('/api', function ($group) {
  $group->get('/', services\ApiController::class);
  $group->get('/{token}/', services\ApiController::class.':get_token');
  $group->post('/{token}/', services\ApiController::class.':post_token');
});
//-----------------------------------------
$app->run();
