 </div><!-- end .container -->

 <?php
	// hide footer on some landing pages

 $meta = get_post_meta($post->ID, '_landing_meta', true);
 if(!isset($meta['footer'])): ?>
 <div id="fb-root"></div>
 <footer class="group wrapper">
 	<div class="content">
	<div class="more-link wrapper">
 		<div class="content">
 			<div class="search_n_social">
 				
 		</div>

 		<?php 
 			$wp_nav_platform = wp_nav_menu( array(
 			'echo' => false,
 			'container' => 'ul',
 			'menu_class' => 'links platform p-c',
 			'theme_location' => 'footer-menu-platform'
 			) ); 
 		?>
         <?php 
 			$wp_nav_legal = wp_nav_menu( array(
 			'echo' => false,
 			'container' => 'ul',
 			'menu_class' => 'links platform a-c',
 			'theme_location' => 'footer-menu-legal'
 			) ); 
 		?>
		<?php 
 			$wp_nav_company = wp_nav_menu( array(
 			'echo' => false,
 			'container' => 'ul',
 			'menu_class' => 'links platform c-c',
 			'theme_location' => 'footer-menu-company'
 			) ); 
 		
 			// Create  absolute links for relative links needed when on support.magplus
 			echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_platform);
			//echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_social);
 			echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_company);
			echo  str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_legal);

 			?>
			<div class="f-social"> 
                 <a href="https://www.facebook.com/magplus" class="fa fa-facebook fa-lg" target="_blank"></a>
 				<a href="https://www.twitter.com/magplus/" class="fa fa-twitter fa-lg" target="_blank"></a>
 				<!--<a href="https://plus.google.com/104209676879741356757" class="fa fa-google fa-lg" target="_blank"></a>-->
 				<a href="https://www.linkedin.com/company/mag-" class="fa fa-linkedin fa-lg" target="_blank"></a>
				<a href="https://www.youtube.com/user/magplus" class="fa fa-youtube fa-lg" aria-hidden="true" target="_blank"></a>
 				<!--<a href="https://www.magplus.com/blog/" class="fa fa-rss fa-lg" target="_blank"></a>-->
 				
 			</div>
 				<div class="footer-credit">
 					<div class="alignright f-copy">&copy; <?php echo date('Y'); ?> mag+. All rights reserved. <!--<span>  Site by <a href="http://www.theelixirhaus.com" target="_blank">The Elixir Haus</a></span>--></div>
 				</div>

 			</div>
 		</div>
 		</div>
 	</footer>
	
<script>
$('body').css({'padding-bottom': '0px'});
</script>
<!--
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5iLPKNiYZPg62K8aps1ZHseMzBwfQcnh";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>-->
<?php /*?>
 	<nav class="footer-nav">
 				<div class="content">
	 				<!-- <div class="more-info">
	 					More Info
	 				</div> -->
	 				<div class="buttons">
	 					<?php 
				 		$visible="";
				 		$marg="";
				 		
				 		if(defined('IS_ZENDESK_HEADER')){ 
				 			$visible ='style="visibility:hidden"';
				 			$marg='style="margin-left:118px; margin-right:0"';
			 			}
			 		?>
			 		
					<!--<a class="secondary-button download" href="//<?=$_SERVER['SERVER_NAME']?>/signup/" <?= $visible?>>Free Tool Download</a>
					<a class="secondary-button contact" href="//<?=$_SERVER['SERVER_NAME']?>/contact/" <?= $visible?>>Contact Us</a>-->
					
					<?php /*if(magplus_logged_in_check()){ ?>
					<?php echo '<a class="secondary-button download" href="https://www.magplus.com/my-magplus/">Free Tool Download</a>'; ?>
<?php echo '<a class="secondary-button pricing" style="margin-left:4px;" href="https://www.magplus.com/pricing">Pricing Options</a>'; ?>
					<?php echo '<a class="secondary-button contact" href="https://www.magplus.com/contact/" >Contact Us</a>'; ?>
					<?php }else{ ?>
					<?php echo '<a class="secondary-button download" href="https://login.magplus.com/login/">Free Tool Download</a>'; ?>
<?php echo '<a class="secondary-button pricing" style="margin-left:4px;" href="https://www.magplus.com/pricing">Pricing Options</a>'; ?>
					<?php echo '<a class="secondary-button contact" href="https://www.magplus.com/contact/" >Contact Us</a>'; ?>
					<?php } ?>
					
					
					
	 				</div>
	 			</div>
 			</nav>
			<?php */?>

 	<?php
 /*	$footer_scripts_textarea = get_post_meta($post->ID, 'page_footer_scripts', true);
 	if(isset($footer_scripts_textarea)){
 		echo $footer_scripts_textarea;
 	} */
 	?>
 <style type="text/css">
 .footer-nav {
    position: fixed;
    bottom: 0;
    z-index: 9999;
    width: 100%;
    background: #000;
    border-top: 2px solid #333;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.footer-nav .content {
    width: 1012px;
    margin: -3px auto 0;
    padding: 0;
    height: auto;
}
.footer-nav .buttons {
    float: right;
    font-size: .9em;
    position: relative;
    padding: 15px 0;
}
 </style>
<script>
	$("ul.links").on("click", function(){
	    $(this).hasClass("expand") ? $(this).removeClass("expand") : $(this).addClass("expand");
	    $("footer").css("background-color", "#3c3b3b");
	})

 //    $(".p-c").click(function(){
	//     $("#menu-footer-menu-platform").toggleClass("expand");
	// });
	// $(".c-c").click(function(){
	//     $("#menu-footer-menu-company").toggleClass("expand");
	// });
	// $(".a-c").click(function(){
	//     $("#menu-legal").toggleClass("expand");
	// });

/*$( document ).ready(function() {
	//alert(1);
	//debugger
var a = $("#d_olg").text();
if(a=="Download")
{
$(".jadoo").attr("href", "https://www.magplus.com/my-magplus/");
}
else
{
$(".jadoo").attr("href", "https://www.magplus.com/signup/");
}
   
});*/


</script>
 <?php endif; // end landing page if ?>

 <div class="hide-left">
 	<?php #magplus_signup_form(); ?>
 	<?php #magplus_login_form(); ?>
 </div>
 <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#async=1"></script>-->

<script>


function init() {
var vidDefer = document.getElementsByTagName('iframe');
for (var i=0; i<vidDefer.length; i++) {
if(vidDefer[i].getAttribute('data-src')) {
vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
} } }
window.onload = init;

</script>


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
