<?php

Router::get('/test', 'TestController@test');
Router::get('/github', 'TestController@github');

Router::get('/params/{param}', function($param){
    return "<center><h1>The param is $param.<br>It is assigned thanks to the url</h1></center>";
});

Router::get('/', function(){
   return view('home');
});

Router::default_path('/');

?>