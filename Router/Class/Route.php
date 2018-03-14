<?php

class Route{

    public $path = '/';
    public $callback;
    public $matches = [];
    public $params = [];

    /**
     * Route constructor.
     * @param $path string
     * @param $callback function || string
     */
    public function __construct($path, $callback_func){
        $this->path = $path;
        $this->callback = $callback_func;
    }

    public function with($param, $regex){
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
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
        $path = preg_replace_callback('#{([\w]+)}#', [$this, 'checkParams'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function checkParams($match){

        if(isset($this->params[$match[1]])){
            return '('.$this->params[$match[1]].')';
        }

        return '([^/]+)';
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