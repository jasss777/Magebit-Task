<?php
session_start();

$GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'dbuser', //magebit
            'password' => 'dbuser1234', //magebit123
            'db' => 'testdb'
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

spl_autoload_register(function($class){
require_once __DIR__. '/../classes/'. $class .'.php';
});

require_once __DIR__. '/../functions/sanitize.php';
