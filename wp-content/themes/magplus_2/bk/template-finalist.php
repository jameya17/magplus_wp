<?php
/*
Template name: Finalists
*/
get_header(); 

the_post();
// used in the finalist listing
$main_post = $post;

$winner = get_post_meta($post->ID, 'winner', true);

?> 


	<div class="wrapper group">
		<h1 class="landing-title"><?php echo get_post_meta($post->ID, '_alt_page_title', true); ?></h1>
		<div class="landing-content-wide2 entry">
			<?php 
			
			if($winner){
				the_content();
			}
			
			?>
		</div>
		
	</div>


<div id="content" class="content group wrapper">
	
	<div class="main main-full" role="main">
		
		<div class="contestants group">
			<?php 
			$args = array(
				'post_type' => 'page',
				'post_parent' => $post->ID
			);
			
			$poll = array(
				5307566,
				5307574,
				5307572
			);
			
			$i = 0;
			
			$winner = explode(',', $winner);
			
			$q = new WP_Query($args);
			if($q->have_posts()): while($q->have_posts()): $q->the_post();
				$vimeo_id = $post->post_excerpt;
				$video = 'http://player.vimeo.com/video/'. $vimeo_id .'?title=0&byline=0&portrait=0&color=ff9933';
				?>
				<div class="finalist eq-height finalist-<?php echo $i; ?>">
				
					<a href="<?php echo $video; ?>" class="head-img finalist-video colorbox-iframe">
						<?php the_post_thumbnail('full'); ?>
						<span class="play-icon">&nbsp;</span>
					</a>
					
					<h2><?php the_title(); ?></h2>
					<div class="post-meta">
					by <?php echo get_post_meta($post->ID, '_alt_page_title', true); ?>
					</div>
					
					<?php if(!empty($winner[0])): ?>
							
						<img src="<?php echo get_template_directory_uri(); ?>/images/Medal_<?php echo $winner[$i]; ?>.png" class="finalist-badge" alt="Place <?php echo $winner[$i]; ?>" />
						
					<?php else: ?>

						<div class="poll-wrap">
							<div class="alignleft">Vote: &nbsp;</div>
							<div id="pd_rating_holder_<?php echo $poll[$i]; ?>"></div>
							<script type="text/javascript">
							PDRTJS_settings_<?php echo $poll[$i]; ?> = {
								"id" : <?php echo $poll[$i]; ?>,
								"unique_id" : "default",  
								"title" : "",
								"permalink" : ""
							};
							</script>
						</div>
					<?php endif; ?>
					
					
					<div class="entry">
						<?php the_content(); ?>
						<?php
						
						ps_insert_social_buttons( array(
							'url' => get_permalink($main_post->ID), 
							'size' => 16,
							'title' => 'Vote for '. get_the_title() .' in Mag+ Creativity Contest!',
							'short_link' => $main_post->guid,
							'share_title_after' => '',
							'share_title_before' => ''
						)); ?>
						<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
					
				</div>
			<?php $i++; endwhile; endif; wp_reset_postdata(); ?>
			<script type="text/javascript" src="http://i.polldaddy.com/ratings/rating.js"></script>
		</div>
		
		
		<div class="finalist-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>