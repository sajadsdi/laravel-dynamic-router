<?php

return [
    'test-route' => [
        'request_uri' => 'dynamic-route-test',
        'request_type' => 'get',
        'middleware' => [],
        'controller' => '\Sajadsdi\LaravelDynamicRouter\Http\Controllers\DynamicRouterTestController',
        'method' => 'testWeb',
    ],
];
