<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InDesign plugin - Interactive Magazine InDesign, Create Online Publication </title>
<meta name="description" content="mag+ is an InDesign plugin to design, interactive magazine, distribute, and monetize content for any Device and App Store. Create online publication, Mobile magazine publishing, sales and marketing materials, brochures, catalogs, and more directly from mag+."/>
<meta name="keywords" content=" interactive magazine indesign, mobile magazine publishing, create online publication, indesign plugin  "/>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <!--  <link rel="manifest" href="img/favicon/manifest.json"> -->    
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/sticky-popup.css">
	<script src="js/modernizr.custom.js"></script>
	<link rel="stylesheet" href="build/css/intlTelInput.css">
	<link rel="icon" href="https://d3qvq3btfltx1c.cloudfront.net/wp-content/uploads/2018/06/19071845/mps-1.ico" type="image/x-icon"/> 
	<link rel="shortcut icon" href="https://d3qvq3btfltx1c.cloudfront.net/wp-content/uploads/2018/06/19071845/mps-1.ico" type="image/x-icon"/> 
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5CJPV');</script>





	
	
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

	
	
	
	
<style type="text/css">
			.sticky-popup .popup-header
			{
				
				background-color : #f66f03;		
										background-color : #2c5a85;		
						
		}
		.popup-title
		{
				
				color : #ffffff;		
					}
					.sticky-popup-right, .sticky-popup-left
			{
									top : 20%;		
							}
							
							
							/*.sticky-popup-right .popup-title {
    white-space: nowrap;
    display: block;
    padding: 8px;
    font-size: 16px;
    line-height: 15px;
    font-weight: normal;
    text-align: center;
    text-transform: capitalize;
    /*-ms-transform: rotate(20deg);
    -webkit-transform: rotate(20deg);
    transform: rotate(270deg);*/
    /*margin-top: 176px;
}*/
.sticky-popup-right .popup-title {
    /* writing-mode: tb-rl; */
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    /* white-space: nowrap; */
    writing-mode: tb-rl;
    font-size: 20px;
    padding-left: 18px;
}
.sticky-popup-right .popup-header {
    width: 35px;
    margin-top: 15%;
    float: left;
    height: 172px;
    border-radius: 4px 0 0 4px;
    padding: 0px;
}

.sticky-popup .popup-header {
    background-color: #e30613 !important;
}
.sticky-popup .popup-header {
    border: 0px solid #fff !important;
    border-radius: 0px !important;
}
.number-show{display:none;}


.CustControl {
    border-radius: 0px;
    /*padding: 13px 20px;*/
	background-color: transparent;
   border-bottom: 1px solid #000;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
	height: 50px;
}


.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 0px 0px;
    font-size: 16px;
    line-height: 1.42857143;
    color: #000;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 0px 0px rgba(0,0,0,0);
    box-shadow: inset 0 0px 0px rgba(0,0,0,0);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	 border-radius: 0px;
    /*padding: 13px 20px;*/
	background-color: transparent;
   border-bottom: 1px solid #000;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
	height: 50px;
}


.popup-content input, textarea, select {
    max-width: 100% !important;
}


.btn {
    width: 100%;
    /*border: 0px solid #ccc;
	width: 100%;
    border-radius: 30px;
    background: #e30613;
	color: #fff;*/
	border: 0px solid #ccc;
    width: 100%;
    border-radius: 0px;
    background: #e30613;
    color: #fff;
    height: 50px;
	font-size: 20px;
}

/*input#refresh {
    padding-right: 66px;
}*/

.sticky-popup-right .popup-content {
    width: auto;
    border-radius: 10px;
}
.popup-content-pad {
    padding: 15px;
}

.popup-content {
   width: 100%;
    max-width: 100%;
    overflow-x: hidden;
    overflow-y: auto;
    height: auto;
    background-color: transparent;
    border: 0px solid #e30714;
}
.p-0 {padding:0px;}
.mb-3 {
margin-bottom: 7px;
}
@media only screen and (min-width: 768px) {
.mr-4 {
padding-left: 10px;
}
}


.features-style-one .feature-style-content h3 {
    margin: 0;
    color: #150A33;
    font-size: 32px;
    line-height: 0px;
    margin-top: 12px;
    margin-bottom: 20px;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #000;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #000;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #000;
}	

</style>	
	
	
	
</head>
<body>
<?php $ipaddress = $_SERVER['REMOTE_ADDR']; ?>
<!--Popup TEST-->
<!--<div class="sticky-popup">
   <div class="popup-wrap">
      <div class="popup-header">
         <div class="popup-title">
            <p><span class="icon_ppo123"><!--<br>C<br>o<br>n<br>t<br>a<br>c<br>t<br> <br>U<br>s<br>-->CONTACT US</span></p>
            <!--<div class="popup-image"></div>
         </div>
      </div>
      <div class="popup-content">
         <div class="popup-content-pad">
   		<h4 style="color:#fff;">Leave your contact details & we will contact you shortly!</h4>
	<div class="formBlock p-4">
   <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" onsubmit=" return ValidCaptcha();">
      <input type="hidden" name="oid" value="00D7F000005CgsF">
	  <!--<input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Landing Page 3">-->
	<!-- <input type="hidden" id="registration_url" class="register-new-form-where" name="registration_url" value="Landing Page 3">
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
                    <span class="icon-bar clr_red"></span>
                    <span class="icon-bar clr_red"></span>
                    <span class="icon-bar clr_red"></span>
                </button>
                <a class="navbar-brand" href="https://www.magplus.com/">
                    <img src="images/logo.png" alt="Awesome Image" class="default-logo logo_mr">
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
					<li class="scrollToLink"> <a href="https://www.magplus.com/software-uses">USE CASES</a> </li>

                    <!--<li class="scrollToLink"> <a href="#">BLOG </a> </li>
					<li class="scrollToLink"> <a href="#">RESOURCES </a> </li>-->
                    <!-- <li class="scrollToLink"> 
                    	<a href="#blog">Blog</a> 
                    	<ul class="sub-menu">
                    		<li><a href="blog.html">Blog Listing</a></li>
                    		<li><a href="blog-details.html">Blog Details</a></li>
                    	</ul><!-- /.sub-menu 
                   	</li> -->
                   <!-- <li class="show-mobile"> <a href="https://www.magplus.com/signup-for-free-tool">TRY FOR FREE</a> </li>-->
                </ul>
                
            </div><!-- /.navbar-collapse -->
           <div class="right-side-box">
                <a href=" https://www.magplus.com/signup-for-adobe-indesign-plugin" class="sign-btn">TRY FOR FREE</a>
            </div><!-- /.right-side-box -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->


<div class="separator no-border mb40 full-width"></div><!-- /.separator no-border mb135 -->
<section class="features-style-one">
	<div class="container">	
		<div class="row">
			<div class="col-md-6 pull-right">
				<img src="images/w2.png" class="img_big jij" alt="">
				
			</div><!-- /.col-md-6 -->			
			<div class="col-md-6 clearfix pull-left">
			<div class="feature-style-content pt0 pl40">
					<h3><span class="bnr_1_spn">Bring Life to Your </span> <span class="bnr_1_spn2">Content</span></h3>
					<p class="bnr_p">mag+ is an Adobe InDesign plug-in that allows you to design, distribute, and monetize content for any device and app store! Create interactive digital publications, sales and marketing materials, brochures, catalogs, and more directly from InDesign. mag+ offers:</p>
					<!--<img src="images/13123124.png" class="" alt="">-->
					<div class="separator no-border mb20 full-width"></div>
				<div class="icon_space_2">	
					<div class="col-md-4 icon_div_1" ><p><img src="images/icon2.png" style="height: 50px; width: 50px;" class="" alt=""><br></p><p class="glyphicon123">Content Creation</p></div>
					<div class="col-md-4 icon_div_1" ><p><img src="images/icon3.png" style="height: 50px; width: 50px;"  class="" alt=""><br></p><p class="glyphicon123">App Delivery and Distribution</p></div>
					<div class="col-md-4 icon_div_1" ><p><img src="images/icon5.png"  style="height: 50px; width: 50px;"  class="" alt=""><br></p><p class="glyphicon123">User Engagement</p></div>
					<!--<div class="col-md-6 icon_div_1" ><p><img src="images/icon5.png" class="" alt=""><span class="glyphicon-class">glyphicon glyphicon-search</span></p></div>-->
					
					<div class="col-md-6 icon_div_1" >
					<div class="kskjd"><p></p>
					<p><img src="images/icon1.png"  style="height: 50px; width: 50px;" class="" alt=""><br></p><p class="glyphicon123">App Marketing and Analytics</p>
					</div>
					</div>
					<div class="col-md-6 icon_div_1" >
					<div class="kskjd"><p></p>
					<p><img src="images/icon4.png"  style="height: 50px; width: 50px;" class="" alt=""><br></p><p class="glyphicon123">Software Development Kit (SDK)</p>
					</div>
					</div>
				</div>	
				</div><!-- /.feature-style-content -->
				
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->	
	</div><!-- /.container -->
</section>



<section class="banner-static-two">
	<div class="container tdb_pad_1">	
		<div class="row">
			<div class="col-md-6 pull-right">
				<!--<img src="images/w2.png" class="img_big jij" alt="">-->
				<div class="separator no-border mb20 full-width"></div>
				<div class="separator no-border mb150 full-width"></div>
				<h3><span class="bnr_1_spn12345">Leave your </span> <span class="bnr_1_spn123456">contact</span> <span class="bnr_1_spn12345">contact details, and we will respond </span><span class="bnr_1_spn123456">shortly!</span></h3>
					<!--<p class="bnr_p"><span class="bnr_2_spn_p">With mag+, you get full creative control and flexibility in creating your content and a choice of distribution methods, including secure internal delivery and an array of engagement and marketing tools. Click below to see a full feature list or click the categories above to drill down into specific areas.</span></p>-->
				
			</div><!-- /.col-md-6 -->			
			<div class="col-md-6 clearfix pull-left">
			<div class="feature-style-content pt0 pl40">
					<!--<h3><span class="bnr_1_spn">Bring Life to Your</span> <span class="bnr_1_spn2">Content</span></h3>
					<p class="bnr_p">mag+ is an Adobe InDesign plugin to design, distribute, and monetize content for any Device and App Store! Create interactive digital publications, sales and marketing materials, brochures, catalogs, and more directly from InDesign.</p>
					<img src="images/13123124.png" class="" alt="">-->
					
					      <div class="popup-content">
         <div class="popup-content-pad">
   		<!--<h4 style="color:#fff;"><span class="contact_us_top">Contact Us</span></h4>--> 	
		<h3><span class="bnr_1_spn">Contact</span> <span class="bnr_1_spn2"> Us</span></h3>
		<hr>
	<div class="formBlock p-4">
   <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" onsubmit=" return ValidCaptcha();">
      <input type="hidden" name="oid" value="00D7F000005CgsF">
	  <!--<input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Landing Page 3">-->
	 <input type="hidden" id="registration_url" class="register-new-form-where" name="registration_url" value="Landing Page 4">
      <input  id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="<?php echo $ipaddress ?>" />
	  <input type="hidden" id="sf_Form_Name__c" class="w2linput hidden" name="Form_Name__c" value="Landing Page : Bring Life to Your Content">
      <input type="hidden" name="retURL" value="https://www.magplus.com/services/creative-services/creative-services-thank-you-4">
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
         <button class="btn submitBtn">Submit</button>
      </div>
   </form>
 
</div>
</div>
					
					
					
					
					<!--<div class="col-md-4 icon_div_1" >A</div><div class="col-md-4 icon_div_1" >B</div><div class="col-md-4 icon_div_1" >C</div>
					<div class="col-md-6 icon_div_1" >A</div>
					
					<div class="col-md-6 icon_div_1" >
					<div class="kskjd"><p></p>
					<p><span class="glyphicon-class">glyphicon glyphicon-search</span></div></p>
					</div>-->
					
				</div><!-- /.feature-style-content -->
				
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->	
	</div><!-- /.container -->
</section>












<!--
<section class="banner-static" id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="banner-content">
					<h3><span class="bnr_1_spn">Bring Life to Your Content</span></h3>
					<p><span class="bnr_1_spn_p">mag+ is a complete digital publishing solution to create, distribute, and monetize rich content on any device, anywhere.</span></p>
					<img src="images/mag-icon.png" alt="mag-icon" />
				</div><!-- /.banner-content -->
			<!--</div><!-- /.col-md-6 -->
			<!--<div class="col-md-6">
				<div class="banner-moc-box clearfix" >
					<img src="images/screen.png" alt="Awesome Image" class="pull-right">
				</div><!-- /.banner-moc-box -->
			<!--</div><!-- /.col-md-6 -->
		<!--</div><!-- /.row -->
	<!--</div><!-- /.container -->
<!--</section><!-- /.banner-static -->


<section class="banner-static-1" id="banner">
	<div class="container">
		<div class="row">
		<div class="banner-static-1_1"><div class="hytrr"><p><span class="iibanr_hd">Add Power to What You Design and Publish</span></p></div></div>
		
		<div class="separator no-border mb10 full-width"></div>

			<div class="col-md-8">
				<div class="banner-moc-box clearfix" >
<img src="images/yut.jpg" class="img_big2" alt="">
					<!--<img src="images/iPad.png" alt="Awesome Image" class="pull-right">-->
					<!--<div class="w3-content w3-section" style="max-width:500px">
						  <img class="mySlides" src="images/fsdfsd.png" style="width:100%">
						  <img class="mySlides" src="images/fsdfsd.png" style="width:100%">
						  <!--<img class="mySlides" src="images/iPad.png" style="width:100%">-->
					<!--</div>-->
				</div><!-- /.banner-moc-box -->
				<!--<div class="banner-content">
					<h3>Bring Life to Your Content</h3>
					<p>mag+ is a complete digital publishing solution to create, distribute, and monetize rich content on any device, anywhere.</p>
					<img src="images/mag-icon.png" alt="mag-icon" />
				</div>--><!-- /.banner-content -->
			</div><!-- /.col-md-6 -->
			<div class="col-md-4">
			<div class="banner-content">
				<div class="separator no-border mb90 full-width"></div><!-- /.separator no-border mb135 -->	
					<h3><span class="bnr_2_spn">Additional Design Navigation Options</span></h3>
				<div class="separator no-border mb10 full-width"></div>
					<p> <span class="bnr_2_spn_p">With mag+ apps, you’re never limited to simple swipe navigation. Create your own custom navigation bar or build documents that navigate with links, just like a website. The choice is always yours to include:
</span></p>
					<!--<img src="images/mag-icon.png" alt="mag-icon" />-->
<div class="separator no-border mb20 full-width"></div>
<!--<a href="#" class="button-link-red heartbeat ">Try For Free</a>-->
<p><span class="icon_ppo "><i class="fa fa-check"></i> Animation</span><span class="icon_ppo"><i class="fa fa-check"></i> Slideshows</span><span class="icon_ppo"><i class="fa fa-check"></i> Panning</span></p>
<p><span class="icon_ppo"><i class="fa fa-check"></i> Multiple Orientation Support</span><span class="icon_ppo"><i class="fa fa-check"></i> Overlays and Pop-Ups</span></p>







				</div>
				<!--<div class="banner-moc-box clearfix" >
					<img src="images/screen.png" alt="Awesome Image" class="pull-right">
				</div><!-- /.banner-moc-box -->
			</div><!-- /.col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.banner-static -->






<section class="home-content-top">

<div class="container tdb_pad_1">
    <div class="row">
	<div class="tdb_hading"><h3><span class="bnr_1_spn2">mag</span><span class="bnr_1_spn">+</span> <span class="bnr_1_spn">Design</span></h3></div>
	<div class="separator no-border mb20 full-width"></div>
	<div class="tdb_hading_rty"><p><span class="bnr_1_spn_r">Write the next chapter in publishing with a strong mobile business. mag+’s digital publishing software makes it easy and cost-effective to produce an app that delivers readers and revenue. Create a digital magazine to enhance your print content or build something new!
</span></p></div>
	
		<div class="col-md-12">

			<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs "  role="tablist">
						<li class="active">
							<a href="#tab_default_1" role="tab" data-toggle="tab">
							Design </a>
						</li>
						<li>
							<a href="#tab_default_2" role="tab" data-toggle="tab">
							Build & Distribute </a>
						</li>
						<li>
							<a href="#tab_default_3" role="tab" data-toggle="tab">
							Publish </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane  active" id="tab_default_1">
							
							
							<div class="col-md-6">
							<div class="center"><p><span class="bnr_1_spn_r123"> mag+ offers a powerful plug-in for Adobe InDesign, the world’s most popular design software. Your team can easily create interactive, multimedia layouts native for the touchscreen.</span></p><div class="separator no-border mb20 full-width"></div><a href="https://www.magplus.com/signup-for-adobe-indesign-plugin" class="button-link-red heartbeat ">Try For Free</a></div>
							</div>
							<div class="col-md-6"><img src="images/tab1.jpg" class="img_big2  jij" alt=""></div>
						</div>
						<div class="tab-pane " id="tab_default_2">
							<div class="col-md-6">
							<div class="center"><p><span class="bnr_1_spn_r123">Users consume your content via your mag+ app. Use our web tools to create a fully branded white-label app with analytics, messaging, and more for public or internal use.
</span></p><div class="separator no-border mb20 full-width"></div><a href="https://www.magplus.com/signup-for-adobe-indesign-plugin" class="button-link-red heartbeat ">Try For Free</a></div>
							</div>
							<div class="col-md-6"><img src="images/tab12.png" class="img_big2 jij" alt=""></div>
						</div>
						<div class="tab-pane " id="tab_default_3">
							<div class="col-md-6">
							<div class="center"><p><span class="bnr_1_spn_r123">Once your app is on your users’ devices, publishing your content—documents, issues, push notifications, or live feeds—is as simple as uploading a file and pushing a button.</span></p><div class="separator no-border mb20 full-width"></div><a href="https://www.magplus.com/signup-for-adobe-indesign-plugin" class="button-link-red heartbeat ">Try For Free</a></div>
							</div>
							<div class="col-md-6"><img src="images/tab13.jpg" class="img_big2 jij" alt=""></div>
						</div>
					</div>
				</div>
			</div>

			
		</div>
	</div>
</div>


 
</section>
<!--home-content-top ends here--> 







<!--<div class="separator no-border mt135 full-width"></div><!-- /.separator no-border mt135 -->



<!--<div class="separator no-border mb90 full-width"></div><!-- /.separator no-border mb135 -->

<section class="video-box">
	<div class="container text-center">
		<h3>One Platform. Happy Customers.</h3>
		<!--<img src="images/magplus-img/client/unliver.png" class="pull-right" alt=""><img src="images/magplus-img/client/volo.png" class="pull-right" alt=""><img src="images/magplus-img/client/schnider.png" class="pull-right" alt=""><img src="images/magplus-img/client/va.png" class="pull-right" alt=""><img src="images/magplus-img/client/united.png" class="pull-right" alt=""><img src="images/magplus-img/client/yark.png" class="pull-right" alt=""><img src="images/magplus-img/client/new-yark.png" class="pull-right" alt="">-->
		
		      <div id="clients">
        <div class="clients-wrap">
          <ul id="clients-list" class="clearfix">
            <li><img src="images/testlogo.png" alt="Black Ace"></li>
			<li><img src="images/magplus-img/client/unliver.png" alt=""></li>
			<li><img src="images/magplus-img/client/volo.png" alt=""></li>
			<li><img src="images/magplus-img/client/schnider.png" alt=""></li>
			<li><img src="images/magplus-img/client/va.png" alt=""></li>
			<li><img src="images/magplus-img/client/united.png" alt=""></li>
			<li><img src="images/magplus-img/client/yark.png" alt=""></li>
			<li><img src="images/magplus-img/client/new-yark.png" alt=""></li>
            
			
          </ul>
        </div><!-- @end .clients-wrap -->
<div class="separator no-border mb20 full-width"></div>
<!--<a href="#" class="button-link-red heartbeat ">See What People Build With mag+.</a>-->
      </div><!-- @end #clients -->

		
	</div><!-- /.container text-center -->
	
	
</section><!-- /.video-box -->



<footer class="footer">
	
	<div class="footer-widget-wrapper">
		<div class="container">
			<div class="row masonary-layout">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="footer-widget about-widget">
						<h5><span class="footer_hd">COMPANY INFO :</span></h5>
							
							<a class="footerlink_1" href="https://www.magplus.com/about/">About Us</a> |
							<a class="footerlink_1" href="https://www.mpslimited.com/events/">Events </a> |	
							<a class="footerlink_1" href="https://www.magplus.com/blog/">Blog</a> |
							<a class="footerlink_1" href="https://www.magplus.com/press/">Press</a> |
							<a class="footerlink_1" href="https://www.magplus.com/contact">Contact Us</a> |	
							<a class="footerlink_1" href="https://support.magplus.com/hc/en-us">Support</a>
							
					</div>
					
					<div style="margin-top: 24px;" class="footer-widget contact-widget">
						<h5><span class="footer_hd">LEGAL :</span></h5>
							<a class="footerlink_1"  href="https://www.magplus.com/legal/privacy-policy/">Privacy Policy</a> |
							<a class="footerlink_1" href="https://www.magplus.com/legal/conditions-of-use/">Conditions of Use</a> |	
							<a class="footerlink_1" href="https://www.magplus.com/legal/eula/">Publisher End User License Agreement</a> 
					</div>
					
					
					<!-- /.footer-widget -->
				</div><!-- /.col-md-3 -->
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="footer-widget contact-widget">
						<div style="text-align: right;" class="pull-right right-content copy-right" >
						<a href="https://www.facebook.com/magplus"><img border="0" alt="" src="images/fb.png" width="25" height="25"></a>
						<a href="https://www.linkedin.com/company/magplus/"><img border="0" alt="" src="images/Linkedin.png" width="25" height="25"></a>
						<a href="https://twitter.com/magplus/"><img border="0" alt="" src="images/Twitter.png" width="25" height="25"></a>
						<a href="https://www.youtube.com/user/magplus"><img border="0" alt="" src="images/youtube_PNG15.png" width="25" height="25"></a>
							<p>© 2018 mag+. All rights reserved</p>
						</div>
						
							
					</div><!-- /.footer-widget -->
				</div><!-- /.col-md-3 -->
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
			<p><span class="footer_hidn">&nbsp;&nbsp;&nbsp;</span></p></div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.footer-widget-wrapper -->
	<div class="footer-bottom">
		<div class="container">
			<!--<div class="pull-right right-content copy-right" >
				<!--<p>© 2018 mag+. All rights reserved</p>-->
			<!--</div><!-- /.pull-right -->
		</div><!-- /.container -->
	</div><!-- /.footer-bottom -->
</footer><!-- /.footer -->
<!--<div class="wpb_wrapper footer_div"><div style="height: 32px; padding: 5px; max-width: 1000px; margin:0 auto;" class="w-btn-wrapper text-center text-md-right text-lg-right text-xl-right"><a style="background-color:#e30514;" class="w-btn style_raised size_medium color_primary icon_none" href="/request-demo/" data-wpel-link="internal"><span class="w-btn-label">Request Demo</span><span class="ripple-container"></span></a> <a style="background-color:#e30514;" class="w-btn style_raised size_medium color_primary icon_none" href="/contact-us/" data-wpel-link="internal"><span class="w-btn-label">Contact Us</span><span class="ripple-container"></span></a></div></div>-->
<!--<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-angle-up"></span></div>-->

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
<script>
$(function(){
 // vars for clients list carousel
  // http://stackoverflow.com/questions/6759494/jquery-function-definition-in-a-carousel-script
  var $clientcarousel = $('#clients-list');
  var clients = $clientcarousel.children().length;
  var clientwidth = (clients * 220); // 140px width for each client item 
  $clientcarousel.css('width',clientwidth);
  
  var rotating = true;
  var clientspeed = 1000;
  var seeclients = setInterval(rotateClients, clientspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = false; // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#clients');
  
  function rotateClients() {
    if(rotating != false) {
      var $first = $('#clients-list li:first');
      $first.animate({ 'margin-left': '-220px' }, 1000, "linear", function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#clients-list li:last').after($first);
      });
    }
  }
});

</script>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<style>
.mySlides {display:none;}
</style>
<script>
$('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
		var $old_tab = $($(e.target).attr("href"));
		var $new_tab = $($(e.relatedTarget).attr("href"));

		if($new_tab.index() < $old_tab.index()){
			$old_tab.css('position', 'relative').css("right", "0").show();
			$old_tab.animate({"right":"-100%"}, 300, function () {
				$old_tab.css("right", 0).removeAttr("style");
			});
		}
		else {
			$old_tab.css('position', 'relative').css("left", "0").show();
			$old_tab.animate({"left":"-100%"}, 300, function () {
				$old_tab.css("left", 0).removeAttr("style");
			});
		}
	});

	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
		var $new_tab = $($(e.target).attr("href"));
		var $old_tab = $($(e.relatedTarget).attr("href"));

		if($new_tab.index() > $old_tab.index()){
			$new_tab.css('position', 'relative').css("right", "-2500px");
			$new_tab.animate({"right":"0"}, 500);
		}
		else {
			$new_tab.css('position', 'relative').css("left", "-2500px");
			$new_tab.animate({"left":"0"}, 500);
		}
	});

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		// your code on active tab shown
	});
	
	// default bootstrap click, apenas muda com ação do utilizador
//$('#myTab a').click(function (e) {
//  e.preventDefault()
//  $(this).tab('show')
//})

// Tab-Pane change function
    var tabChange = function(){
        var tabs = $('.nav-tabs > li');
        var active = tabs.filter('.active');
        var next = active.next('li').length? active.next('li').find('a') : tabs.filter(':first-child').find('a');
        // Bootsrap tab show, para ativar a tab
        next.tab('show')
    }
    // Tab Cycle function
    var tabCycle = setInterval(tabChange, 8000)
    // Tab click event handler
    $(function(){
        $('.nav-tabs a').click(function(e) {
            e.preventDefault();
            // Parar o loop
            clearInterval(tabCycle);
            // mosta o tab clicado, default bootstrap
            $(this).tab('show')
            // Inicia o ciclo outra vez
            setTimeout(function(){
                tabCycle = setInterval(tabChange, 10000)//quando recomeça assume este timing
            }, 10000);
        });
    });
	
</script>
</body>
</html>