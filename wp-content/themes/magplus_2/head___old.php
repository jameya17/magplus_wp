<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
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
	 
	<!-- for Facebook -->  
	<meta property="og:type" content="website" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="<?= 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
	<?php if($post->post_title == 'Homepage - new'): ?>
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>images/og-image-logo-blk.png" />
	<?php endif; ?>

	<!-- for Twitter -->          
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:description" content="" />
	
 	
	<meta name="viewport" content="width=1024">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 

	<link rel="shortcut icon" href="<?php bloginfo('url'); ?>/favicon.ico">
	
<!--
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-47083914-2', 'auto');
  ga('send', 'pageview');

</script>
	-->

	<?wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700" rel="stylesheet">


</head>
<body <?php body_class(); if(defined('IS_ZENDESK_HEADER')){ echo ' id="zendeskHeader"';}?>>
<?php if($post->post_title != 'Homepage - new'): ?>
<img src='<?php echo get_template_directory_uri(); ?>/images/og-image-logo-blk.png' alt="Logo" data="Logo for social posts" style="display:none" />
<?php endif; ?>

<?php if(get_post_type() == 'clients' && is_single()): ?>
	<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<?php endif; ?>
<div class="container group">

