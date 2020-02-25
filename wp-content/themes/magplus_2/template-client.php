
<?php 
	/*
Template name: Ajax Template - Client
	*/

/*

This template is used for The homepage 'Companies useing Mag+', Software Uses Indexes, and the Clients' index. 

Software uses and Camplies uses have the same format for results, while Clients has another.

It Cahces results and checks it's cache once a day before making a query

*/

$sort =$_GET['filter'];

$uncache='';
if(isset($_GET['uncache'])){
$uncache = $_GET['uncache'];
}

$usecase="";
//Check if requesting "Uses" post type for Homepage or Software Uses section
if(isset($_GET['usecases'])){
	$usecase =$_GET['usecases'];
	$posttype='use_case';
	$filterkey = 'use_cat';
}
//Else get Client post types
else{
	$posttype='clients';
	$filterkey = 'use_type_cat';
}

//Allow unlimited results if using on homepage
if($usecase =='companies_using'){
	$usecase == -1;
}
else{
	$count = 12;
}

$args=array(
	'post_type' => $posttype,
	'post_status' => 'publish',
	'paged' =>get_query_var('paged'),
	'posts_per_page' => $count,
	'caller_get_posts'=> 1,
	'suppress_filters' => false,
	'meta_query' => array(),
);

//remove uncatagorized "ghost" examples from results
if($usecase && $usecase !='companies_using' && !$sort ){

	$meta_args = array(

	        'key' => 'takeaways',
        	'value' => 0,
        	'compare' => '>'
	    );
	
	array_push($args['meta_query'],$meta_args);

}


//Filter Query
if($sort){

	$meta_args = array(

        'key' => $filterkey,
        'value' => $sort,
        'compare' => 'LIKE'
    );

//If for hompage compamies sort by "include on homepage" cbeckbox 
	array_push($args['meta_query'],$meta_args);

};

if($usecase =='companies_using'){

		$meta_args = array(

	        'key' => 'hp_feature',
	        'value' => TRUE,
	        'compare' => 'LIKE'
	    );
	
	array_push($args['meta_query'],$meta_args);
}

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
$file = './cache-clients/result-'.$usecase.'-'.$posttype.'-'.$sort.'-'.$filterkey.'-'.get_query_var('paged').'.htm';

/* ------------------------------------------------------------------------
								Main Function
------------------------------------------------------------------------*/

function get_content($file,$url,$hours = 24,$fn = '',$fn_args = '', $uncache, $args,$posttype,$usecase) {

	$current_time = time(); 
	$expire_time = $hours * 60 * 60; 
	if(file_exists($file)){
		$file_time = filemtime($file);
	}
	else{
		$file_time=0;
	}


	/*----------------- Get Cached file if requirements are met ---------------*/
//	if((file_exists($file) && ($current_time - $expire_time < $file_time)) && (strlen($uncache)<1)) {
		if(file_exists($file) && (strlen($uncache)<1)) {
		//echo 'returning from cached file';
		return file_get_contents($file);
	}

	
	/*----------------- Create or uncache file if needed ---------------*/
	else {
		// Start Content buffer to collect contents for Cache

		//Query Results

		
		$my_query = new WP_Query($args);
	
		$count = 0;

		ob_start();

		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); 
			print_r($post);
			$count++ ;
			$divice = get_field('device');
			$rot = get_field('rot');

			//Get some additiona fields if being used on homepage
			if($usecase =='companies_using'){
				$logo = get_field('client_logo');
				$logo= $logo['sizes']['medium'];
				$catlink = get_field('client_logo');

				if($logo ==""){
					//$logo = 'http://www.magplus.dev/wp-content/uploads/2015/04/logo-famousfoot.png';
				}
			}

			//Get Client App info by client type ID results are for Uses 
			if(isset($posttype) && $posttype !='clients'){
				$appID = get_field('client_app');
				$appID =$appID[0];

				
				$app_img = get_field('app_image', $appID);
				$divice = get_field('device', $appID);
				$rot = get_field('rot', $appID);
				$apple_store ="";
				$google_store ="";
				$amazon_store ="";
			}
			//Get App info for Client if not for Uses
			else{

				$app_img = get_field('app_image');
				$divice = get_field('device');
				$rot = get_field('rot');
				$apple_store =get_field('apple_store');
				$google_store =get_field('google_store');
				$amazon_store =get_field('amazon_store');
			}

			//Setting this loads link in new window (instead of expanding frame)
			if(isset($_GET['datalink'])){
				$datalink= 'data-link="'.get_the_permalink().'"';
			}
			else{
				$datalink='';
			}
			

			//Figure out device template to use
			if(!$divice){
				$divice= 'tablet';
			}
			if(!$rot){
				$rot = 'vert';
			}

			if(isset($app_img)){
				
				//print_r($app_img['sizes']);
				$app_tmb= $app_img['sizes']['press-archive-sizes'];

				if($usecase == 'companies_using'){
					$app_img= $app_img['sizes']['clients-thumb'];
				}
				else{
					$app_img= $app_img['sizes']['medium'];
				}
			}

			//determine image shell
			$deviceImage = 'https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/clients-deviceFrame-'.$divice.'-'.$rot.'.png';
		?>

		<li class="client-item client-item-<?=$count?>" <?=$datalink?> >
			<div class="mute"></div>
			<a href="<?php the_permalink(); ?>" class="client-img  <?=$divice.' '.$rot ?>" title="<?php the_title_attribute(); ?>">
				<? if($usecase == 'companies_using'){
					//Output with logos for homepage		
					echo '<img class="app" src="'.$logo.'" >';
				}
				else{
					//Output with apps for other Clients and Customer Uses
					?>

				<div class="frame"><div class="device"></div><img class="app" src="<?=$app_tmb?>"></div></a>
			
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php  the_title(); ?> 
			</a></h2>
			<?php 
		
			echo substr(get_the_excerpt(),0,50)."...";
			?>
			<a href="<?php the_permalink(); ?>" class="btn-more"><?php _e('Read more', 'magplus_theme'); ?> &raquo;</a>
							<? }
			if(!$usecase || $usecase == 'companies_using'){

							?>

			<a href="#" class="btn-close" >Close</a>
			<article>
						<a href="#" class="btn-close" >X</a>
				<ul class="entry <?=$divice.' '.$rot ?>">
					<? if($app_img): ?>
					<li class="project-img">
						<div class='frame'>
							<img class="device" src="<?php /*bloginfo( 'template_url' );*/ echo $deviceImage; ?>" />
							<img class="app" src="" data-img="<?= $app_img ?>" style="opacity:0">
						</div>
						<img class="shadow" src="" data-shadow="<?php echo get_template_directory_uri(); ?>/images/clients-device-shadow.png">
					</li>
					<? endIf; ?>
		

					<li class="details  <? if(!$app_img) echo 'no-frame'; ?>">
						<div class="vfloat">
							<h3><?php  the_title(); ?></h3>
				
							<? if($usecase == 'companies_using'){

								 echo '<p>'.get_field('summary').'</p>';
								 $usetype = get_field('use_cat');
								 //print_r($usetype);
								 if(isset($usetype[0]->ID)){
									// echo '<a href="'.get_permalink($usetype[0]->ID).'">See more '.$usetype[0]->post_title.' &raquo;</a>';
									echo '<a href="/clients/"> See More Mag+ Clients &raquo;</a>';
								}
							}	
							else{
								the_content();
							?>
							<ul class="links">
								<!--<li>
									<div class="share"></div>
								</li>-->
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
							<?	}?>
						</div>
					</li>
				</ul>
			</article>

			<?}?>

		</li>
				
		<?php
			endwhile;
			} 
			file_put_contents($file, ob_get_contents());
			//ob_end_clean();
	}
}

	echo (get_content($file,$url,$hours = 72,$fn = '',$fn_args = '',$uncache,$args,$posttype,$usecase));