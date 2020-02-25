<?php
/*
Template name: App marketing
*/
get_header(); ?>

<div id="content" class="content group wrapper page-app-marketing">
	<div class="shadow-wrapper">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post();
				$firstTextarea = get_post_meta($post->ID, 'page_appmarketing_firstTextArea', true);
				$secondTitle = get_post_meta($post->ID, 'page_appmarketing_secondTitle', true);
				$secondTextarea = get_post_meta($post->ID, 'page_appmarketing_secondTextArea', true);

				echo '<div class="mbox-gradient mbox mbox-an-app-created">';
					echo wpautop($firstTextarea);
				echo '</div>';
				echo '<div class="mbox">';
					echo '<h2>'.wpautop($secondTitle).'</h2>';
					echo '<div id="app-marketing-tools-list">';
						echo wpautop($secondTextarea);
					echo '</div>';
				echo '</div>';

				edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' );
		endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>