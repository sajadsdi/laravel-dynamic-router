<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$laraRoutes = config('routes-web');
DynamicRouter::Process($laraRoutes);
