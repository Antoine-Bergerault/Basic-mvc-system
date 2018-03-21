<?php

Router::get('/test', 'TestController@test');
Router::get('/github', 'TestController@github');

Router::get('/params/{nbr}-{param}', function($nbr, $param){
    return "<center><h1>The nbr is $nbr.<br>The other parameter is $param.<br>They are assigned thanks to the url</h1></center>";
})->with('nbr', '[0-9]+');

Router::get('/db', function(){
    //need to require the model
    require_once 'Models/TestModel.php';
    $model = new Test();
    $data = $model->where([//SELECT * FROM $model->table
                'name' => "LIKE 'H%'" //WHERE name LIKE 'H%'
            ])
            ->find(5)//get only the first 5 results
            ->run();//make the request
    return view('db-view-test', compact('data'));//send data to the view
});

Router::get('/ajax', function(){
    return view('ajax');
});

Router::get('/test/ajax', function(){
    require_once 'Models/TestModel.php';
    $model = new Test();
    $data = $model->find(1, 0)->run();
    return view('elements/profile', compact('data'));//doesn't work if you have not setting up a database
});

Router::get('/', function(){
   return view('home');//don't send data because no data are needed
});

Router::default_path('/');

?>