<?php
session_start();
 /**
 * config - sql connection settings.
 * remember - how long user stay logged in if they check box (in seconds).
 * session - generate token in each page.
 */ 
$GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'sqluser',
            'password' => 'sqlpass',
            'db' => 'dbname'
        ),
        'remember' => array(
            'cookie_name' => 'hash',
            'cookie_expiry' => 86400

        ),
        'session' => array(
            'session_name' => 'user',
            'token_name' => 'token',
            'token_name_login' => 'tokenlogin'
        )
);

 /**
 * sql_autoload_register - autoload required classes & functions
 */ 
spl_autoload_register(function($class){
require_once __DIR__. '/../classes/'. $class .'.php';
});

require_once __DIR__. '/../functions/sanitize.php';
