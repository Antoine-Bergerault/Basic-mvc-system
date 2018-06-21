<?php

require_once 'Models/UserModel.php';//import the User Model to interact with the users

class MainController {
    
    //You can add methods
    public function home(){
        return view('home');
    }

    public function path(){
        return view('path');
    }

    public function model(){
        $UserModel = new UserModel();
        $UserModel->find(5)->where(['name' => 'LIKE ?%','token' => '= ?'])->args(['A','bz75vga23vsaT6QFy5fqv5q']);
        $sql = $UserModel->sql();
        return view('model',compact('sql'));
    }

}


?>