<?php
/**********   Register sidebars   **********/

add_action( 'init', 'magplus_sidebars_init' );
function magplus_sidebars_init() {

	$default = array(
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'."\n",
		'after_widget' => '</aside>'
	);

	// SidebarRight
	register_sidebar( array_merge(
        array (
			'name' => 'Right sidebar',
			'id' => 'right-widget-area',
			'description' => 'The right sidebar'
		), (array) $default)
	);

	// sidebarLeft
	register_sidebar( array_merge(
        array (
			'name' => 'Left sidebar',
			'id' => 'left-widget-area',
			'description' => 'To the left of the content'
		), (array) $default)
	);
	
	// content
	register_sidebar( array_merge(
        array (
			'name' => 'Below content',
			'id' => 'below-widget-area',
			'description' => 'Below the content'
		), (array) $default)
	);
	
	// Home
	register_sidebar( array_merge(
        array (
			'name' => 'Home',
			'id' => 'home-widget-area',
			'description' => 'Uniqe for the frontpage'
		), (array) $default)
	);
	
	// blog
	register_sidebar( array_merge(
        array (
			'name' => 'The blog',
			'id' => 'blog-widget-area',
			'description' => 'blog page'
		), (array) $default)
	);


// blog
	register_sidebar( array_merge(
        array (
			'name' => 'The blog landing footer',
			'id' => 'bloglanding-widget-area',
			'description' => 'blog page'
		), (array) $default)
	);


	// Support Info
	register_sidebar( array_merge(
        array (
			'name' => 'Support Info',
			'id' => 'support-info-widget-area',
			'description' => 'support info page'
		), (array) $default)
	);
	
	
	// landing page 1
	register_sidebar( array_merge(
        array (
			'name' => 'Landingpage 1',
			'id' => 'landingpage-1-widget-area',
			'description' => 'An extra widget area for landingpages'
		), (array) $default)
	);
	
	// Landingpage 2
	register_sidebar( array_merge(
        array (
			'name' => 'Landingpage 2',
			'id' => 'landingpage-2-widget-area',
			'description' => 'An extra widget area for landingpages 2'
		), (array) $default)
	);
	
	
	/**************************************************/
	/*
	/* Tag page sidebars
	/*
	/**************************************************/
	// Tag page area 1
	register_sidebar( array_merge(
        array (
			'name' => 'Tag page area 1',
			'id' => 'tags-1-widget-area',
			'description' => 'An extra widget area for Tag page area 1'
		), (array) $default)
	);
	// Tag page area 2
	register_sidebar( array_merge(
        array (
			'name' => 'Tag page area 2',
			'id' => 'tags-2-widget-area',
			'description' => 'An extra widget area for Tag page area 2'
		), (array) $default)
	);
	// Tag page area 3
	register_sidebar( array_merge(
        array (
			'name' => 'Tag page area 3',
			'id' => 'tags-3-widget-area',
			'description' => 'An extra widget area for Tag page area 3'
		), (array) $default)
	);
	
	
}