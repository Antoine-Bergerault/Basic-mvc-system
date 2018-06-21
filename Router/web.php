<?php

Router::get('/', 'MainController@home');

Router::get('/path','MainController@path');

Router::get('/model','MainController@model');

Router::get('/controller',function(){
    return view('controller');
});

Router::get('/configuration',function(){
    return view('configuration');
});

Router::get('/structure',function(){
    return view('structure');
});

Router::get('/view',function(){
    return view('views');
});

//Router::default_path('/');

?>