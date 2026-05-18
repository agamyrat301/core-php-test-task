<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $handler): void
    {
        $this->register('GET', $path, $handler);
    }

    public function post(string $path, string $handler): void
    {
        $this->register('POST', $path, $handler);
    }

    private function register(string $method, string $path, string $handler): void
    {
        $this->routes[] = [
            'method'  => $method,
            'pattern' => $this->toRegex($path),
            'handler' => $handler,
        ];
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            if (preg_match($route['pattern'], $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $this->call($route['handler'], $params);
                return;
            }
        }

        $this->abort(404);
    }

    private function call(string $handler, array $params): void
    {
        [$controllerName, $action] = explode('@', $handler);

        $file = BASE_PATH . '/Controllers/' . $controllerName . '.php';

        if (!file_exists($file)) {
            $this->abort(404);
            return;
        }

        require_once $file;
        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            $this->abort(404);
            return;
        }

        $controller->$action(...array_values($params));
    }

    private function toRegex(string $path): string
    {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private function abort(int $code): void
    {
        http_response_code($code);
        echo "<h1>{$code} Not Found</h1>";
    }
}
