<?php

use ChurchCRM\dto\SystemConfig;
use Slim\Factory\AppFactory;

require '../Include/Config.php';
//require '../Include/Functions.php';

// This file is generated by Composer
require_once __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$container = $app->getContainer();

// Set up
require __DIR__ . '/../Include/slim/error-handler.php';

// routes
require __DIR__ . '/routes/register.php';
require __DIR__ . '/routes/verify.php';
require __DIR__ . '/routes/calendar.php';

if (SystemConfig::debugEnabled()) {
    $app->addErrorMiddleware(true, true, true);
}

// Run app
$app->run();
