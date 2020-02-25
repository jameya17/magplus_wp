<?php
/*
Puff template: Sales/landingpage 
*/
echo '<div class="puff-sales">';
if(has_post_thumbnail()){ 
	if(!empty($puff_link)) echo '<a href="'. $puff_link .'" title="'. esc_attr(get_the_title($post->ID)) .'">';
		the_post_thumbnail();
	if(!empty($puff_link)) echo '</a>';
}

echo '<h2 class="widget-title puff-title">';
	if(!empty($puff_link)) echo '<a href="'. $puff_link .'" title="'. esc_attr(get_the_title($post->ID)) .'">';
		the_title();
	if(!empty($puff_link)) echo '</a>';
echo '</h2>';

the_content();

echo '</div>';
if(is_user_logged_in() && current_user_can('edit_post')){
	edit_post_link( __( 'Edit', 'ps_puffar_lang' ), '<span class="edit-puff-link">', '</span>', $post->ID );
}