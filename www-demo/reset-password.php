<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <?php include("includes/css-js.php"); ?> 
</head>
<body>
    <?php include("includes/header.php"); ?> 
    <div class="container tutorialPg"> 
        <section id="tutorials" class="l-section sec-pad grey-bg pad-top0 ">
            <div class="l-section-wrap pos-rel">
                <div class="breadcrumb">
                    <ul>
                        <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                        <li class="breadcrumb-item"><a href="#">Try For Free</a></li>
                        <li class="breadcrumb-item"><a href="#">Sign Up</a></li>
                    </ul>
                </div>
                <div class="form-section form-container sign-up-form forgot-password-form">
                    <form class="form-block">
                        <h2 class="form-block-title">Reset Password</h2>
                        <p>Please enter your new password</p>

                        <div class="styled-input">
                            <div class="group-field hide">
                                <input type="password" required autocomplete="off" />
                                <label>password</label>
                                <strong class="eye-icon show"><img src="images/icons/eye-icon-show.svg" alt=""></strong>
                                <strong class="eye-icon hide"><img src="images/icons/eye-icon-hide.svg" alt=""></strong>
                            </div>    
                            <span class="error">Atleast 1 uppercase & numerical</span>
                        </div>

                        <div class="styled-input">
                            <div class="group-field hide">
                                <input type="password" required autocomplete="off" />
                                <label>confirm password</label>
                                <strong class="eye-icon show"><img src="images/icons/eye-icon-show.svg" alt=""></strong>
                                <strong class="eye-icon hide"><img src="images/icons/eye-icon-hide.svg" alt=""></strong>
                            </div>    
                            <span class="error">Atleast 1 uppercase & numerical</span>
                        </div>
                        <div class="btn-block align-center">
                            <a href="/mega-plus/www/tutorials.php" class="primary-btn" title="Send">
                                <span class="span1">Send</span>
                                <span class="span2">Send</span>
                                <span class="span3">Send</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>    
        </div>
    <div>
</body>
</html>        
