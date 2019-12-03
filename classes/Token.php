<?php
class Token{
     /**
      * method generate - generate random token
     */ 
    public static function generate(){
        return Session::put(Config::get('session/token_name'), md5(uniqid()));
    }

     /**
    * method check - checking or token exists and in session have the same token
    * if token exists delete them and return true.
    */ 
    public static function check($token){
        $tokenName = Config::get('session/token_name');

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}
