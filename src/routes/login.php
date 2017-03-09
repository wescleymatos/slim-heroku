<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app->get('/autenticar', function (Request $request, Response $response) {
    return $this->view->render($response, 'autenticar/index.html', [
        'tela' => 'Tela de Login'
    ]);
});

$app->post('/autenticar', function (Request $request, Response $response) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    return $this->view->render($response, 'autenticar/index.html', [
        'tela' => ''
    ]);
});
