<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


$service = $di->get('Cruds\Application\CustomerService');

$app->get('/clientes[/{id}]', function (Request $request, Response $response) use ($service) {

    $id = $request->getAttribute('id');
    $result = [];

    if (!empty($id)) {
        $result = $service->get($id);
    }

    return $this->view->render($response, 'customer/index.html', [
        'tela' => 'Tela Clientes'
    ]);
});

$app->post('/clientes', function (Request $request, Response $response) use ($service) {

    $data = [
        'name' => filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING),
        'email' => filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL),
        'ddd' => filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT),
        'phone' => filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING),
        'zipCode' => filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT),
        'neighborhood' => filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING),
        'city' => filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING),
        'state' => filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING),
        'publicPlace' => filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING)
    ];

    $id = $service->add($data['name'], $data['email'], (int)$data['ddd'], $data['phone'], (int)$data['zipCode'], $data['neighborhood'], $data['city'], $data['state'], $data['publicPlace']);

    return $response->withRedirect("/clientes/{$id}");
});
