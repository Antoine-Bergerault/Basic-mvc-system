<?php
class Router{
    static $routes = [];
    static $default = false;

    static function get($path, $callback){
        $len = sizeof(self::$routes);
        self::$routes[$len] = [
            'path' => $path,
            'callback' => $callback
        ];
    }

    static function callback_to_func($callback){
        $callback = explode('@', $callback);
        $controller = $callback[0];
        $method = $callback[1];
        require_once 'Controller/'.$controller.'.php';
        $Controller = new $controller;
        $res = $Controller->$method();
        $func = function() use ($res) {
            return $res;
        };
        return $func;
    }

    static function match($url, $path, $id){
        if($url == $path){
            if(is_string(self::$routes[$id]['callback'])){
                self::$routes[$id]['callback'] = self::callback_to_func(self::$routes[$id]['callback']);
            }
            return true;
        }
        return false;
    }

    static function default_path($path){
        self::$default = $path;
    }

}


?>