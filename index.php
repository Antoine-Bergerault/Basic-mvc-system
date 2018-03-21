<?php

/** @var string $url */
$url = '/';
if(isset($_GET['url'])){
    $url = '/'.$_GET['url'];
}

require('Router/Class/Route.php');//class for the routes
require('Router/Class/Router.php');//class for the router
require('Router/web.php');//assign the url


function debug($arr){
    echo '<pre>';
    var_dump($arr);
    echo '</pre>';
}
function redirect($path){
    echo '<script>window.location = "'.$path.'";</script>';
}
function view($name, $data = null){
    if($data != null){
        extract($data);
    }
    require("Views/$name.php");
}
function route($path, $url = '/'){
    $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://"). "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $root = explode($url, $root);
    $root = $root[0];
    $route_path = $root;
    $path = ltrim($path, '/');
    $route_path .= $path;
    return $route_path;
}

echo Router::run($url);

/*if($page == false){
    if(Router::$default != false){
        //echo $_SERVER['DOCUMENT_ROOT'].Router::$default;
        $root = (isset($_SERVER['HTTPS']) ? "https://" : "http://"). "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $root = explode($url, $root);
        $root = $root[0];
        $path = $root.''.Router::$default;
        echo '<script>window.location = "'.$path.'";</script>';
        //header("Location : $path");
        //exit;
    }
}*/

?>