<?php
/*
Template name: Customer Uses
*/
get_header(); 
the_post();
//$terms = get_the_terms($post->ID, 'use_types');

?>

<div id="content" class="content group wrapper subpage-mantle">
	<div class="shadow-wrapper">
<div class="mbox mbox-gradient msupport ">

   <div  class="mantle" style="background: url('<?php $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>') left bottom no-repeat;">
  <div class="content">
  <h1><?php the_title(); ?></h1>
   <?php the_content(); ?>
</div>
  </div>
</div>  


	<div class="mbox right">
	 <div class="mhalf valign">
	    	<div>
	    		<h3>Mobile: Changing All Industries</h3>
	    		<p>
	    			The Mag+ app making software is the perfect solution for a number of industries who want to reach their clients, customers, or internal teams on the devices they use most. Our mobile app software is ideal for the hospitality industry, entertainment, marketing agencies, publishers, automotive and more.
	    		</p>	
	    		<a href="/customer-uses/industries/"  >View More »</a>
	    	</div>
	    </div>

	    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/images/custom_uses-industry.png" alt="Product"></div>

 	</div>


	<div class="mline"></div>

		<div class="mbox">
		 <div class="mhalf valign">
	    	<div>
	    		<h3>Customer App Examples</h3>
	    		<p>
	    			Join thousands of customers across different industries who use Mag+ to create and distribute mobile apps for Android, iOS and Kindle. Clients use the Mag+ software to create everything from event guides and sales support tools to internal communication apps and digital brochures.
	    		</p>	
	    		<a href="/customer-uses/software-uses/"  >View More »</a>
	    	</div>
	    </div>

	    <div class="image noshadow"><img src="<?php echo get_template_directory_uri(); ?>/images/custom_uses-software.png" alt="Product"></div>

 	</div>

</div>

<?php get_footer(); ?>