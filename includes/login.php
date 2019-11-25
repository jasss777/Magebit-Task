<?php
require_once __DIR__. '/../core/init.php';

if (Input::exists()) {
    if (TokenLogin::check(Input::get('tokenlogin'))) {
        
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'email'    => array('required' => true),
            'password' => array('required' => true)
        ));

        if ($validation->passed()) {
            $user = new User();
            $login = $user->login(Input::get('email'), Input::get('password'));
            if($login){
                Session::flash('home', "<script>alert('You are logged in')</script>");
                Redirect::to('index.php');
            } else{
                echo "<script>alert('Wrong email or password')</script>";
            }
        } else{
            foreach($validation->errors() as $error){
                echo $error, '<br>';
            }
        }
    }
}

?>