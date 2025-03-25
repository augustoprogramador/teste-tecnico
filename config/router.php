<?php

class Router {
    private array $routes = [];

    public function add(string $path, Closure $handler) {
        $this->routes[$path] = $handler;
    }

    public function dispatch(string $path) {
        foreach ($this->routes as $route => $handler) {
            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route);

            if (preg_match("#^$pattern$#", $path, $matches)) {
                array_shift($matches);
                call_user_func_array($handler, $matches);
                return;
            }
        }

        echo "Page not found";
    }
}