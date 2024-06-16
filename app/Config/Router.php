<?php

namespace App\Config;

class Router
{
    private static array $routers = [];
    private static array $errorHandlers = [];
    private static $notFoundHandler;
    private static array $routeGroups = [];

    public static function add(
        $method,
        string $path,
        array $handler,
        array $middleware = [],
        string $group = ''
    ) {
        if (!empty($group)) {
            self::$routeGroups[$group][] = compact('method', 'path', 'handler', 'middleware');
        } else {
            $methods = is_array($method) ? $method : [$method];
            foreach ($methods as $method) {
                self::$routers[] = compact('method', 'path', 'handler', 'middleware');
            }
        }
    }

    public static function group(array $attributes, callable $callback)
    {
        $prefix = isset($attributes['prefix']) ? trim($attributes['prefix'], '/') : '';
        $middleware = isset($attributes['middleware']) ? $attributes['middleware'] : [];

        self::$routeGroups[] = compact('prefix', 'middleware');

        call_user_func($callback);

        array_pop(self::$routeGroups);
    }

    public static function onError(int $errorCode, callable $handler)
    {
        self::$errorHandlers[$errorCode] = $handler;
    }

    public static function setNotFoundHandler(callable $handler)
    {
        self::$notFoundHandler = $handler;
    }

    public static function run()
    {
        $path = '/';
        if (isset($_SERVER['PATH_INFO'])) {
            $path = $_SERVER['PATH_INFO'];
        }

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routers as $router) {
            self::processRoute($router, $path, $method);
        }

        foreach (self::$routeGroups as $group) {
            foreach ($group as $router) {
                self::processRoute($router, $path, $method, $group['prefix'], $group['middleware']);
            }
        }

        self::handleError(404);
    }

    private static function processRoute($router, $path, $method, $prefix = '', $middleware = [])
    {
        $pattern = "#^" . preg_replace('#\{([a-zA-Z0-9_]+)\}#', '([a-zA-Z0-9_]+)', $prefix . $router['path']) . "$#";
        if (preg_match($pattern, $path, $matches) && in_array($method, (array)$router['method'])) {
            array_shift($matches);

            foreach ($middleware as $m) {
                $instance = new $m();
                $instance->handle();
            }

            $handler = $router['handler'];
            $controller = new $handler[0]();
            $function = $handler[1];

            call_user_func_array([$controller, $function], $matches);

            exit();
        }
    }

    private static function handleError(int $errorCode)
    {
        http_response_code($errorCode);

        if (isset(self::$errorHandlers[$errorCode])) {
            call_user_func(self::$errorHandlers[$errorCode]);
        } elseif ($errorCode === 404 && self::$notFoundHandler) {
            call_user_func(self::$notFoundHandler);
        } else {
            echo $errorCode . ' Error';
        }
    }
}
