<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$routes = config('routes-web');
DynamicRouter::Process($routes);
