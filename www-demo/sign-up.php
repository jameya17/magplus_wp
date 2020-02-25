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
                        <h2 class="form-block-title">Sign Up</h2>

                        <div class="styled-input error-block">
                            <input type="email" required />
                            <label>email</label>
                            <span class="error">Welcome to Magplus</span>
                        </div>
                        <div class="styled-input">
                            <input type="tel" required autocomplete="off" />
                            <label>phone number</label>
                            <span class="error">This is secure with us</span>
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
                        <div class="styled-input">
                            <input type="text" required autocomplete="off"/>
                            <label>referal Code (Optional)</label>
                            <span class="error">Please feed in the code you have</span>
                        </div>
                        <div class="btn-block align-center">
                            <a href="/mega-plus/www/tutorials.php" class="primary-btn" title="Sign Up">
                                <span class="span1">Sign Up</span>
                                <span class="span2">Sign Up</span>
                                <span class="span3">Sign Up</span>
                            </a>
                        </div>
                        <p class="tmc-text">By clicking “Sign Up” you agree to the <a href="/mega-plus/www/license-agreement.php" title="Terms of Service">Terms of Service</a></p>
                    </form>
                </div>
            </div>    
        </div>
    <div>
</body>
</html>        
