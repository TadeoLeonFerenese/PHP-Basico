<?php

namespace Core;
use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router {
    protected $routes = [];

    public function add($uri, $controller, $method) 
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
    ];
        return $this;
}
    public function get($uri, $controller) {
        $this->add($uri, $controller, 'GET');
        return $this;
}
    public function post($uri, $controller) {
        $this->add($uri, $controller, 'POST');
        return $this;
}
    public function delete($uri, $controller) {
        $this->add($uri, $controller, 'DELETE');
        return $this;
}
    public function patch($uri, $controller) {
        $this->add($uri, $controller, 'PATCH');
        return $this;
}
    public function put($uri, $controller) {      
        $this->add($uri, $controller, 'PUT');
        return $this;
}
    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
}
    public function route($uri, $method) {   
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                Middleware::resolve($route['middleware']);
            
                return require base_path('Http/controllers/' . $route['controller']);
            }
        }
        $this->abort();
    }

    public function previousUrl() {
        return redirect ($_SERVER['HTTP_REFERER']);
    }

    protected function abort($code = 404) {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
}
}