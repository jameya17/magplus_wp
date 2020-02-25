
<?php 

		$args=array(
		  'post_type' =>'clients',
		  'post_status' => 'publish',
		  'posts_per_page' => 12,
		  'caller_get_posts'=> 1,
		  	      )
		);
		$my_query = null;
		$my_query = new WP_Query($args);

		$count = 0;

		if( $my_query->have_posts() ) {

		while ($my_query->have_posts()) : $my_query->the_post(); 

		$count++ ?>
			<li class="client-item client-item-<?php echo $count; ?>">
				<a href="<?php the_permalink(); ?>" class="client-img" title="<?php the_title_attribute(); ?>">
				<?php if ( has_post_thumbnail() ) {
					echo the_post_thumbnail( "post-thumbnail" );
				} else { ?>
					<img src="<?php bloginfo( 'template_url' ); ?>/images/clients-default.png">
				<?php } ?></a>
				
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php echo the_title(); ?>
				</a></h2>
				<?php 
				echo substr(get_the_excerpt(),0,50)."...";
				?>
				<a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
				<a href="#" class="btn-close" >Close</a>
				<article>
						<img src="<?php bloginfo( 'template_url' ); ?>/images/clients-default.png">
						<?php the_excerpt(); ?>
				</article>

			</li>
			
		<?php endwhile;
			}
		?>
