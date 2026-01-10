<?php

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$this->normalize($uri)] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$this->normalize($uri)] = $action;
    }

    private function normalize($uri)
    {
        return '/' . trim($uri, '/');
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = $this->normalize($uri);

        // ✅ FIX PALING PENTING:
        // kalau buka root domain → arahkan ke /login
        if ($uri === '/') {
            header('Location: /login');
            exit;
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Route tidak ditemukan: $uri";
            return;
        }

        $action = $this->routes[$method][$uri];

        // kalau pakai closure
        if ($action instanceof Closure) {
            call_user_func($action);
            return;
        }

        // format Controller@method
        if (is_string($action)) {
            [$controller, $methodAction] = explode('@', $action);

            $controllerFile = __DIR__ . '/../Controllers/' . $controller . '.php';

            if (!file_exists($controllerFile)) {
                throw new Exception("Controller $controller tidak ditemukan");
            }

            require_once $controllerFile;

            $obj = new $controller();

            if (!method_exists($obj, $methodAction)) {
                throw new Exception("Method $methodAction tidak ada di $controller");
            }

            call_user_func([$obj, $methodAction]);
            return;
        }

        throw new Exception("Route handler tidak valid");
    }
}
