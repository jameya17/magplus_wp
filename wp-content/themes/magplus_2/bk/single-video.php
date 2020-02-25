<?php get_header(); ?>

<style>
aside#archives-3 {
    display: none;
}
iframe {
    border: 0;
}

</style>

<div id="content" class="content group wrapper"> 
	
	<div class="main main-one-sidebar" role="main">
	
		<?php if(have_posts()): while(have_posts()): the_post();
			
			$video_id = get_post_meta($post->ID, '_mag_video_id', true);
			$service = get_post_meta($post->ID, '_mag_video_service', true);
			
			if($service == 'vimeo'){
				$video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
			}elseif($service == 'youtube'){
				$video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
			}
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
				<div>
					<p>
						<iframe src="<?php echo $video; ?>" style="width:100%;max-width:720px;height:400px;"></iframe>
					</p>
					
					<?php the_content();
					custom_tag_text_position( array(
					'id' => $post->ID,
					'prefix' => '<p>',
					'suffix' => '</p>'
				));
					
					 ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
				
				<p><strong>Share with your friends!</strong></p>
				<?php ps_insert_social_buttons( array('icons' => false) ); ?>
				
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		<div class="v-sep"></div>
		<?php comments_template( '', true ); ?>
		<div id="pingbacks">
			<?php // DisplayPingTrackbacks(); ?>
		</div>
	</div>

	<?php //get_sidebar('video'); ?>
</div>




<?php get_footer(); ?>