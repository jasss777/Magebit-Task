<?php

require_once __DIR__. '/../core/init.php';

    /**
    * Input::exists - check or fields is not empty
    * Token::check - check or token for this page is created and have the same with session token.
    * If true $validation - using method check from class Validate check or inputs passed all requirements
    */ 
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

    /**
    * $validation->passed - check or passed method return true from Validate class.
    * if validation passed:
    * 1) create $user object.
    * 2) generate random $salt using Hash class (to hide users entered password)
    * 3) $users->create - try insert in db $users data, get data from inputs.
    * 4) throw exception if some error.
    * else if we get some errors, go with foreach and print each error.
    */ 
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
