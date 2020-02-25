<?php 

	the_post();
	get_header(); 

	$app_img = get_field('app_image');
	$divice = get_field('device');
	$rot = get_field('rot');
	$apple_store =get_field('apple_store');
	$google_store =get_field('google_store');
	$amazon_store =get_field('amazon_store');

	if(!$divice){
		$divice= 'tablet';
	}
	if(!$rot){
		$rot = 'vert';
	}


	if(count($app_img)<2){
		$app_img= 'https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/clients-default-app-'.$rot.'.png';
		$app_tmb = $app_img;
	}
	else{
		$app_tmb= $app_img['sizes']['press-archive-sizes'];
		$app_img= $app_img['sizes']['medium'];
	}

	//determine image shell
	$deviceImage = 'https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/clients-deviceFrame-'.$divice.'-'.$rot.'.png';


?>

<div id="content" class="content group wrapper">
	 
	<div class="main main-full" role="main">
		<article>
				<ul class="entry <?=$divice.' '.$rot ?>" >
					<li class="project-img">
						<div class='frame'>
							<img class="device" src="<?php /*bloginfo( 'template_url' );*/ echo $deviceImage; ?>" />
							<img class="app" src="<?= $app_img ?>">
						</div>
						<!--<img class="shadow" src="<?php echo get_template_directory_uri(); ?>/images/clients-device-shadow.png">-->
						
					</li>
					<li>
						<h1 class="entry-title bgfvghfv" ><?php  the_title(); ?></h1>
						<?php the_content(); ?>
						<ul class="links">
							<li>
								<!--<div class="share">
									<div class="addthis_toolbox addthis_default_style" >
										<div class="custom_images">
											<a class="addthis_button_more"></a>
										</div>
									</div>
								</div>-->
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
					</li>
				</ul>
			</article>
	</div>
</div>


<?php get_footer(); ?>