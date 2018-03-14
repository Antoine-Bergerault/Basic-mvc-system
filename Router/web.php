<?php

Router::get('/test', 'TestController@test');
Router::get('/github', 'TestController@github');

Router::get('/', function(){
   return view('home');
});

Router::default_path('/test');

?>