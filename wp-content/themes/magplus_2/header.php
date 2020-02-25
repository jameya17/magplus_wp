<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <title>
    <?php if(get_post_type() == 'event' && is_tax()) { echo 'Events -'; } ?>
    <?php wp_title('|', true, 'right'); ?> Magplus
    </title>
	<?php //wp_head(); ?>
	<?php include("includes/css-js.php"); ?> 
</head>

<body <?php body_class(); ?>>
<header class="header">
    <div class="header-wrap">
        <div class="header-pad clearfix">
            <a class="logo" href="?page_id=29200">
                <img class="logo" src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt="Megaplus Logo" title="Megaplus Logo">
            </a>

            <div class="icon-burger">
                <span class="burger-patty"></span>
                <span class="burger-patty"></span>
                <span class="burger-patty"></span>
            </div>

            <nav class="sticky-nav-tabs">
                <ul class="sticky-nav-tabs-container">
                    <li class="active services">
                        <a href="?page_id=22485" class="sticky-nav-tab">Services</a>
                        <ul class="sub-menu">
                            <li class="active"><a href="?page_id=9057" class="sticky-nav-tab" title="Creative Services">Creative Services</a></li>
                            <li><a href="javascript:void(0)" class="sticky-nav-tab" title="App submission">App submission</a></li>
                            <li><a href="javascript:void(0)" class="sticky-nav-tab" title="App Updation">App Updation</a></li> 
                        </ul>
                    </li>
                    <li class="support"><a href="?page_id=31668" class="sticky-nav-tab">Support</a></li>
                    <li><a href="?page_id=27659" class="sticky-nav-tab">Pricing</a></li>
                    <li><a href="?page_id=31672" class="sticky-nav-tab">MagPlus Pro</a></li>
                    <li><a class="btn" id="navLoginBtn" href="javascript:void(0)" data-fancybox="" data-animation-duration="700" data-src="#try-for-free-popup">Try for free</a></li>
                </ul>
            </nav>
        </div>
    </div>       
</header>
<?php //wp_body_open(); ?>

<!-- <div id="page" class="site"> -->

	<!-- <div id="content" class="site-content"> -->
