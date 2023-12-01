<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$routes = config('routes-api');
DynamicRouter::Process($routes);
