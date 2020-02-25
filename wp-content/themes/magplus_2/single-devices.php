<?php
/*
Template name: Uses
*/
get_header(); 
the_post();

?>

<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient">
   <div  class="mantle" style="background: url('<?php the_field('device_img'); ?>') left bottom no-repeat;">
  <div class="content">
  <h1><?php the_field('mantle_headline'); ?></h1>
   <p><?php the_field('mantle_text'); ?></p>
</div>
  </div>
</div>  

	<section class="main-copy">
	 <?php the_content(); ?>
	</section>

	  <?php
	  	$pageLink = get_field('link_url');
		$pageLinkTxt = get_field('link_text');
	
		if(!$pageLinkTxt){ $pageLinkTxt="View More";}

		$window ="_self";

	

		if($pageLinkTxt && (strpos($pageLink ,'magplus.com') == false) && (strpos($pageLink ,'http') !== false)){
			$window ="_blank";
		}

		
	  ?>

	  <section class="app-example">
			<div class="mhalf valign">
				<div>
					<h3><?php the_field('prod_title'); ?></h3>
					<p><?php the_field('prod_text'); ?></p>
					<?php if($pageLink): ?>
						<a href="<?php echo $pageLink ?>" target="<?php echo $window ?>" <? if(strpos($pageLinkTxt,'Video') !== false): echo 'class="colorbox-iframe cboxElement"'; endif?> ><?php echo $pageLinkTxt ?></a>
					<?php endif ?>
				</div>
			</div>
			<?php 

			$prod_img = get_field('prod_img');
			$prod_img= $prod_img['sizes']['clients-thumb'];

			?>
	    	<div class="image"><img src="<?= $prod_img?>" alt="Product"></div>
	  </section>
 </div>

</div>

<?php get_footer(); ?>