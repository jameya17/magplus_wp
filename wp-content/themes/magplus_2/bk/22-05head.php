<!DOCTYPE html>
 
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"   class="no-js"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
	<title>
	<?php if(get_post_type() == 'event' && is_tax()) { echo 'Events -'; } ?>
	<?php wp_title('|', true, 'right'); ?></title>

	<?
	//Custom no indexing

	if($post->post_type =="support-info"){ ?>
	<meta name="robots" content="noindex,follow" />
	<?}
	?>
<!--favicone-->
<link rel="icon" href="https://www.magplus.com/wp-content/uploads/2011/10/mps.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="https://www.magplus.com/wp-content/uploads/2011/10/mps.ico" type="image/x-icon" />	 
<!--favicone-->

 <!-- for Facebook --> 
	
	 
	 
	

	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:description" content="" />
	
 	
	<meta name="viewport" content="width=1024">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 

	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico">
	


	<?wp_head(); ?>
 
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5CJPV');</script>
<!-- End Google Tag Manager -->
 

</head>
<body <?php body_class(); if(defined('IS_ZENDESK_HEADER')){ echo ' id="zendeskHeader"';}?>>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF5CJPV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->






<?php if($post->post_title != 'Homepage - new'): ?>
<img src='<?php echo get_template_directory_uri(); ?>/images/og-image-logo-blk.png' alt="Logo" style="display:none" />
<?php endif; ?>

<?php if(get_post_type() == 'clients' && is_single()): ?>
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<?php endif; ?>
<div class="container group">
<?php
