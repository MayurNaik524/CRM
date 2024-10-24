<?php

use ChurchCRM\dto\SystemConfig;
use ChurchCRM\Slim\Middleware\VersionMiddleware;
use Slim\Factory\AppFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;

require_once '../Include/Config.php';
//require_once '../Include/Functions.php';

// This file is generated by Composer
require_once __DIR__ . '/../vendor/autoload.php';

$rootPath = str_replace('/external/index.php', '', $_SERVER['SCRIPT_NAME']);
$container = new ContainerBuilder();
$container->compile();
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->setBasePath($rootPath . '/external');

$app->add(VersionMiddleware::class);
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$container = $app->getContainer();

// Set up
require __DIR__ . '/../Include/slim/error-handler.php';

// routes
require __DIR__ . '/routes/register.php';
require __DIR__ . '/routes/verify.php';
require __DIR__ . '/routes/calendar.php';

// Run app
$app->run();
