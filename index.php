<?php

$url = '/';
if(isset($_GET['url'])){
    $url = '/'.$_GET['url'];
}

require('Router/Class/Router.php');
require('Router/web.php');

function view($name){
    require("Views/$name.php");
}

$page = false;
for($i = 0;$i<sizeof(Router::$routes);$i++){
    if(Router::match($url, Router::$routes[$i]['path'] ,$i)){
        $func = Router::$routes[$i]['callback'];
        echo $func();
        $i = sizeof(Router::$routes);
        $page = true;
    }
}

if(!$page){
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
}

?>