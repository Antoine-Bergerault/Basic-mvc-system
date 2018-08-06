<?php

class Route{

    public $path = null;//path to access this route
    public $callback;//function used as callback
    public $matches = [];//advanced matches rules
    public $params = [];
    public $cond = false;

    /**
     * Route constructor.
     * @param $path string
     * @param $callback function || string
     */
    public function __construct($path, $callback_func){//set the callback and path
        $this->path = $path;
        $this->callback = $callback_func;
        return $this;
    }

    public function only_if($a,$callback = false){//add a condition to enable this route
        $this->cond = true;
        if($a !== true){
            if($callback == false){
                $this->path = false;
            }else{
                $this->callback = $callback;
            }
        }
        return $this;
    }

    public function with($param, $regex){//used for advanced regex for url parameters
        $this->params[$param] = str_replace('(', '(?:', $regex);
        return $this;
    }

    public function move($beg){//add at the beginning of the path. (used for grouping)
        if($this->path != false){
            $this->path = $beg.$this->path;
        }
        return $this;
    }

    private function callback_to_func($callback){//if callback is a Controller method, translate it
        $callback = explode('@', $callback);
        $controller = $callback[0];
        $method = $callback[1];
        require_once 'Controllers/'.$controller.'.php';
        $Controller = new $controller;
        //return array($Controller, $method);
        //return $Controller->$method;
        return array($Controller,$method);//$Controller->$method() will be executed
    }

    public function match($url){//verify if matching
        if($this->path == false){
            return false;
        }
        $url = rtrim($url,'/').'/';
        $this->path = rtrim($this->path,'/').'/';
        $path = preg_replace_callback('#{([\w]+)}#', [$this, 'checkParams'], $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    private function checkParams($match){//check if the parameters are good

        if(isset($this->params[$match[1]])){
            return '('.$this->params[$match[1]].')';
        }

        return '([^/]+)';
    }

    public function callback(){//return the callback function
        $callback = $this->callback;
        if(is_string($callback)){
            $callback = $this->callback_to_func($callback);
        }
        return call_user_func_array($callback, $this->matches);
    }


}

?>