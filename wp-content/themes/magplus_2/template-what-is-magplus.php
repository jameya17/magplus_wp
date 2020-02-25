<?php
/*
Template name: What is Mag+
*/
get_header(); ?>



<div id="content" class="content group wrapper page-what-is-magplus">
	<div class="shadow-wrapper">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
			$firstTextarea = get_post_meta($post->ID, 'page_wimp_firstTextArea', true);
			$secondTextarea = get_post_meta($post->ID, 'page_wimp_secondTextArea', true);
			$thirdTextarea = get_post_meta($post->ID, 'page_wimp_thirdTextArea', true);
			$fourthTextarea = get_post_meta($post->ID, 'page_wimp_fourthTextArea', true);
			$fifthTextarea = get_post_meta($post->ID, 'page_wimp_fifthTextArea', true);
			$sixthTextarea = get_post_meta($post->ID, 'page_wimp_sixthTextArea', true);

			echo '<div class="mbox-gradient mbox mbox-an-app-created">';
				echo wpautop($firstTextarea);
			echo '</div>';
			echo '<div class="mbox">';
				echo wpautop($secondTextarea);
			echo '</div>';
			echo '<div class="mbox mbox-solid">';
				echo wpautop($thirdTextarea);
			echo '</div>';
			echo '<div class="mbox">';
				echo wpautop($fourthTextarea);
			echo '</div>';
			echo '<div class="mbox mbox-solid">';
				echo wpautop($fifthTextarea);
			echo '</div>';
			echo '<div class="mbox">';
				echo  apply_filters('the_content',$sixthTextarea);
			echo '</div>';

		edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' );
		endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>