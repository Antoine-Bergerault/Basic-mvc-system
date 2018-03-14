<?php

class Route{

    public $path = '/';
    public $callback;
    public $matches = [];

    /**
     * Route constructor.
     * @param $path string
     * @param $callback function || string
     */
    public function __construct($path, $callback_func){
        $this->path = $path;
        $this->callback = $callback_func;
    }


    private function callback_to_func($callback){
        $callback = explode('@', $callback);
        $controller = $callback[0];
        $method = $callback[1];
        require_once 'Controller/'.$controller.'.php';
        $Controller = new $controller;
        //return array($Controller, $method);
        //return $Controller->$method;
        return array($Controller,$method);//$Controller->$method() will be executed
    }

    public function match($url){
        $path = preg_replace('#{([\w]+)}#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function callback(){
        $callback = $this->callback;
        if(is_string($callback)){
            $callback = $this->callback_to_func($callback);
        }
        return call_user_func_array($callback, $this->matches);
    }


}

?>