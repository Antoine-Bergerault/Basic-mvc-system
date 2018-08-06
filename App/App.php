<?php

class App{

    static $user = false;//variable to store the user
    static $url = null;//variable to store the url
    static $extras = [];//extras

    static function load(){//equivalent of __construct

        self::session();//create a session if doesn't exist
        if(isset($_SESSION) && isset($_SESSION['user'])){
            $usr = $_SESSION['user'];//set the variable with the session content
            self::connect($usr);//connect to the user
        }
        self::seturl();//initialize the $url
        self::load_extra();

    }

    static function load_extra(){
        
        require_once('Extras.php');
        $Extras = new Extras();

        if(self::isset_session('flash')){
            echo $Extras->flashes(self::get('flash'));
            self::destroy('flash');
        }
    }

    static function extra(){
        require_once('Extras.php');
        $Extras = new Extras();
        if(self::isset_session('debug')){
            echo $Extras->debug(self::get('debug'));
        }
    }

    static function session(){//start a session if it is not already done

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        return $_SESSION;

    }

    static function clear_session(){
        $_SESSION = [];
    }

    static function connect($usr){//connect the app to the user passed in parameter as $usr

        self::$user = $usr;
        self::session();
        $_SESSION['user'] = self::$user;//store the user in session

    }

    static function is_connected(){//return true if the user exist, else false

        if(self::$user != false){

            return true;

        }

        return false;

    }

    static function getname(){//return the name of the user and false if we are not connected

        if(self::is_connected()){

            $usr = self::$user;
            return $usr->name;

        }

        return false;

    }

    static function getid(){//return the id of the user and false if we are not connected

        if(self::is_connected()){

            $usr = self::$user;
            return $usr->id;

        }

        return false;

    }

    static function back(){//a shortcut to go to the prevent page

        echo '<script>history.back()</script>';

    }

    static function logout(){//logout the current user if we are connected

        self::$user = false;
        if(isset($_SESSION) && isset($_SESSION['user'])){
            $_SESSION['user'] = false;
        }
        self::clear_session();

    }

    static function seturl($nurl = null){//set the url

        if($nurl != null){
            self::$url = $nurl;
        }else{
            self::$url = (isset($_SERVER['HTTPS']) ? "https://" : "http://"). "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        }

    }

    static function is_role($role_name){
        if(self::is_connected()){
            if(isset(self::$user->group_name) && self::$user->group_name === $role_name){
                return true;
            }
            return false;
        }
        return false;
    }

    static function is_available($action_name){
        if(self::is_connected()){
            $actions = self::$user->actions;
            if(in_array($action_name,$actions)){
                return true;
            }
            return false;
        }
        return false;
    }

    static function save($key,$val = true){
        self::session();
        $_SESSION[$key] = $val;
        return true;
    }

    static function get($key){
        self::session();
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    static function destroy($key){
        self::session();
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    static function add($key, $val){
        self::session();
        if(!self::isset_session($key)){
            self::save($key, []);
        }
        if(!is_array(self::get($key))){
            self::save($key, [self::get($key)]);;
        }
        $arr = self::get($key);
        $arr[] = $val;
        self::save($key, $arr);
    }

    static function isset_session($key){
        return isset($_SESSION[$key]);
    }

    static function debug($v){
        self::save('debug', debug($v));
    }

}

App::load();

?>