<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
	
	<?php get_sidebar(); ?>
	
	<div class="main main-one-sidebar" role="main">
		
		<h1><?php single_cat_title(); ?></h1>
		
		<table cellpadding="0" cellspacing="10" class="events-table sortable" >
			<thead>
				<tr>
					<th class="event-time" width="200">Date</th>
					<th class="event-description" width="250">Event</th>
					<th class="event-location" width="250">Location</th>
				</tr>
			</thead>
			<tbody>
			
			<?php 
			global $wp_query;
			
			$args = array(
				'meta_key' => 'event_start_date',
				'orderby' => 'meta_value',
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => 'event_end_date',
						'value' => current_time('timestamp'),
						'compare' => '>='
					)
				)
			);
			$args = array_merge( $wp_query->query, $args );
			$q = new WP_Query($args);
			if($q->have_posts()): while($q->have_posts()): $q->the_post(); 
				$date = get_post_meta($post->ID, 'event_start_date', true);
				$date_end = get_post_meta($post->ID, 'event_end_date', true);
				$address = get_post_meta($post->ID, 'event_address', true);
				$country = get_post_meta($post->ID, 'event_country', true);
				?>
				<tr>
					<td>
						<?php echo date( 'M j', $date ); ?>
						<?php echo (date('y-m-d', $date) != date('y-m-d', $date_end) ) ? ' - '. date( 'M j', $date_end ) : ''; ?>
					</td>
					<td>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</td>
					<td>
						<?php if( !empty($country) ){
							echo $address .', '. $country;
						}else{
							echo '<a href="http://www.magplus.com">Magplus.com</a>';
						} ?>
					</td>
				</tr>
			<?php endwhile; endif; wp_reset_postdata(); ?>
			</tbody>
		</table>
				
	</div>
</div>







<?php get_footer(); ?>