<?php
class Router
{
    private $routes = [];
    public function addRoute($uri, $controllerAction)
    {
        $this->routes[$uri] = $controllerAction;
    }

    public function dispatch($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            $controllerAction = explode('@', $this->routes[$uri]);
            $controllerName = $controllerAction[0];
            $methodName = $controllerAction[1];

            require_once dirname(__DIR__, 1) . '/controllers/' . $controllerName . '.php';
            // require_once __DIR__ . '/../controllers/' . $controllerName . '.php';
            $controller = new $controllerName();
            $controller->$methodName();
        } else {
            echo "404 - Page not found!";
        }
    }
}

?>