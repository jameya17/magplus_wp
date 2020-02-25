<?php
/*
Puff template: Clean (no title)
*/
if(has_post_thumbnail()){ 
	if(!empty($puff_link)) echo '<a href="'. $puff_link .'" title="'. esc_attr(get_the_title($post->ID)) .'">';
		the_post_thumbnail();
	if(!empty($puff_link)) echo '</a>';
}

the_content();

if(is_user_logged_in() && current_user_can('edit_post')){
	edit_post_link( __( 'Edit', 'ps_puffar_lang' ), '<span class="edit-puff-link">', '</span>', $post->ID );
}