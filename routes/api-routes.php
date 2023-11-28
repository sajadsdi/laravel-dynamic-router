<?php
use Sajadsdi\LaravelDynamicRouter\DynamicRouter;

$laraRoutes = config('routes-api');
DynamicRouter::Process($laraRoutes);
