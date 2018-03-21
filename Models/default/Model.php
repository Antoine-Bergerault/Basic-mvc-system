<?php

//we need to import the configuration to get the database parameters
require 'config.php';

//this is a class for database request
require 'db.php';

class Model{

    //define the tablename, this is required
    public $table = '';
    private $params = ["SELECT" => "*"];

    public function __construct(){
        $this->params["FROM"] = "`$this->table`";
        return $this;
    }

    public function all(){
        return $this;
    }

    public function select($arg){
        if(is_string($arg)){
            $this->params['SELECT'] = "$arg";
        }else if(is_array($arg)){
            $c = "";
            $x = 0;
            foreach($arg as $a){
                if($x != 0){
                    $c .= ",";
                }
                $x++;
                $c .= $a;
            }
            $this->params["SELECT"] = $c;
        }else{
            echo 'An error has occured';
            return false;
        }
        return $this;
    }

    //return the first occurence
    public function first(){
        return $this->find(1);
    }

    //return a number of occurence
    public function find($n){
        $this->params["LIMIT"] = "$n";
        return $this;
    }

    //a where condition is apply to the query
    public function where($arr){
        $c = "";
        $x = 0;
        foreach($arr as $key => $v){
            if($x != 0){
                $c .= " AND";
            }
            $x++;
            $c .= " $key $v";
        }
        $this->params["WHERE"] = $c;
        return $this;
    }

    public function run(){
        $sql = $this->sql();
        return $this->query($sql);
    }

    private function sql(){
        $str = "";
        foreach($this->params as $key => $val){
            $str .= "$key $val ";
        }
        return $str;
    }

    private function query($sql){
        $db = new DB(Config::$host, Config::$username, Config::$password, Config::$database);
        return $db->query($sql);
    }


}


?>