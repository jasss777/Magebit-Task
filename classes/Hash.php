<?php
class Hash {

    /**
    * method make - randomly generate data
    */ 
    public static function make($string, $salt = ''){
        return hash('sha256', $string . $salt);
    }

    /**
    * must return mcrypt_create_iv, but not working.
    */ 
    public static function salt($length){
        return rand($length);
    }

    public static function unique(){
        return self::make(uniqid());
    }
}
