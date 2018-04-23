<?php

class App{

    static $user = false;//variable to store the user
    static $url = null;//variable to store the url

    static function load(){//equivalent of __construct

        self::session();//create a session if doesn't exist
        if(isset($_SESSION) && isset($_SESSION['user'])){
            $usr = $_SESSION['user'];//set the variable with the session content
            self::connect($usr);//connect to the user
        }
        //
        //You can load all the things you want here (ex: for the member system)
        //
        self::seturl();//initialize the $url

    }

    static function session(){//start a session if it is not already done

        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        return $_SESSION;

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

    //The App classes can stored static method accessible by all files

}

App::load();//Call the load method

?>