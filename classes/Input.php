<?php
class Input {

    /**
    *  method exist have only two types, POST = send data to db, GET = get data from db
    * 1) check if type post field is  not empty, true false
    * 2) check if type get field is not empty, true false
    * 3) in other types return false
    */ 
    public static function exists($type = 'post'){
        switch($type){
            case 'post':
                return (!empty($_POST)) ? true : false;
            break;
            case 'get':
            return (!empty($_GET)) ? true : false;
            break;
            default:
                return false;
            break;
        }
    }

    /**
    *  method get - require $item (value in db)
    * 1) check if set data is POST than send $item to db
    * 2) check if set data is GET than return $item from db
    * 3) else return '';
    */ 
    public static function get($item){
        if 
        (isset($_POST[$item])) 
        {
            return $_POST[$item];
        } 
        else if(isset($_GET[$item]))
        {
            return $_GET[$item]; 
        }
         return '';
    }
}
