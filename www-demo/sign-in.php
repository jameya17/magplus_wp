<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <?php include("includes/css-js.php"); ?> 
</head>
<body>
    <?php include("includes/header.php"); ?> 
    <div class="container tutorialPg"> 
        <section id="tutorials" class="l-section sec-pad grey-bg pad-top0 form-pg ">
            <div class="l-section-wrap pos-rel">
                <div class="breadcrumb">
                    <ul>
                        <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                        <li class="breadcrumb-item"><a href="#">Try For Free</a></li>
                        <li class="breadcrumb-item"><a href="#">Sign Up</a></li>
                    </ul>
                </div>
                <div class="form-section form-container sign-up-form">
                    <h5>You’re Just One Step away from Getting the Tools</h5>
                    <form class="form-block">
                        <h2 class="form-block-title">Sign In</h2>

                        <div class="styled-input">
                            <input type="email" required />
                            <label>Email</label>
                            <span class="error">Welcome to Magplus</span>
                        </div>
                        <div class="styled-input">
                            <div class="group-field hide">
                                <input type="password" required autocomplete="off" />
                                <label>password</label>
                                <strong class="eye-icon show"><img src="images/icons/eye-icon-show.svg" alt=""></strong>
                                <strong class="eye-icon hide"><img src="images/icons/eye-icon-hide.svg" alt=""></strong>
                            </div>    
                            <span class="error">Atleast 1 uppercase & numerical</span>
                        </div>

                        <div class="form-field-group">
                            <div class="group-field">
                                <label class="checkbox-container" for="remember-me">
                                    <input type="checkbox" id="remember-me">
                                    <span class="checkmark"></span>Remember Me
                                </label>
                                <span class="error">Atleast 1 uppercase & numerical</span>
                            </div>    
                            <a href="/mega-plus/www/forgot-password.php" class="forgot-password-link" title="Forgot Password?">Forgot Password?</a>    
                        </div>

                        <div class="btn-block align-center">
                            <a href="/mega-plus/www/tutorials.php" class="primary-btn" title="Sign In">
                                <span class="span1">Sign In</span>
                                <span class="span2">Sign In</span>
                                <span class="span3">Sign In</span>
                            </a>
                        </div>
                        <div class="form-field-group">
                            <span class="divider-text">Or, Sign In with</span>
                        </div>    
                        <div class="form-field-group">
                            <a class="btn-link apple-link" href="#" title="Sign In with Apple"><img src="images/icons/apple-icon.svg" alt=""> Sign In with Apple</a>
                        </div>    
                        <div class="form-field-group form-field-icon-group">
                            <a href="#" title="Google" class="google-logo" ><img src="images/icons/google-logo.svg" alt="Google"></a>
                            <a href="#" title="Facebook" class="fb-logo"><img src="images/icons/fb-logo.svg" alt="Facebook"></a>
                        </div>    
                        <p class="tmc-text">Don’t have an account?  <a href="/mega-plus/www/sign-up.php" title="Sign Up">Sign Up</a></p>
                    </form>
                </div>
            </div>    
        </div>
    <div>
</body>
</html>        
