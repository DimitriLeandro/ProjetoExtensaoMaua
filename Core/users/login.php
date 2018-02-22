<?php

// error_reporting(E_ALL);
// ini_set('display_errors', 1);
ini_set("allow_url_fopen", 1);
if(isset($_SESSION)){session_destroy();}
?>
<?php require_once 'init.php'; ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/header.php'; ?>
<?php // require_once $abs_us_root.$us_url_root.'users/includes/navigation.php'; ?>
<?php
$settingsQ = $db->query("SELECT * FROM settings");
$settings = $settingsQ->first();
$error_message = '';
if (@$_REQUEST['err']) $error_message = $_REQUEST['err']; // allow redirects to display a message
$reCaptchaValid=FALSE;
 
if (Input::exists()) {
    $token = Input::get('csrf');
    if(!Token::check($token)){
        die('Token doesn\'t match!');
    }
    //Check to see if recaptcha is enabled
    if($settings->recaptcha == 1){
        require_once 'includes/recaptcha.config.php';
 
        //reCAPTCHA 2.0 check
        $response = null;
 
        // check secret key
        $reCaptcha = new ReCaptcha($privatekey);
 
        // if submitted check response
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"],$_POST["g-recaptcha-response"]);
        }
        if ($response != null && $response->success) {
            $reCaptchaValid=TRUE;
 
        }else{
            $reCaptchaValid=FALSE;
            $error_message .= 'Please check the reCaptcha.';
        }
    }else{
        $reCaptchaValid=TRUE;
    }
 
    if($reCaptchaValid || $settings->recaptcha == 0){ //if recaptcha valid or recaptcha disabled
 
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('display' => 'Username','required' => true),
            'password' => array('display' => 'Password', 'required' => true)));
 
        if ($validation->passed()) {
            //Log user in
 
            $remember = (Input::get('remember') === 'on') ? true : false;
            $user = new User();
            $login = $user->loginEmail(Input::get('username'), trim(Input::get('password')), $remember);
            if ($login) {
                # if user was attempting to get to a page before login, go there
                $dest = sanitizedDest('dest');
                if (!empty($dest)) {
                    Redirect::to($dest);
                } elseif (file_exists($abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php')) {
                   
                    # if site has custom login script, use it
                    # Note that the custom_login_script.php normally contains a Redirect::to() call
                    require_once $abs_us_root.$us_url_root.'usersc/scripts/custom_login_script.php';
                } else {
                    if (($dest = Config::get('homepage')) ||
                            ($dest = 'account.php')) {
                        #echo "DEBUG: dest=$dest<br />\n";
                        #die;
                        Redirect::to($dest);
                    }
                }
            } else {
                $error_message .= 'Log in failed. Please check your username and password and try again.';
            }
        } else{
            $error_message .= '<ul>';
            foreach ($validation->errors() as $error) {
                $error_message .= '<li>' . $error . '</li>';
            }
            $error_message .= '</ul>';
        }
    }
}
if (empty($dest = sanitizedDest('dest'))) {
  $dest = '';
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
if($settings->glogin==1 && !$user->isLoggedIn()){
require_once $abs_us_root.$us_url_root.'users/includes/google_oauth_login.php';
}
if($settings->fblogin==1 && !$user->isLoggedIn()){
require_once $abs_us_root.$us_url_root.'users/includes/facebook_oauth.php';
}
?>

    <div class="bg-danger"><?=$error_message;?></div>
    
    <!-- Meta tags -->
    <title>Página de Login</title>
    <meta name="keywords" content="Winter Login Form Responsive widget, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- stylesheets -->
    <link rel="stylesheet" href="css/font-awesomelogin.css">
    <link rel="stylesheet" href="css/stylelogin.css">
    <!-- google fonts  -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
</head>
<body>
    <div class="agile-login">
        <h1>Página de Login ao sistema</h1>
        <div class="wrapper">
            <h2>LOG IN</h2>
            <div class="w3ls-form">
               <form name="login" class="form-signin" action="login.php" method="post">
                
                <input type="hidden" name="dest" value="<?= $dest ?>" />
                    <label for="username">Username</label>
                    <input  class="form-control" type="text" name="username" id="username" placeholder="Username/Email" required autofocus>
                    <label>Password</label>
                    <input type="password" class="form-control"  name="password" id="password"  placeholder="Password" required autocomplete="off">
                    <a href='forgot_password.php' class="pass">Forgot Password ?</a>
                  <div class="form-group">
                    <label for="remember">
                    <input type="checkbox" name="remember" id="remember" > Lembrar-me</label>
                 </div>
                    <input type="hidden" name="csrf" value="<?=Token::generate(); ?>">
                    <button class="submit  btn  btn-primary" type="submit">LOGIN</button>
                    
                </form>
            </div>
            <?php
    if($settings->recaptcha == 1){
    ?>
    <div class="form-group">
    <label>Please check the box below to continue</label>
    <div class="g-recaptcha" data-sitekey="<?=$publickey; ?>"></div>
    </div>
    <?php } ?>
            
        </div>
        <br>
        <div class="copyright">
        <p>All rights reserved | Design by <a href="www.w3layouts.com">W3layouts</a></p> 
    </div>
    </div>
 </div>
    
</body>
</html>


<?php 
/*
 <div id="page-wrapper">
<div class="container">
<div class="row">
    <div class="col-xs-12">
    <div class="bg-danger"><?=$error_message;?></div>
    <?php
if($settings->glogin==1 && !$user->isLoggedIn()){
require_once $abs_us_root.$us_url_root.'users/includes/google_oauth_login.php';
}
if($settings->fblogin==1 && !$user->isLoggedIn()){
require_once $abs_us_root.$us_url_root.'users/includes/facebook_oauth.php';
}
?>
    <form name="login" class="form-signin" action="login.php" method="post">
    <h2 class="form-signin-heading"></i> <?=lang("SIGNIN_TITLE","");?></h2>
    <input type="hidden" name="dest" value="<?= $dest ?>" />
 
    <div class="form-group">
        <label for="username" >Username OR Email</label>
        <input  class="form-control" type="text" name="username" id="username" placeholder="Username/Email" required autofocus>
    </div>
 
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control"  name="password" id="password"  placeholder="Password" required autocomplete="off">
    </div>
 
    <?php
    if($settings->recaptcha == 1){
    ?>
    <div class="form-group">
    <label>Please check the box below to continue</label>
    <div class="g-recaptcha" data-sitekey="<?=$publickey; ?>"></div>
    </div>
    <?php } ?>
 
    <div class="form-group">
    <label for="remember">
    <input type="checkbox" name="remember" id="remember" > Remember Me</label>
    </div>
 
    <input type="hidden" name="csrf" value="<?=Token::generate(); ?>">
    <button class="submit  btn  btn-primary" type="submit"><i class="fa fa-sign-in"></i> <?=lang("SIGNIN_BUTTONTEXT","");?></button>
 
    </form>
    </div>
</div>
<div class="row">
    <div class="col-xs-6"><br>
        <a class="pull-left" href='forgot_password.php'><i class="fa fa-wrench"></i> Forgot Password</a><br><br>
    </div>
    <div class="col-xs-6"><br>
        <a class="pull-right" href='join.php'><i class="fa fa-plus-square"></i> <?=lang("SIGNUP_TEXT","");?></a><br><br>
    </div>
</div>
</div>
</div>
*/
?>
 
    <!-- footers -->


<?php /*
<?php require_once $abs_us_root.$us_url_root.'users/includes/page_footer.php'; // the final html footer copyright row + the external js calls ?>
 
    <!-- Place any per-page javascript here -->
 
<?php   if($settings->recaptcha == 1){ ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php } ?>
<?php require_once $abs_us_root.$us_url_root.'users/includes/html_footer.php'; // currently just the closing /body and /html ?> */
?>