
<?php 
	/*
Template name: Ajax Template - Software Uses
	*/

$sort =$_GET['filter'];
//echo 'page id = '.$sort;

$args=array(
	  'post_type' => 'use_case',
	  'post_status' => 'publish',
	  'paged' =>get_query_var('paged'),
	  'posts_per_page' => 12,
	  'caller_get_posts'=> 1,
	  'suppress_filters' => false,
	  'meta_query' => array(),
	);



if($sort){
	$meta_args = array(

        'key' => 'use_type_cat',
        'value' => $sort,
        'compare' => 'LIKE'
    );

	array_push($args['meta_query'],$meta_args);
}

		$my_query = new WP_Query($args);
		//echo count($my_query->posts);
	//	print_r($my_query);
		$count = 0;

		if( $my_query->have_posts() ) {

			while ($my_query->have_posts()) : $my_query->the_post(); 

			$appID = get_field('client_app');
			$appID =$appID[0];

			$count++ ;
			$app_img = get_field('app_image', $appID);
			$divice = get_field('device', $appID);
			$rot = get_field('rot', $appID);
			$apple_store =get_field('apple_store');
			$google_store =get_field('google_store');
			$amazon_store =get_field('amazon_store');

		//print_r(get_field_object('use_type_cat'));
	
			if(!$divice){
				$divice= 'tablet';
			}
			if(!$rot){
				$rot = 'vert';
			}

			//print_r($app_img);
			if(count($app_img)<2){
				$app_img= '/wp-content/themes/magplus_2/images/clients-default-app-'.$rot.'.png';
				$app_tmb = $app_img;
			}
			else{
				$app_tmb= $app_img['sizes']['press-archive-sizes'];
				$app_img= $app_img['sizes']['medium'];
			}

			//determine image shell
			$deviceImage = '/images/clients-deviceFrame-'.$divice.'-'.$rot.'.png';
			
		?>

		<li class="client-item client-item-<?php echo $count; ?>" data-link="<?php the_permalink(); ?>">
			<div class="mute"></div>
			<a href="<?php the_permalink(); ?>" class="client-img  <?=$divice.' '.$rot ?>" title="<?php the_title_attribute(); ?>">
				<div class="frame"><div class="device"></div><img class="app" src="<?=$app_tmb?>"></div></a>
			
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php  the_title(); ?>
			</a></h2>
			<?php 
			echo substr(get_the_excerpt(),0,50)."...";
			?>
			<a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
			<a href="#" class="btn-close" >Close</a>
			<article>
						<a href="#" class="btn-close" >X</a>
				<ul class="entry <?=$divice.' '.$rot ?>">
					<li class="project-img">
						<div class='frame'>
							<img class="device" src="<?php bloginfo( 'template_url' ); echo $deviceImage; ?>" />
							<img class="app" src="" data-img="<?= $app_img ?>" style="opacity:0">
						</div>
						<img class="shadow" src="" data-shadow="<?php echo get_template_directory_uri(); ?>/images/clients-device-shadow.png">
						
					</li>
					<li class="details">
						<div class="vfloat">
							<h3><?php  the_title(); ?></h3>
							<?php the_content(); ?>
							<ul class="links">
								<li>
									<div class="share"></div>
								</li>
								<li class="stores">
								<?php if ($apple_store): ?>
									<a href="<?=$apple_store?>" target="_blank" class='store-apple'>Download on the Apple App Store</a>
								<?php endif; ?>
								<?php if ($google_store): ?>
									<a href="<?=$google_store?>" target="_blank" class='store-google'>Download on Google Play</a>
								<?php endif; ?>
								<?php if ($amazon_store): ?>
									<a href="<?=$amazon_store?>" target="_blank"  class='store-amazon'>Download on the Amazon</a>
								<?php endif; ?>
								<?php if (!$apple_store && !$google_store && !$amazon_store): ?>
									<div class='internal'>Internal App</div>
								<?php endif; ?>
								<li>
							</ul>
						</div>
					</li>
				</ul>
			</article>

		</li>
		
<?php 
	endwhile; 
}
?>
