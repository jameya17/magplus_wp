<?php
global $post;
$video = array('' => 'Latest');
$args = array(
	'post_type' => 'video',
	'posts_per_page' => -1
);
$q = new WP_Query($args);
if($q->have_posts()): while($q->have_posts()): $q->the_post();
	$video[$post->ID] = esc_attr($post->post_title);
endwhile; endif; wp_reset_postdata();


$magplus_options = array(

	array(
		'title' => 'Custom submenu',
		'desc' => 'Insert ID\'s to the posts that you want to have the new submenu',
		'type' => 'text',
		'id' => 'spec-menu'
	),
	array(
		'title' => 'Custom submenu ignore',
		'desc' => 'Insert ID\'s that noct should show up in the menu (html template only)',
		'type' => 'text',
		'id' => 'spec-menu-ignore'
	),

	array(
		'title' => 'Copyright text',
		'desc' => 'Copyright texten l&auml;ngst ner p&aring; alla sidor.',
		'type' => 'textarea',
		'id' => 'copy-text'
	),
	array(
		'title' => 'Featured video',
		'desc' => 'If the video archive page should show an featured video or the last.',
		'type' => 'dropdown',
		'id' => 'featured-video',
		'option' => $video
	),
	array(
		'title' => 'Default tag title',
		'desc' => 'Default title in the top',
		'type' => 'text',
		'id' => 'tag-default-title'
	),
	array(
		'title' => 'Default tag text',
		'desc' => 'Default text if no tag description exist',
		'type' => 'textarea',
		'id' => 'tag-default-text'
	),
	array(
		'title' => 'Tag extra text',
		'desc' => 'Extra HTML after each Tag description. E.g. an button ',
		'type' => 'textarea',
		'id' => 'tag-text'
	),
	array(
		'title' => 'Tag image',
		'desc' => 'Featured image for all tag pages',
		'type' => 'text',
		'id' => 'tag-image'
	),
	array(
		'title' => 'Tag light or dark default',
		'desc' => 'Is the background image light or dark?',
		'type' => 'dropdown',
		'option' => array('light' => 'Light', 'dark' => 'Dark'),
		'id' => 'tag_ld'
	),
	array(
		'title' => 'Number of tag widgets',
		'desc' => 'How rows of widgets?',
		'type' => 'dropdown',
		'option' => array(0=>0, 1=>1, 2=>2, 3=>3),
		'id' => 'nr-tag-rows'
	),
	array(
		'title' => 'Tag widgets row 1',
		'desc' => 'How many columns?',
		'type' => 'dropdown',
		'option' => array(1=>1, 2=>2, 3=>3, 4=>4),
		'id' => 'tag-widget-row-1'
	),
	array(
		'title' => 'Tag widgets row 2',
		'desc' => 'How many columns?',
		'type' => 'dropdown',
		'option' => array(1=>1, 2=>2, 3=>3, 4=>4),
		'id' => 'tag-widget-row-2'
	),
	array(
		'title' => 'Tag widgets row 3',
		'desc' => 'How many columns?',
		'type' => 'dropdown',
		'option' => array(1=>1, 2=>2, 3=>3, 4=>4),
		'id' => 'tag-widget-row-3'
	)
	/*
	array(
		'title' => 'Radio',
		'desc' => '',
		'type' => 'radio',
		'id' => 'radio1'
	),

	array(
		'title' => 'Checkbox',
		'desc' => '',
		'type' => 'checkbox',
		'id' => 'checkbox1'
	),
	*/

);
