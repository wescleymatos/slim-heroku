<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

//session_start();

// Instantiate the enviroment
$dotenv = new \Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();

// Instantiate the container inversion of control
$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions(__DIR__.'/../src/phpdi.php');
$di = $containerBuilder->build();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
//$app = new \Slim\App($settings);
$c = new \Slim\Container($settings);
$app = new \Slim\App($c);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
