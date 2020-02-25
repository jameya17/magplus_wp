 </div><!-- end .container -->

 <?php
	// hide footer on some landing pages

 $meta = get_post_meta($post->ID, '_landing_meta', true);
 if(!isset($meta['footer'])): ?>
 <div id="fb-root"></div>
 <footer class="group wrapper" id="ajaxfooter">
 	<div class="content">
	<div class="more-links">
 		<div class="content">
 			<div class="search_n_social">
 				<div class="searchform-wrap">
 					<form role="search" method="get" id="searchform" class="searchform-popup" action="<?php echo home_url( '/' ); ?>">
 						<input type="text" name="s" id="s" value="<?php echo (isset($_GET['s'])) ? $_GET['s'] : ''; ?>" placeholder="&#128269"><br />
 						<div class="filter"><?php
 						$post_types = array(
 							'post' => 'Blog posts',
 							'video' => 'Videos',
 							'press' => 'Press'
 							);
 						foreach( $post_types as $post_type => $title ): 
 							?>
 						<label>
 							<input type="checkbox" name="post_type[]" value="<?php echo $post_type; ?>" <?php
 							if(isset($_GET['post_type']) && in_array($post_type, (array) $_GET['post_type'])) echo 'checked="checked"'; ?> />
 							<?php echo $title; ?>
 						</label>
 					<?php endforeach; ?></div><br>
 					<input type="submit" value="Search" class="secondary-button" />
 				</form>
 			</div>
 			<div class="f-social">
 				<a href="https://www.facebook.com/magplus" class="fa fa-facebook fa-lg" target="_blank"></a>
 				<a href="https://www.twitter.com/magplus/" class="fa fa-twitter fa-lg" target="_blank"></a>
 				<a href="https://plus.google.com/103733919000799766571" class="fa fa-google fa-lg" target="_blank"></a>
 				<a href="https://www.linkedin.com/company/mag-" class="fa fa-linkedin fa-lg" target="_blank"></a>
 				<a href="https://www.magplus.com/blog/" class="fa fa-rss fa-lg" target="_blank"></a>
 				
 			</div>
 		</div>

 		<?php 
 			$wp_nav_platform = wp_nav_menu( array(
 			'echo' => false,
 			'container' => 'ul',
 			'menu_class' => 'links platform',
 			'theme_location' => 'footer-menu-platform'
 			) ); 
 		

 			$wp_nav_company = wp_nav_menu( array(
 				'echo' => false,
 				'container' => 'ul',
 				'menu_class' => 'links company',
 				'theme_location' => 'footer-menu-company'
 				) ); 
 			
 			// Create  absolute links for relative links needed when on support.magplus
 			echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_platform);
 			echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_company);

 			?>
 				<div class="footer-credit">
 					<div class="alignright f-copy">&copy; <?php echo date('Y'); ?> Mag+. All rights reserved. <!--<span>  Site by <a href="http://www.theelixirhaus.com" target="_blank">The Elixir Haus</a></span>--></div>
 				</div>

 			</div>
 		</div>
 		<nav class="footer-nav">
 				<div class="content">
	 				<div class="more-info">
	 					More Info
	 				</div>
	 				<div class="buttons">
	 					<?php 
				 		$visible="";
				 		$marg="";
				 		
				 		if(defined('IS_ZENDESK_HEADER')){ 
				 			$visible ='style="visibility:hidden"';
				 			$marg='style="margin-left:118px; margin-right:0"';
			 			}
			 		?>
			 		<a class="secondary-button download" href="#" <?= $marg?>>Download The Tools</a>
					<a class="secondary-button contact" href="//<?=$_SERVER['SERVER_NAME']?>/contact-new/" <?= $visible?>>Contact Us</a>
	 				</div>
	 			</div>
 			</nav>
 		</div>
 	</footer>

 	<?php
 /*	$footer_scripts_textarea = get_post_meta($post->ID, 'page_footer_scripts', true);
 	if(isset($footer_scripts_textarea)){
 		echo $footer_scripts_textarea;
 	} */
 	?>

 <?php endif; // end landing page if ?>

 <div class="hide-left">
 	<?php #magplus_signup_form(); ?>
 	<?php #magplus_login_form(); ?>
 </div>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#async=1"></script>
 <?php
	//Include scripts from the page if there is any!
 wp_footer();
// show page load stats
 if(is_user_logged_in()): ?>
 <!-- <?php echo $wpdb->num_queries; ?> <?php _e('queries'); ?>. <?php timer_stop(1); ?> <?php _e('seconds'); ?> -->
<?php endif; ?>




		
<script>
	<? 
	if(isset($_GET['uncache'])){
		echo 'uncache=1';
	}
	?>
<? if($post->post_type == 'video'){ 
	$loggedstate = 'anonymous';
	if(mag_get_user_role()){
		$loggedstate = mag_get_user_role();
	}
	?>
	
<? } ?>
</script>

</body>
</html>
