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
     * @param array $middleware
     * @return void
     */
    private static function Router(array $routes, string $routeName = '', string $controller = '', string $uri = '', array $middleware = [], array $withoutMiddleware = []): void
    {
        foreach ($routes as $name => $R) {
            $ctl = $R['controller'] ?? $controller;

            $url = $uri . '/' . ($R['request_uri'] ?? str_replace('.', '-', $name));

            $mergedMiddleware = self::mergeMiddleware($middleware, $R['middleware'] ?? null);

            $mergedWithoutMiddleware = self::mergeMiddleware($withoutMiddleware, $R['without_middleware'] ?? null);

            $fullName = ($routeName ? $routeName . '.' : '') . $name;

            if (isset($R['request_type'], $R['method'])) {
                $route = Route::match($R['request_type'], $url, [$ctl, $R['method']])->name($fullName)->middleware($mergedMiddleware);

                $route->withoutMiddleware($mergedWithoutMiddleware);
            }

            if (isset($R['routes']) && is_array($R['routes'])) {
                self::Router($R['routes'], $fullName, $ctl, $url, $mergedMiddleware, $mergedWithoutMiddleware);
            }
        }
    }

    private static function mergeMiddleware(array $parrentMiddleware, string|array|null $routeMiddleware): array
    {
        $childMiddleware = [];
        $middlewares = [];

        if ($routeMiddleware) {
            $childMiddleware = is_array($routeMiddleware) ? $routeMiddleware : [$routeMiddleware];
        }

        $middlewares = array_merge($parrentMiddleware, $childMiddleware);

        return $middlewares;
    }

}
