<?php


function debug($arr){//used to debug array or string or object
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}

function redirect($path){//redirection
    echo '<script>window.location = "'.$path.'";</script>';
}

function view($name, $data = null){//return the correct view
    if($data != null){
        extract($data);
    }
    require("Views/$name.php");
}

function route($path = false){//get the route for the root of the website
    if(Router::$default != false && $path == false){
        $path = Router::$default;
    }else if(Router::$default == false && $path == false){
        return false;
    }

    $url = null;
    if(isset($_GET['url'])){
        $url = '/'.$_GET['url'];
    }

    $url = str_replace(' ','%20',$url);

    $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://"). "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    
    if($url != null){
        $root = explode($url, $root);
        $root = $root[0];
    }
    
    $root = trim($root, '/');
    $route_path = $root.$path;
    return $route_path;
}

function root(){//return the root of the website
    return trim(route('/'));
}

function alert($str){//use the javascript alert function

    echo "<script>alert($str)</script>";
    return false;

}

function get($url){
    return "$.get('$url')";
}

function loadCSS($name){
    echo '<link rel="stylesheet" href="public/css/'.$name.'.min.css">';
}

function loadJS($name){
    echo '<script src="public/js/'.$name.'.js"></script>';
}

function speaking_format($date){
    $datetime = date_diff(new DateTime(date("Y-m-d H:i:s")), new DateTime($date));
    $date = new stdClass();
    $date->years = $datetime->y;
    $date->months = $datetime->m;
    $date->days = $datetime->d;
    $date->hours = $datetime->h;
    $date->minutes = $datetime->i;
    $date->seconds = $datetime->s;

    $str = "";
    if($date->years == 0){
        if($date->months == 0){
            if($date->days == 0){
                if($date->hours == 0){
                    if($date->minutes == 0){
                        $str = "$date->seconds s ago";
                    }else{
                        $str = "$date->minutes m ago";
                    }
                }else{
                    $str = "$date->hours h". ($date->minutes > 0)?"$date->minutes m":"" ." ago";
                }
            }else{
                $str = "$date->days d". ($date->hours > 0)?"$date->hours h":"" ." ago";
            }
        }else{
            $str = "$date->months month(s)". ($date->days > 0)?"$date->days d":"" ." ago";
        }
    }else{
        $str = "$date->years year(s)". ($date->months > 0)?"$date->months month(s)":"" ." ago";
    }
    return $str;
}

function str_random($lenght){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);
}

?>