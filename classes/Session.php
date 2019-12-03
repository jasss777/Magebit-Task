<?php
class Session {

    /**
    * check or session exists, if yes return true else false.
    */ 
    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
    * method put - create session
    */ 
    public static function put($name, $value){
        return $_SESSION[$name] = $value;
    }

    /**
    * method get - return session
    */ 
    public static function get($name){
        return $_SESSION[$name];
    }

    /**
    * method delete - unset session if exists
    */ 
    public static function delete($name){
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
    
    public static function flash($name, $string = ''){
        if (self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
            return $session;
        } 
        else{
            self::put($name, $string);
        }
    }
}
