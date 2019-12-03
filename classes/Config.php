<?php
class Config{
 /**
 * method get - use configs from init.php if exist.
 */ 
    public static function get($path = null){
        if ($path) {
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach($path as $bit) {
               if (isset($config[$bit])) {
            $config = $config[$bit];
               }
            }
            return $config;
        }
        return false;
    }
}
