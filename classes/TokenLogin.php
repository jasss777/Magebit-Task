<?php
class TokenLogin{
    public static function generate(){
        return Session::put(Config::get('session/token_name_login'), md5(uniqid()));
    }

    public static function check($token){
        $tokenName = Config::get('session/token_name_login');

        if (Session::exists($tokenName) && $token === Session::get($tokenName)) {
            Session::delete($tokenName);
            return true;
        }
        return false;
    }
}