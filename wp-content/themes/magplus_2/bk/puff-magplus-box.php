<?php
/*
Puff template: Mag+ box
*/

$style = "";
if(has_post_thumbnail()){
	$thumbnail = wp_get_attachment_image_src ( get_post_thumbnail_id ( $post->ID ), 'full');
	$style = 'style="background: url('. $thumbnail[0] .') no-repeat center"';
}

echo '<div class="magplus-box" '. $style .'>';
	
	/*
	if(has_post_thumbnail()){ 
		if(!empty($puff_link)) echo '<a class="colorbox-iframe" href="'. $puff_link .'" title="'. esc_attr(get_the_title($post->ID)) .'">';
			the_post_thumbnail();
		if(!empty($puff_link)) echo '</a>';
	}
	*/
	
	/*echo '<h2 class="magplus-box-title">';
		if(!empty($puff_link)) echo '<a href="'. $puff_link .'" title="'. esc_attr(get_the_title($post->ID)) .'">';
			the_title();
		if(!empty($puff_link)) echo '</a>';
	echo '</h2>';*/
	
	echo '<div class="puff-content">';
		the_content();
	echo '</div>';
	
	if(is_user_logged_in() && current_user_can('edit_post')){
		edit_post_link( __( 'Edit', 'ps_puffar_lang' ), '<span class="edit-puff-link">', '</span>', $post->ID );
	}
echo '</div>';