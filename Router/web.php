<?php

Router::get('/', 'MainController@home');

Router::get('/path','MainController@path');

Router::get('/model',function(){
    return view('model');
});

Router::get('/controller',function(){
    return view('controller');
});

Router::get('/structure',function(){
    return view('structure');
});

Router::get('/view',function(){
    return view('views');
});

//Router::default_path('/');

?>