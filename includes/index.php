<?php
require_once __DIR__. '/../core/init.php';

$user = DB:: getInstance()->insert('users', array(
    'name' => 'dale',
    'password' => 'password',
    'salt' => 'salt',
    'email' => 'email@inbox.lv'
));



