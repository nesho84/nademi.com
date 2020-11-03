<?php

class Router
{
    private static $routes = [];
    private static $params = [];

    public static function add($route, $params = [])
    {
        self::$routes[$route] = $params;
    }

    public static function init($url)
    {
        $url = '/' . rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);

        if (self::match($url)) {

            $controller = self::$params['controller'];

            // from 'User/Home' to Array([0] => [10 => User [1] => Home)
            $controller = explode('/', $controller);
            $controller_folder = $controller[0];
            $controller = $controller[1];

            // Including Controller file
            $controller_file = CONTROLLERS_PATH . '/' . $controller_folder . '/' . $controller . '.php';
            if (file_exists($controller_file)) {
                require $controller_file;
            } else {
                echo 'Controller file $controller_file not found';
                return false;
            }

            // Loading Controller class
            if (class_exists($controller)) {
                // Initialize Controller
                $controller_object = new $controller();
                // Setting Controller method
                $action = self::$params['action'];

                // Calling Controller methods
                // or if (is_callable([$controller_object, $action]))                
                if (method_exists($controller_object, $action)) {
                    // Calling the method and passing the parameter if needed
                    $controller_object->$action(self::$params['id']);
                } else {
                    echo 'Method $action (in controller $controller) not found or is not callable(private)';
                }
            } else {
                echo 'Controller class $controller not found';
            }
        } else {
            // echo 'No Route matches found!';
            require_once VIEWS_PATH . '/User/main/404.php';
        }
    }

    public static function match($url)
    {
        // Get the last parameter 'id' from the url (if its allways the last)
        if (preg_match('/([0-9]+)/', trim($url), $match)) {
            $id = $match[1];
        }

        // Convert any number of the url to {:id} to match the route
        $url = preg_replace('/([0-9]+)/', '{:id}', $url);

        // Check if the route matches
        foreach (self::$routes as $route => $params) {
            if ($url == $route) {
                self::$params = $params;
                self::$params['id'] = $id ?? null;
                return true;
            }
        }

        return false;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getParams()
    {
        return self::$params;
    }
}
