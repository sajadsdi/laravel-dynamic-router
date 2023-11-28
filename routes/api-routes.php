<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$laraRoutes = config('api-routes');
DynamicRouter::Process($laraRoutes);
