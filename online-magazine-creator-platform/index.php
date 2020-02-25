<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Magazine Creator - Online Magazine Publishing Platform And Tools</title>
	<meta name="description" content="mag+ gives you the tools to create professional digital magazines, convert these creations into native applications, and publish your branded magazine app to the app stores. Make creation fun by using existing templates or design on your own.mag+ gives you tools to create a digital magazine using InDesign."/>
    <meta name="keywords" content="online magazine publishing platform, online magazine publishing tools, online magazine publishing, magazine publishing tools, digital magazine creator ">

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!--  <link rel="manifest" href="img/favicon/manifest.json"> -->    
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="build/css/intlTelInput.css">
	<!--<link rel="stylesheet" href="css/sticky-popup.css">-->
	<script src="js/modernizr.custom.js"></script>
	<script src="js/modernizr.custom.53451.js"></script>
	
	<link rel="icon" href="https://d3qvq3btfltx1c.cloudfront.net/wp-content/uploads/2018/06/19071845/mps-1.ico" type="image/x-icon"/> 
	<link rel="shortcut icon" href="https://d3qvq3btfltx1c.cloudfront.net/wp-content/uploads/2018/06/19071845/mps-1.ico" type="image/x-icon"/> 
	
	

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5CJPV');</script>
<!-- End Google Tag Manager -->

	
	
	<script type="text/javascript">
                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                      // var f = alpha[Math.floor(Math.random() * alpha.length)];
                      // var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e;
                    document.getElementById("mainCaptcha").value = code
                  }
                  function ValidCaptcha(){
                      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 == string2){
                        return true;
						$("#phone").val($( "div.selected-dial-code" ).html()+" "+$('#phone').val());
                      }
                      else{        
					    event.preventDefault();
					    return alert("Please Input a Valid Captcha");
                      }
                  }
                  function removeSpaces(string){
                    return string.split(' ').join('');
                  }
             </script>

	
	
	
	

	
	
</head>
<body>
<?php $ipaddress = $_SERVER['REMOTE_ADDR']; ?>
<!--Popup TEST-->
<!--<div class="sticky-popup">
   <div class="popup-wrap">
      <div class="popup-header">
         <div class="popup-title">
            <p style="margin: 0 0 10px; text-transform: unset; font-weight: 500; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif !important;"><br>C<br>o<br>n<br>t<br>a<br>c<br>t<br> <br>U<br>s<br></p>
            <div class="popup-image"></div>
         </div>
      </div>
      <div class="popup-content">
         <div class="popup-content-pad">
   		<h4 style="color:#fff;">Leave your contact details & we will contact you shortly!</h4>
	<div class="formBlock p-4">
   <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" onsubmit=" return ValidCaptcha();">
      <input type="hidden" name="oid" value="00D7F000005CgsF">
	  <!--<input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Landing Page 3">-->
	  <!--<input type="hidden" id="registration_url" class="register-new-form-where" name="registration_url" value="Landing Page 3">
      <input  id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="<?php echo $ipaddress ?>" />
	  <input type="hidden" id="sf_Form_Name__c" class="w2linput hidden" name="Form_Name__c" value="ebook publishing platforms : Landing Page 3">
      <input type="hidden" name="retURL" value="https://www.magplus.com/services/creative-services/creative-services-thank-you-3">
      <div class="form-group mb-4">
         <input type="text" class="form-control CustControl" id="firstName"   placeholder="First Name" name="first_name" required>
      </div>
      <div class="form-group mb-4">
         <input type="text" class="form-control CustControl" id="lastName"   placeholder="Last Name" name="last_name" required>
      </div>
      <div class="form-group mb-4">
         <input type="email" class="form-control CustControl" id="exampleInputEmail1"  placeholder="Email" name="email" required>
      </div>
      <div class="form-group mb-4">
         <input class="form-control CustControl" pattern=".{10,}" title="Please Enter Your Phone Number" id="phone" name="phone" type="tel" required >
      </div>
      
      <div class="form-group pull-left">
         <div style="" class="col-sm-8 col-xs-12 mb-3 p-0">	
            <input class="phone_class form-control CustControl mb-4"  style="margin-right: 5px;text-align:center; background-image: url(1.JPG); font-size: 17px; color: black; font-weight: 600;" type="text" id="mainCaptcha"  readonly /> 
         </div>
         <div style="float: right;" class="col-sm-4  col-xs-12 mb-4  p-0 mr-4"> 
            <input class="btn submitBtn refresh_btn"  type="button" id="refresh" value="Refresh" onclick="Captcha();" />
         </div>
		 <div class="form-group mb-4"></div>
      </div>
      <div class="form-group mb-4 mar_top">
         <input class="form-control CustControl" type="text" placeholder="type the code shown above"  id="txtInput" required  /> 
      </div>
      <div class="form-group text-center mb-4">
         <button class="btn submitBtn">Submit</button>
      </div>
   </form>
 
</div>
			
			
         </div>
      </div>
   </div>
</div>
<!--Popup TEST-->




<!--<div class="preloader"><div class="spinner"></div></div>--><!-- /.preloader -->
<div class="number-show">
<h3 class="click-me mobile-hide">Leave Your Contact Details</h3>
<h3 class="click-me desktop-hide">Contact Us</h3>
</div>
<header class="header home-page-one">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="https://www.magplus.com/">
                    <img src="images/logo.png" alt="Awesome Image" class="default-logo">
                    <img src="images/logo.png" alt="Awesome Image" class="stick-logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu one-page-scroll-menu" id="main-nav-bar">
                
                <ul class="nav navbar-nav navigation-box">
                    <!-- <li class="scrollToLink current"> <a href="#banner">Home</a> </li> -->
                    <li class="scrollToLink"> <a href="https://www.magplus.com/product-features/">FEATURES </a> </li>                    
                    <li class="scrollToLink"> <a href="https://www.magplus.com/pricing">PRICING </a> </li>
                    <li class="scrollToLink"> <a href="https://www.magplus.com/clients/">CASE STUDIES </a> </li>
                    <li class="scrollToLink"> <a href="https://www.magplus.com/software-uses">USE CASES </a> </li>
                    <!-- <li class="scrollToLink"> 
                    	<a href="#blog">Blog</a> 
                    	<ul class="sub-menu">
                    		<li><a href="blog.html">Blog Listing</a></li>
                    		<li><a href="blog-details.html">Blog Details</a></li>
                    	</ul><!-- /.sub-menu 
                   	</li> -->
                    <li class="show-mobile"> <a href="https://www.magplus.com/signup-for-online-magazine-creator-platform">TRY FOR FREE</a> </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
            <div class="right-side-box">
                <a href="https://www.magplus.com/signup-for-online-magazine-creator-platform" class="sign-btn">TRY FOR FREE</a>
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->

<section class="banner-static" id="banner">
	<div class="container container_top">
		<div class="row">
			<div class="col-md-6">
				<div class="banner-content">
					<h3><span class="banr_h3_top">Magazine Creator Platform</span></h3>
					<div class="bnr_main_p">
					<div class="h50p">
					<p><span class="banr_p_top">mag+ gives you the tools to create professional digital magazines, convert these creations into native applications, and publish your branded magazine app to the app stores.</span></p>
					</div>
					</div>
				</div><!-- /.banner-content -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="banner-moc-box fadein clearfix" >
					<img id="f1" src="images/img1.png" alt="Awesome Image" class="pull-right ht_po">
					<img id="f2" src="images/img2.png" alt="Awesome Image" class="pull-right  ht_po">
					<img id="f3" src="images/img3.png" alt="Awesome Image" class="pull-right  ht_po">
					<img id="f4" src="images/img4.png" alt="Awesome Image" class="pull-right  ht_po">
					<!--<img id="f4" src="images/CompAB.png" alt="Awesome Image" class="pull-right">
					<img id="f5" src="images/CompA.png" alt="Awesome Image" class="pull-right">
					<img id="f6" src="images/CompAB.png" alt="Awesome Image" class="pull-right">-->
				</div><!-- /.banner-moc-box -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.banner-static -->
<section class="app-features" id="features">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="banner-moc-box clearfix" >
					<img src="images/Mac.png" alt="Awesome Image" class="pull-right img23">
				</div><!-- /.banner-moc-box -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-6">
				<div class="banner-content mgn_sps">
				<!--<div class="separator no-border mb90 full-width"></div>-->
				<div class="separator no-border mb70 full-width"></div>
					<h3><span class="banr_h3_top12">Do It by</span></h3>
					<h3><span class="banr_h3_top122">InDesign</span></h3>
					<div class="bnr_main_p12">
					<div class="h50p12">
					<p><span class="banr_p_top12">Create visually attractive digital magazines with the help of the powerful mag+ InDesign plug-in. Make creation fun by using existing templates or designing your own. With multiple scrollable layers, robust graphics management, and intuitive mag+ controls, you and your team members can collaborate to create a stunning magazine. Assemble the created verticals and publish them with our magazine distribution tools.</span></p>
					</div>
					</div>
				</div><!-- /.banner-content -->
			</div><!-- /.col-md-6 -->
			
		</div><!-- /.row -->
	</div>
</section><!-- /.app-features -->

<section class="how-app-work-section_new" id="how-it-works">
	<div class="container tdb_pad_1">
		
		<div class="row">
		<div class="col-md-6">
			<div class="popup-content">
         <div class="popup-content-pad">
   		<!--<h4 style="color:#fff;"><span class="contact_us_top">Contact Us</span></h4>--> 	
		<h3><span class="bnr_1_spn777">Contact Us</span></h3>
		<hr class="jlklkj">
	<div class="formBlock p-4">
   <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" onsubmit=" return ValidCaptcha();">
      <input type="hidden" name="oid" value="00D7F000005CgsF">
	  <!--<input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Landing Page 3">-->
	 <input type="hidden" id="registration_url" class="register-new-form-where" name="registration_url" value="Landing Page 5">
      <input  id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="<?php echo $ipaddress ?>" />
	  <input type="hidden" id="sf_Form_Name__c" class="w2linput hidden" name="Form_Name__c" value="Landing Page1 : Online Magazine Creator Platform/">
      <input type="hidden" name="retURL" value="https://www.magplus.com/services/creative-services/creative-services-thank-you-5">
      <div class="form-group mb-4">
         <input type="text" class="form-control CustControl" id="firstName"   placeholder="First Name" name="first_name" required>
      </div>
      <div class="form-group mb-4">
         <input type="text" class="form-control CustControl" id="lastName"   placeholder="Last Name" name="last_name" required>
      </div>
      <div class="form-group mb-4">
         <input type="email" class="form-control CustControl" id="exampleInputEmail1"  placeholder="Email" name="email" required>
      </div>
      <div class="form-group mb-4">
         <input class="form-control CustControl" pattern=".{10,}" title="Please Enter Your Phone Number" id="phone" name="phone" type="tel" required >
      </div>
      
      <div style="width: 100%;" class="form-group pull-left">
         <div style="" class="col-sm-8 col-xs-12 mb-3 p-0">	
            <input class="phone_class form-control CustControl mb-4"  style="margin-right: 5px;text-align:center; background-image: url(1.JPG); font-size: 17px; color: black; font-weight: 600;" type="text" id="mainCaptcha"  readonly /> 
         </div>
         <div style="float: right;" class="col-sm-4  col-xs-12 mb-4  p-0 mr-4"> 
            <input class="btn submitBtn refresh_btn"  type="button" id="refresh" value="Refresh" onclick="Captcha();" />
         </div>
		 <div class="form-group mb-4"></div>
      </div>
      <div class="form-group mb-4 mar_top">
         <input class="form-control CustControl" type="text" placeholder="type the code shown above"  id="txtInput" required  /> 
      </div>
      <div class="form-group text-center mb-4">
         <button class="btn submitBtn juyt">Submit</button>
      </div>
   </form>
 
</div>
</div>
</div>
</div>

<div class="col-md-6">






        
    <div id="myCarousel" class="carousel slide text-right myCarousel_plans">
	 <div class="pull-right">
	 <div class="myCarousel_plans_hed_div"><p class="myCarousel_plans_hed">Plans and Pricing</p></div>
			<ul style="margin:0px;" class="control-box pager">
				<li><a class="" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-menu-left"></i></a></li>
				<li><a class="" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-menu-right"></i></a></li>
			</ul>
		</div>
		
        <div class="carousel-inner">
           
            <div class="item">
             
							<div class="row">
								<div class="col-sm-12">
									<!--<h3>Contrary to popular belief</h3>
    								<h4>Hampden-Sydney College in Virginia</h4>
									<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>-->
									<div class="myCarousel_plans_hed_con">
									<h3 class="plan_h3">MULTI</h3>
									<p class="plan_p">1 Year Commitment</p>
									<hr class="jlklkj123">
									
									<div class="tyrioi">
										<h4 class="plan_h4">Applications</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Analytic tools –&nbsp;Google Analytics, Localytics, Flurry</li>
										<li>In-app Advertising – AdMarvel, AdColony</li>
										<li>-</li>
										</ul>

										<h4 class="plan_h4">Authoring Tool</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Feature-rich Adobe InDesign plugin</li>
										<li>HTML Support</li>
										</ul>

										<h4 class="plan_h4">Includes</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Interactive Multimedia Designing</li>
										<li>Unlimited Push notifications</li>
										</ul>

										<h4 class="plan_h4">Integrations</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Analytic tools – Google Analytics, Localytics, Flurry</li>
										<li>In-app Advertising – AdMarvel, AdColony</li>
										</ul>

										<h4  class="plan_h4">Deployment</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Web Export</li>
										<li>-</li>
										</ul>
										<hr class="jlklkj123">
										<h3 class="plan_h3">$499/mo</h3>
										<p class="plan_p">Charging $5389 per year</p>
										<hr class="jlklkj123">
									</div>
									</div>
									<a href="https://magplus.com/pricing" class="btn btn-default myCarousel_plans_btn">More Options</a>
								</div>
                       </div>
                      
              </div><!-- /Slide1 --> 
             <div class="item active">
             
							<div class="row">
								
								<div class="col-sm-12">
									<!--<h3>Contrary to popular belief</h3>
    								<h4>Hampden-Sydney College in Virginia</h4>
									<p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>-->
									<div class="myCarousel_plans_hed_con">
									<h3 class="plan_h3">MULTI PRO</h3>
									<p class="plan_p">1 Year Commitment</p>
									<hr class="jlklkj123">
									
									<div class="tyrioi">
										<h4 class="plan_h4">Applications</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Analytic tools –&nbsp;Google Analytics, Localytics, Flurry</li>
										<li>In-app Advertising – AdMarvel, AdColony</li>
										<li>Enterprise builds for iOS</li>
										</ul>

										<h4 class="plan_h4">Authoring Tool</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Feature-rich Adobe InDesign plugin</li>
										<li>HTML Support</li>
										</ul>

										<h4 class="plan_h4">Includes</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Interactive Multimedia Designing</li>
										<li>Unlimited Push notifications</li>
										</ul>

										<h4 class="plan_h4">Integrations</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Analytic tools – Google Analytics, Localytics, Flurry</li>
										<li>In-app Advertising – AdMarvel, AdColony</li>
										</ul>

										<h4 class="plan_h4">Deployment</h4>
										<ul class="myCarousel_plans_hed_ulli">
										<li>Web Export</li>
										<li>Self Hosting Capabilities</li>
										</ul>
										<hr class="jlklkj123">
										<h3 class="plan_h3">$629/mo</h3>
										<p class="plan_p">Charging $7549 per year</p>
										<hr class="jlklkj123">
									
									</div>
									</div>
									<a href="https://magplus.com/pricing" class="btn btn-default myCarousel_plans_btn">More Options</a>
								</div>
                       
                      </div>
              </div><!-- /Slide1 --> 
        </div>
        
       
	  
	   <!-- /.control-box -->   
                              
    </div><!-- /#myCarousel -->
        






		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.how-app-work-section -->

<div class="separator no-border mt135 full-width"></div><!-- /.separator no-border mt135 -->

<section class="features-style-slider">
	<div class="container">	
		<div class="row">
		<div class="s_stories tdb_pad_1"><p><span class="s_stories_p">Success Stories</span></p>
		<hr class="jlklkj123144">
		</div>
<div id="dg-container" class="dg-container">
				<div class="dg-wrapper">
					<a href="https://www.youtube.com/watch?v=ZRHX2A1iIs8&list=PL053C759210BDA391&index=76" target="_blank"><p class="retere">Case Study 1</p><hr><img src="images/iPad1.png" alt="image01"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<a href="https://www.youtube.com/watch?v=d9dFsU1jgCY&index=73&list=PL053C759210BDA391"target="_blank"><p class="retere">Case Study 2</p><hr><img src="images/iPad3.png" alt="image02"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<a href="https://www.magplus.com/blog/getting-straight-to-business-with-the-nareim-digital-newsletter/" target="_blank"><p class="retere">Case Study 3</p><hr><img src="images/iPad4.png" alt="image03"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<a href="https://www.magplus.com/video/mad-magazine-for-the-ipad/" target="_blank"><p class="retere">Case Study 4</p><hr><img src="images/iPad5.png" alt="image04"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<a href="https://www.magplus.com/famous-footwear-uses-digital-publishing-tools-for-new-m-commerce-app/" target="_blank"><p class="retere">Case Study 5</p><hr><img src="images/iPad6.png" alt="image05"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<a href="https://www.magplus.com/blog/cfo-magazine-creative-tablet-publishing/" target="_blank"><p class="retere">Case Study 6</p><hr><img src="images/iPad7.png" alt="image06"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
					<!--<a href="#"><p class="retere">Case Study 7</p><hr><img src="images/iPad2.png" alt="image07"><div><p><span class="k_more">KNOW MORE</span></p></div></a>-->
					<a href="https://www.magplus.com/blog/from-indesign-to-ipad-new-york-magazine-gives-readers-custom-experiences/" target="_blank"><p class="retere">Case Study 7</p><hr><img src="images/iPadA.png" alt="image08"><div><p><span class="k_more">KNOW MORE</span></p></div></a>
				</div>
				<!--nav>	
					<span class="dg-prev">&lt;</span>
					<span class="dg-next">&gt;</span>
				</nav-->
			</div>
		
		
		
			
		</div><!-- /.row -->	
	</div><!-- /.container -->
</section><!-- /.features-style-one -->

<div class="separator no-border mb90 full-width"></div><!-- /.separator no-border mb135 -->

<!--<section class="video-box">
	<div class="container text-center">
		<h3>Trusted by Our 4500 Companies</h3>
		<img src="images/magplus-img/client/unliver.png" class="pull-right" alt=""><img src="images/magplus-img/client/volo.png" class="pull-right" alt=""><img src="images/magplus-img/client/schnider.png" class="pull-right" alt=""><img src="images/magplus-img/client/va.png" class="pull-right" alt=""><img src="images/magplus-img/client/united.png" class="pull-right" alt=""><img src="images/magplus-img/client/yark.png" class="pull-right" alt=""><img src="images/magplus-img/client/new-yark.png" class="pull-right" alt="">
	</div><!-- /.container text-center -->
<!--</section><!-- /.video-box -->

<section class="features-style-one">
	<div class="container">	
		<div class="row">						
			<div class="col-md-6 clearfix pull-left get-started-today">
				<span class="like_p">Like what we do? </span></p>
				<span class="contact_p">Contact Us</span></p>	
			</div><!-- /.col-md-6 -->
			<div class="col-md-6 clearfix register-now-1">
				<div class="feature-style-content1 pt50 pl40">
					<div class="right-side-box register-now">
						<a href=" https://www.magplus.com/signup-for-online-magazine-creator-platform" class="sign-btn">CONTACT US</a>
					</div>					
				</div><!-- /.feature-style-content -->
			</div>
		</div><!-- /.row -->	
	</div><!-- /.container -->
</section><!-- /.features-style-one -->


<footer class="footer">
	
	<div class="footer-widget-wrapper">
		<div class="container">
			<!--<div class="row masonary-layout">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-widget about-widget">
						<h5>COMPANY INFO :</h5>
							<ul>
							<li><a href="https://www.magplus.com/about/">About Us</a></li>	
							<li><a href="https://www.mpslimited.com/events/">Events </a></li>	
							<li><a href="https://www.magplus.com/blog/">Blog</a></li>	
							<li><a href="https://www.magplus.com/press/">Press</a></li>	
							<li><a href="https://www.magplus.com/contact">Contact Us</a></li>	
							<li><a href="https://support.magplus.com/hc/en-us">Support</a></li>	
							</ul>
					</div><!-- /.footer-widget -->
				<!--</div><!-- /.col-md-3 -->
				<!--<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-widget contact-widget">
						<h5>LEGAL :</h5>
							<ul>
							<li><a href="https://www.magplus.com/legal/privacy-policy/">Privacy Policy</a></li>	
							<li><a href="https://www.magplus.com/legal/conditions-of-use/">Conditions of Use</a></li>	
							<li><a href="https://www.magplus.com/legal/eula/">Publisher End User License Agreement</a></li>
							</ul>
					</div><!-- /.footer-widget -->
				<!--</div><!-- /.col-md-3 -->
				<!--<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="footer-widget links-widget footer-post">
						<h5>RECOMMENDED POST :</h5>
							<ul>
							<li><a href="https://www.magplus.com/blog/choosing-the-right-topic-for-your-magazine-articles/">Choosing the Right Topic for Your Magazine Articles</a></li>	
							<li><a href="https://www.magplus.com/blog/top-print-magazines-that-transformed-to-exclusively-digital-magazines/">Top Print Magazines That Transformed To Exclusively Digital Magazines</a></li>	
							<li><a href="https://www.magplus.com/blog/key-pointers-to-consider-before-publishing-a-digital-magazine/">Key Pointers to Consider Before Publishing a Digital Magazine</a></li>	
							<li><a href="https://www.magplus.com/blog/choosing-the-right-format-for-your-digital-magazine/">Choosing the Right Format for Your Digital Magazine</a></li>								
							</ul>
					</div><!-- /.footer-widget -->
				<!--</div><!-- /.col-md-3 -->
				<!--<div class="col-md-3 col-sm-6 col-xs-12 social-icon">
					<div class="footer-widget tweets-widget">
						<ul class="magplus-social-icon">
						<a href="https://www.facebook.com/magplus" target="_blank"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.twitter.com/magplus/" target="_blank"><i class="fab fa-twitter"></i></a>
						<a href="https://www.linkedin.com/company/mag-" target="_blank"><i class="fab fa-linkedin-in"></i></a>
						<a href="https://www.youtube.com/user/magplus" target="_blank"><i class="fab fa-youtube"></i></a>
						</ul>
					</div><!-- /.footer-widget -->
				<!--</div><!-- /.col-md-3 -->
			<!--</div>--><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.footer-widget-wrapper -->
	<div class="footer-bottom">
		<div class="container">
			<div class="hytrr" >
				<p><span class="copy_rights_p">© 2019 mag+| All Rights Reserved.</p>
			</div><!-- /.pull-right -->
		</div><!-- /.container -->
	</div><!-- /.footer-bottom -->
</footer><!-- /.footer -->

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-angle-up"></span></div>

<script src="js/jquery.js"></script>




<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/jquery.bxslider.min.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
				jQuery( document ).ready(function() {	
					if (/*@cc_on!@*/true) { 						
						var ieclass = 'ie' + document.documentMode; 
						jQuery( ".popup-wrap" ).addClass(ieclass);
					} 
					jQuery( ".sticky-popup" ).addClass('sticky-popup-right');
					
					var contwidth = jQuery( ".popup-content" ).outerWidth()+2;      	
			      	jQuery( ".sticky-popup" ).css( "right", "-"+contwidth+"px" );

			      	jQuery( ".sticky-popup" ).css( "visibility", "visible" );

			      	jQuery('.sticky-popup').addClass("open_sticky_popup_right");
			      	jQuery('.sticky-popup').addClass("popup-content-bounce-in-right");
			      	
			        jQuery( ".popup-header" ).click(function() {
			        	if(jQuery('.sticky-popup').hasClass("open"))
			        	{
			        		jQuery('.sticky-popup').removeClass("open");
			        		jQuery( ".sticky-popup" ).css( "right", "-"+contwidth+"px" );
			        	}
			        	else
			        	{
			        		jQuery('.sticky-popup').addClass("open");
			          		jQuery( ".sticky-popup" ).css( "right", 0 );		
			        	}
			          
			        });		    
				});
			</script>
			<script  type ="text/javascript">
$(document).ready(function(){

$('#refresh').trigger('click');
});
</script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="build/js/intlTelInput.js"></script>



<script>
    $("#phone").intlTelInput({
       allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: "body",
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
       geoIpLookup: function(callback) {
         $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
           var countryCode = (resp && resp.country) ? resp.country : "";
           callback(countryCode);
         });
       },
        hiddenInput: "full_number",
       initialCountry: "auto",
       //localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
       separateDialCode: true,
      //utilsScript: "build/js/utils.js"
    });
  </script>
  <script>
  //$('#txtInput').on('input', function() {
    //return alert("Please check a checkbox ksd");
	//});
	
	
	$(document).ready(function(){
    $("#phone").change(function(){
        //$('#phone').val($('#phone').val()+currentURL;
		//$('#phone').val($('#phone').val('#phone'));
		//$('#phone').val($('#phone')).val($('#phone')));
		//$('#phone').val($('#phone')).val($('#phone'));
		//var ($("#phone")) = ($("#phone") + " " + $("#phone"));
		$("#phone").val($( "div.selected-dial-code" ).html()+" "+$('#phone').val());
		//var val1=parseInt($("#phone").val());
        //var val2=parseInt($("#phone").val());
                
          //      $("#TextBox3").val(val1 + val2);
	
		//alert("The text has been changed.");
    });
});

</script>
  <script>//$(document).ready(function(){setTimeout(function(){ var currentURL = window.location.href;$('#registration_url').val($('#registration_url').val()+currentURL );}, 3000); });</script>
  <script></script>
<script>
function init() {
var vidDefer = document.getElementsByTagName('iframe');
for (var i=0; i<vidDefer.length; i++) {
if(vidDefer[i].getAttribute('data-src')) {
vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
} } }
window.onload = init;

</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bb1a04c8a438d2b0cdfe079/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script> 
<script>
$num = $('.my-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
  $('.my-card:nth-child(' + $even + ')').addClass('active');
  $('.my-card:nth-child(' + $even + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $even + ')').next().addClass('next');
} else {
  $('.my-card:nth-child(' + $odd + ')').addClass('active');
  $('.my-card:nth-child(' + $odd + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $odd + ')').next().addClass('next');
}

$('.my-card').click(function() {
  $slide = $('.active').width();
  console.log($('.active').position().left);
  
  if ($(this).hasClass('next')) {
    $('.card-carousel').stop(false, true).animate({left: '-=' + $slide});
  } else if ($(this).hasClass('prev')) {
    $('.card-carousel').stop(false, true).animate({left: '+=' + $slide});
  }
  
  $(this).removeClass('prev next');
  $(this).siblings().removeClass('prev active next');
  
  $(this).addClass('active');
  $(this).prev().addClass('prev');
  $(this).next().addClass('next');
});


// Keyboard nav
$('html body').keydown(function(e) {
  if (e.keyCode == 37) { // left
    $('.active').prev().trigger('click');
  }
  else if (e.keyCode == 39) { // right
    $('.active').next().trigger('click');
  }
});
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.gallery.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#dg-container').gallery({
					autoplay	:	true
				});
			});
		</script/>
</body>
</html>