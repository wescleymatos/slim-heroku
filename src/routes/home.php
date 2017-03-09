<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/home', function ($request, $response, $args) {
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->view->render($response, 'index.html', [
        'tela' => 'Tela de Login'
    ]);
});

$app->get('/home/{param}', function ($request, $response, $args) {
    $this->logger->info("Slim-Skeleton '/' route");

    return $this->view->render($response, 'index.html', [
        'tela' => $args['param']
    ]);
});
