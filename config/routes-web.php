<?php

return [
    'parent-route' => [
        'request_uri' => 'parent-test-url',
        'request_type' => 'get',
        'middleware' => [],
        'controller' => '\Sajadsdi\LaravelDynamicRouter\Http\Controllers\DynamicRouterTestController',
        'method' => 'testWeb',
        'routes' => [
            'child1' => [
                'request_uri' => 'child1-test-url',
                'request_type' => 'get',
                'method' => 'testChildWeb',
            ],
            'child2' => [
                'request_uri' => 'child2-test-url',
                'request_type' => 'get',
                'controller' => '\Sajadsdi\LaravelDynamicRouter\Http\Controllers\DynamicRouterOtherTestController',
                'method' => 'testChildWeb',
            ]
        ]
    ],
];
