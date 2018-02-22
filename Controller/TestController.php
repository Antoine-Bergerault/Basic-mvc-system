<?php

class TestController {

    public $link = '<link rel="stylesheet" href="public/css/default.css">';

    public function test(){
        return $this->link.'<h2>This is the test page</h2>';
    }

    public function github(){
        return view('github-info');
    }

}


?>