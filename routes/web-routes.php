<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$laraRoutes = config('web-routes');
DynamicRouter::Process($laraRoutes);
