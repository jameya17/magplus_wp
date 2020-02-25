<?php 
/*
Template name: Homepage
*/
get_header();
the_post();
$title = get_post_meta($post->ID, '_alt_page_title', true);
?>

<div class="landing-page group">
	<div class="top-shadow-wrap"><div class="top-shadow"></div></div>
	<div class="wrapper group">
		<h1 class="landing-page-title"><?php echo $title; ?></h1>
		<div class="landing-content-wrap">
			<div class="landing-page-content entry"> </div>
		</div>
		<div class="landing-page-img"><?php the_post_thumbnail('full'); ?></div>
	</div>
</div>
 
<!--
<div class="sales-area">
	<div class="top-shadow-wrap"><div class="top-shadow"></div></div>
	<div class="wrapper">
		<div class="sales-title"><?php the_excerpt(); ?></div>
		<div class="sales-content entry group"><?php the_content(); ?></div>
		<div class="sales-img"><?php the_post_thumbnail('full'); ?></div>
	</div>
</div>-->

<div class="wrapper">

	<div class="home-widgets group home-widgets-first" role="complementary">
		<?php dynamic_sidebar( 'left-widget-area' ); ?>
	</div><!-- end home-widgets-first -->
	
	<div class="home-widgets group home-widgets-second" role="complementary">
		<?php dynamic_sidebar( 'right-widget-area' ); ?>
	</div><!-- end .home-widgets-second -->
	
	<div class="home-widgets group home-widgets-third" role="complementary">
		<?php dynamic_sidebar( 'home-widget-area' ); ?>
	</div><!-- end .home-widgets-third -->

</div>


<?php get_footer(); ?>