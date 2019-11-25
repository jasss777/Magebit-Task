<?php

require_once __DIR__. '/../core/init.php';

if(Input::exists()){
    if (Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'name' => array(
            'required' => true,
            'min' => 2,
            'max' => 45
        ),
        'password' => array(
            'required' => true,
            'min' => 4,
            'max' => 64

        ),
        'email' => array(
            'required' => true,
            'min' => 4,
            'max' => 100,
            'unique' => 'users'
        )
    ));

    if ($validation->passed()) {
         $user = new User();

        $salt = Hash::salt(32);

         try {
            $user->create(array(
                'name' => Input::get('name'),
                'password' => Hash::make(Input::get('password'), $salt),
                'salt' => $salt,
                'email' => Input::get('email')
            ));
            Session::flash('home', "<script>alert('You have been registered and can now log in!')</script>");
            Redirect::to('index.php');
         }
         catch(Exception $e) {
             die($e->getMessage());
         }
    } 
    else {
        foreach($validation->errors() as $error){
            echo $error, '<br>';
        }
    }
}
}
?>