<?php

namespace Sajadsdi\LaravelDynamicRouter;

use Illuminate\Support\Facades\Route;

class DynamicRouter
{
    /**
     * @param array $routes
     * @param string $groupName
     * @return void
     */
    public static function Process(array $routes, string $groupName = 'web'): void
    {
        self::Router($routes, $groupName);
    }

    /**
     * @param array $routes
     * @param string $routeName
     * @param string $controller
     * @param string $uri
     * @param array|string $middleware
     * @return void
     */
    private static function Router(array $routes, string $routeName = '', string $controller = '', string $uri = '', array|string $middleware = []): void
    {
        foreach ($routes as $name => $R) {
            $ctl      = $R['controller'] ?? $controller;
            $url      = $uri . '/' . $R['request_uri'];
            $middle   = array_merge(is_string($middleware) ? [$middleware] : $middleware, $R['middleware'] ?? []);
            $fullName = ($routeName ? $routeName . '.' : '') . $name;

            $route = Route::match($R['request_type'], $url, [$ctl, $R['method']])->name($fullName)->middleware($middle);

            if (isset($R['without_middleware'])) {
                $route->withoutMiddleware($R['without_middleware']);
            }

            if (isset($R['routes']) && is_array($R['routes'])) {
                self::Router($R['routes'], $fullName, $ctl, $url, $middle);
            }
        }
    }

}
