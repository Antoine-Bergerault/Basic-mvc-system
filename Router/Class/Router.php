<?php

class Router{
    static $routes = [];
    static $default = false;

    static function get($path, $callback){
        $route = new Route($path, $callback);
        self::$routes['GET'][] = $route;
        
    }

    static function post($path, $callback){
        $route = new Route($path, $callback);
        self::$routes['POST'][] = $route;
    }

    static function default_path($path){
        self::$default = $path;
    }

    /**
     * @return bool || function
     */
    static function run($url){
        $method = $_SERVER['REQUEST_METHOD'];
        if(isset(self::$routes[$method])) {

            /*debug(self::$routes[$method]);
            die();*/
            for($i = 0; $i < sizeof(self::$routes[$method]); $i++) {
                $route = self::$routes[$method][$i];
                if($route->match($url)){
                    return $route->callback();
                }
            }
        }
        
        if(self::$default != false){
            return redirect(route(self::$default));
        }else{
            return view('errors/error404');
        }

    }

}


?>