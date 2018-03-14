<?php

Router::get('/test', 'TestController@test');
Router::get('/github', 'TestController@github');

Router::get('/params/{nbr}-{param}', function($nbr, $param){
    return "<center><h1>The nbr is $nbr.<br>The other parameter is $param.<br>They are assigned thanks to the url</h1></center>";
})->with('nbr', '[0-9]+');

Router::get('/', function(){
   return view('home');
});

Router::default_path('/');

?>