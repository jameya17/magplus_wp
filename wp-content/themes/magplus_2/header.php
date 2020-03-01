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
                <svg width="36px" height="35px" viewBox="0 0 36 35" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 63.1 (92452) - https://sketch.com -->
                    <title>Button / Close</title>
                    <desc>Created with Sketch.</desc>
                    <g id="Mobile" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                        <g id="Burger-Menu" transform="translate(-304.000000, -13.000000)" stroke="#FF8616" stroke-width="2.333">
                            <g id="Header" transform="translate(0.000000, 1.000000)">
                                <g id="Button-/-Close" transform="translate(306.020408, 13.500000)">
                                    <g id="Close">
                                        <path d="M32,16 C32,24.8365714 24.8365714,32 16,32 C7.16342857,32 0,24.8365714 0,16 C0,7.16342857 7.16342857,0 16,0 C24.8365714,0 32,7.16342857 32,16 Z" id="Stroke-1"></path>
                                        <line x1="9.33333333" y1="9.33333333" x2="23.3333333" y2="23.3333333" id="Stroke-3"></line>
                                        <line x1="23.3333333" y1="9.33333333" x2="9.33333333" y2="23.3333333" id="Stroke-5"></line>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
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
                    <li class="support">
                        <a href="?page_id=31668" class="sticky-nav-tab">Support</a>
                        <ul class="sub-menu mob-view">
                            <li class="active"><a href="?page_id=9057" class="sticky-nav-tab" title="Tutorials">Tutorials</a></li>
                            <li><a href="javascript:void(0)" class="sticky-nav-tab" title="Case Studies">Case Studies</a></li>
                            <li><a href="javascript:void(0)" class="sticky-nav-tab" title="Blogs">Blogs</a></li> 
                        </ul>
                    </li>
                    <li><a href="?page_id=27659" class="sticky-nav-tab">Pricing</a></li>
                    <li><a href="?page_id=31672" class="sticky-nav-tab">MagPlus Pro</a></li>
                    <li><a href="?page_id=31257" class="sticky-nav-tab mob-view">FAQs</a></li>
                    <li class="try-free-block">
                        <a class="btn" id="navLoginBtn" href="javascript:void(0)" data-fancybox="" data-animation-duration="700" data-src="#try-for-free-popup">Try for free</a>
                        <ul class="sidebar-listing follow-us-listing mob-view">
                            <li><a href="" title="Twitter"><img src="http://localhost/magplus_wp/wp-content/themes/magplus_2/images/icons/grey-twitter.svg" alt="Twitter"></a></li>
                            <li><a href="" title="facebook"><img src="http://localhost/magplus_wp/wp-content/themes/magplus_2/images/icons/grey-facebook.svg" alt="facebook"></a></li>
                            <li><a href="" title="Instagram"><img src="http://localhost/magplus_wp/wp-content/themes/magplus_2/images/icons/grey-instagram.svg" alt="Instagram"></a></li> 
                        </ul>    
                    </li>
                </ul>
            </nav>
        </div>
    </div>       
</header>
<?php //wp_body_open(); ?>

<!-- <div id="page" class="site"> -->

	<!-- <div id="content" class="site-content"> -->
