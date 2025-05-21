<?php
class Router
{
    private $routes = [];
    public function addRoute($uri, $controllerAction)
    {
        $this->routes[$uri] = $controllerAction;
    }

    public function dispatch($uri) {
        // Remove query string and trailing slash
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        if ($uri === '') $uri = '/';

        if (array_key_exists($uri, $this->routes)) {
            $controllerAction = explode('@', $this->routes[$uri]);
            $controllerName = $controllerAction[0];
            $methodName = $controllerAction[1];

            require_once dirname(__DIR__, 1) . '/controllers/' . $controllerName . '.php';
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            echo "404 - Page not found!";
        }
    }
}

?>