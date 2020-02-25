<?php
/*
Template name: In the media
*/
get_header(); ?>


<div id="content" class="content group wrapper">

	<?php get_sidebar('left'); ?>

	<div class="main main-one-sidebar" role="main">
		<h1><?php the_title(); ?></h1>


		<div class="in-the-media-wrap">
		<?php
		global $wp_query;
		$args = array(
			'post_type' => 'press',
			'pagename' => '',
			'posts_per_page' => 10,
			'paged' =>get_query_var('paged'),
			'tax_query' => array(
		        array (
		         'taxonomy' => 'press_cat',
		         'field' => 'slug',
		         'terms' => 'in-the-media'
		      	)
      		)

		);

		$my_query = null;
		$my_query = new WP_Query($args);
		$wp_query = $my_query;

		$i = 0;
		if($my_query->have_posts()): while ($my_query->have_posts()) : $my_query->the_post(); 
 			//print_r(query_posts( $args ));


		$terms = get_the_terms($post->ID, 'press_cat');

			$link = trim(get_post_meta($post->ID, '_press_url', true));
			if(!isset($link) || empty($link)) continue;
			if($i == 0){
				$i = 1;
			}else{
				$i = 0;
			}



			?>
			<a target="_blank" href="<?php echo $link; ?>" id="post-<?php the_ID(); ?>" <?php post_class('group in-the-media-list in-media-'. $i); ?>>


				<h2 class="entry-title">
						<?php the_title(); ?>
				</h2>


				<?php

				$content = get_the_content();
				echo str_ireplace('›', '', str_ireplace('Read the article', '', strip_tags($content, '')));
				?>

			</a>
		<?php endwhile; endif; ?>

		</div>

		<?php /* Display navigation to next/previous pages when applicable */
		if(function_exists('wp_pagenavi')){
			wp_pagenavi();
		}elseif (  $wp_query->max_num_pages > 1 ){
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>

	</div>

	<?php #get_sidebar('blog'); ?>
</div>







<?php 

get_footer(); ?>