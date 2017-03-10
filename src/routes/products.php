<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$service = $di->get('SaleProducts\Application\ProductService');

$app->get('/products', function (Request $request, Response $response) use ($service) {
    try {
        $result = $service->add('Hello products');
        $response->getBody()->write($result);
        return $response;
    } catch (Throwable $e) {
        echo $e->getMessage();
    }
});
