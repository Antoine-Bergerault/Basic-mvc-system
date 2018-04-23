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


?>