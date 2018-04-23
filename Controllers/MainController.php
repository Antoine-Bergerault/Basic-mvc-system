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

}


?>