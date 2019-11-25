

<?php
require_once __DIR__. '/core/init.php';
require_once __DIR__. '/includes/register.php';
require_once __DIR__. '/includes/login.php';

if (Session::exists('home')) {
  echo '<p>' . Session::flash('home') . '<p>';
}

$user = new User();
if($user->isLoggedIn()){
?>
  <p> Hello: <?php echo escape($user->data()->name);?>! </p>
  <ul>
    <li>
      <a href="includes/logout.php">Log Out</a>
    </li>
  </ul>

<?php

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="template/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400&display=swap" rel="stylesheet">
    <title>Megabit</title>
</head>

<body>
    <div class="content">
        <table class="form-table">
            <tr>
                <td class="register-info">
                    <p class="head-text">Don’t have an account?</p>
                    <div class="line"></div>
                    <p class="description-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
                    <button id="slide-left" class="sign-btn" >SIGN UP</button>
                </td>
                <td class="login-info">
                    <h3 class="head-text">Have an account?</h3>
                    <div class="line"></div>
                    <p class="description-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <button id="slide-right" class="sign-btn" >LOGIN</button>
                </td>
            </tr>
        </table>
    </div>


    <div class="input-fields">
    <form action="" method="post" id="login-field">
            <div class="title-text mb-25">Login<i class="mb-icon mb-25"></i> </div>
            <div class="form-line mb-25"></div>
            <div><label for="email" class="field-text-mail">Email</label><i class="ic-mail"></i></div>
            <div><input class="mb-25" name="email" id="email" type="email" value="<?php echo escape(Input::get('email')); ?>" ></div>
            <div><label for="password" class="field-text-password">Password</label><i class="ic-lock"></i></div>
            <div><input class="mb-25" name="password" id="password" type="password" value="<?php echo escape(Input::get('password')); ?>" ></div>
            <input type="hidden" name="tokenlogin" value="<?php echo TokenLogin::generate(); ?>">
            <button type="submit" class="login-btn" id="log-submit">LOGIN</button><a href="#" class="side-right link-text mt-5">Forgot?</a>
          </form>



        <form action="" method="post" id="signup-field">
                <div class="title-text mb-25">Sign Up<i class="mb-icon mb-25"></i> </div>
                <div class="form-line mb-25"></div>
                <div><label for="namereg" class="field-text-user">Name</label><i class="ic-user"></i></div>
                <div><input class="mb-25" name="name" id="namereg" type="text" value="<?php echo escape(Input::get('name')); ?>" ></div>
                <div><label for="emailreg" class="field-text-mail">Email</label><i class="ic-mail"></i></div>
                <div><input class="mb-25" name="email" id="emailreg" type="email" value="<?php echo escape(Input::get('email')); ?>" ></div>
                <div><label for="passwordreg" class="field-text-password">Password</label><i class="ic-lock"></i></div>
                <div><input class="mb-25" name="password" id="passwordreg" type="password" value="<?php echo escape(Input::get('password')); ?>"></div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
                <button type="submit" class="login-btn" id="reg-submit">SIGN UP</button>
        </form>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="template/js/focus.js" type="text/javascript"></script>
<script src="template/js/slide.js" type="text/javascript"></script>

</body>

</html>