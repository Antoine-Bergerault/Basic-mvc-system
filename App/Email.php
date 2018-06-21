<?php

class Email{

    static $name = "YOUR_NAME";
    static $email = "YOUR_EMAIL";

    static function send($subject,$message,$mailto){
        $header = self::generate_header();
        try{
            $mail = mail($mailto,$subject,$message,$header);
        }catch(\Exception $e){
            $mail = false;
        }
        return $mail;
    }

    static function generate_header(){

        $header = 'MIME-Version: 1.0'.PHP_EOL
        .'From: '.self::$name.'<'.self::$email.'>'.PHP_EOL
        .'Return-Path: '.self::$email.PHP_EOL
        .'Reply-To: '.self::$email.PHP_EOL
        .'Organization: '.self::$name.PHP_EOL
        .'X-Priority: 3 (Normal)'.PHP_EOL
        .'Content-Type: text/html; charset="iso-8859-1"'.PHP_EOL
        .'Content-Transfer-Encoding: 8bit'.PHP_EOL
        .'X-Mailer: PHP '.PHP_EOL
        .'Date:'. date("r") . PHP_EOL;

        return $header;

    }

}


?>
