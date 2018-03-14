<?php

class Router{
    static $routes = [];
    static $default = false;

    static function get($path, $callback){
        $route = new Route($path, $callback);
        self::$routes['GET'][] = $route;
        return $route;
    }

    static function post($path, $callback){
        $route = new Route($path, $callback);
        self::$routes['POST'][] = $route;
        return $route;
    }

    static function default_path($path){
        self::$default = $path;
    }

    /**
     * @return string
     */
    static function run($url){
        $method = $_SERVER['REQUEST_METHOD'];
        if(isset(self::$routes[$method])) {

            for($i = 0; $i < sizeof(self::$routes[$method]); $i++) {
                $route = self::$routes[$method][$i];
                if($route->match($url)){
                    return $route->callback();
                }
            }
        }

        if(self::$default != false){
            redirect(route(self::$default, $url));
            return false;
        }else{
            return view('errors/error404');
        }

    }

}


?>