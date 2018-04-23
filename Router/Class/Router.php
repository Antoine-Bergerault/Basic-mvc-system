<?php

class Router{
    static $routes = [];//list of routes
    static $default = false;//default route

    static function get($path, $callback){//add a route with the get method
        $route = new Route($path, $callback);
        self::$routes['GET'][] = $route;
        return $route;
    }

    static function post($path, $callback){//add a route with the post method
        $route = new Route($path, $callback);
        self::$routes['POST'][] = $route;
        return $route;
    }

    static function group($path, $args){//group routes
        foreach($args as $arg){
            $arg->move($path);
        }
        return true;
    }

    static function default_path($path){//add the default path
        self::$default = $path;
    }

    /**
     * @return string
     */
    static function run($url){//check if a route correspond with the url
        $method = $_SERVER['REQUEST_METHOD'];
        if(isset(self::$routes[$method])) {
            for($i = 0; $i < sizeof(self::$routes[$method]); $i++) {
                $route = self::$routes[$method][$i];
                if($route->match($url) == true){
                    return $route->callback();
                }
            }
        }

        if(self::$default != false){//if there is a default and no matches
            redirect(route(self::$default, $url));//redirect to the default path
            return false;
        }else{
            return view('errors/error404');
        }

    }

}


?>