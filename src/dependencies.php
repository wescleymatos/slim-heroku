<?php
// DIC configuration

$container = $app->getContainer();

//twig view
$container['view'] = function ($c) {
    $folder = $c->get('settings')['renderer'];
    $view = new \Slim\Views\Twig($folder['template_path'], [
        'debug' => (bool)getenv("APP_DEBUG"),
        'cache' => false
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(
        new Slim\Views\TwigExtension(
            $c['router'],
            $basePath
        )
    );

    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
