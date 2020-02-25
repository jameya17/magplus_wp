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

		
		
		
		
		
		<style>
#footer-sidebar1 {
float: left;
width: 23%;
    padding-left: 5px;
    padding-right: 5px;
}

#footer-sidebar2 {
float: left;
width: 23%;
    padding-left: 5px;
    padding-right: 5px;
}

#footer-sidebar3 {
float: left;
width: 23%;
    padding-left: 5px;
    padding-right: 5px;
}
#footer-sidebar4 {
float: left;
width: 23%;
    padding-left: 5px;
    padding-right: 5px;
}	

h3.widget-title1.widget-title-wht {
    color: #fff;
    font-weight: normal;
    font-size: 14px;
    text-transform: uppercase;
}


h3.widget-title3.widget-title-wht {
    color: #fff;
    font-weight: normal;
    font-size: 14px;
    text-transform: uppercase;
}

#footer-sidebar4 a:link {
    -webkit-tap-highlight-color: #8d8d8d;
	line-height: 20px;
}

#recent-posts-3 ul li {
    margin: 0;
    padding: 0;
    /*background: #fcf;*/
    margin: 0 0 8px 0;
    line-height: 20px;
    font-size: 14px;
    /*text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;*/
}
@media only screen and (max-width: 767px) {
/*.widget-title-wht:before {
    font-family: FontAwesome;
    content: "\f0d7";
    display: inline-block;
    padding-right: 7px;
    vertical-align: middle;
    margin-top: -2px;
    float: right;
    font-size: 30px;
}

.menu-footer-menu-company-container {display:none;}
.menu-legal-container {display:none;}
#recent-posts-3 ul {display:none;}*/




}


/*************************************************/
#menu-legal a:link {
    -webkit-tap-highlight-color: #8d8d8d;
	line-height: 20px;
}

#menu-legal a:hover {
    text-decoration: none;
    color: #ffffff;
}


#menu-legal a {
    text-decoration: none;
    color: #8d8d8d;
}
/*************************************************/
/*************************************************/
#menu-footer-menu-platform a:link {
    -webkit-tap-highlight-color: #8d8d8d;
	line-height: 20px;
}

#menu-footer-menu-platform a:hover {
    text-decoration: none;
    color: #ffffff;
}


#menu-footer-menu-platform a {
    text-decoration: none;
    color: #8d8d8d;
}
/*************************************************/
/*************************************************/
#menu-footer-menu-company a:link {
    -webkit-tap-highlight-color: #8d8d8d;
	line-height: 20px;
}

#menu-footer-menu-company a:hover {
    text-decoration: none;
    color: #ffffff;
}


#menu-footer-menu-company a {
    text-decoration: none;
    color: #8d8d8d;
}
/*************************************************/
/*************************************************/
#recent-posts-3 a:link {
    -webkit-tap-highlight-color: #8d8d8d;
	line-height: 20px;
}

#recent-posts-3 a:hover {
    text-decoration: none;
    color: #ffffff;
}


#recent-posts-3 a {
    text-decoration: none;
    color: #8d8d8d;
}

li.blog_footer_list {
    margin: 0;
    padding: 0;
    list-style: none;
    list-style-type: circle;
    margin-left: 10px;
    color: #ffffff;
}


/*************************************************/



.widget-title-wht {
    line-height: 30px;
}




@media only screen and (max-device-width: 480px) {

#footer-sidebar1 {
    width: 100%; 
}
#footer-sidebar2 {
    width: 100%; 
	    margin-top: 15px;
}
#footer-sidebar3 {
    width: 100%; 
	    margin-top: 15px;
}
#footer-sidebar4 {
    width: 100%; 
	    margin-top: 15px;
}




    }





		</style>
		
		
		<div id="footer-sidebar" class="secondary">
			<div class="menu-footer-menu-platform" id="footer-sidebar1">
			<?php
				if(is_active_sidebar('first-footer-widget-area')){
				dynamic_sidebar('first-footer-widget-area');
				}
			?>	
			</div>
			<div class="menu-footer-menu-platform" id="footer-sidebar2">
			<?php
				if(is_active_sidebar('second-footer-widget-area')){
				dynamic_sidebar('second-footer-widget-area');
				}
			?>
			</div>
			<div class="menu-footer-menu-platform" id="footer-sidebar3">
			<?php
				if(is_active_sidebar('third-footer-widget-area')){
				dynamic_sidebar('third-footer-widget-area');
				}
			?>
			</div>
			<div class="menu-footer-menu-platform" id="footer-sidebar4">
			<?php
				if(is_active_sidebar('fourth-footer-widget-area')){
				dynamic_sidebar('fourth-footer-widget-area');
				}
			?>
			</div>
		</div>
		
		
		
		
		
		
		
		
			
				
			
			
 		</div>
		
		
		
		
		<div class="footer-credit">
		
		<!--<div class="alignleft">
		<div class="f-social"> <a href="https://www.facebook.com/magplus" class="fa fa-facebook fa-lg" target="_blank"></a> <a href="https://www.twitter.com/magplus/" class="fa fa-twitter fa-lg" target="_blank"></a> <a href="https://www.linkedin.com/company/mag-" class="fa fa-linkedin fa-lg" target="_blank"></a> <a href="https://www.youtube.com/user/magplus" class="fa fa-youtube fa-lg" aria-hidden="true" target="_blank"></a></div>
		</div>-->
		
		<div class="alignright f-copy">© 2018 mag+. All rights reserved.</div>
		</div>
 		</div>
		<style>
		.footer_space{margin-bottom:20px;}
		html:not(.isMobile) footer .f-social {
    float: right;
    position: relative;
    /* top: 19px; */
    height: 30px;
    margin-top: 17px;
    padding-bottom: 20px;
}
html:not(.isMobile) footer .footer-credit .alignright {
    float: right;
    padding: 0 0 20px 0;
    margin-top: 45px;
}
		</style>
		<div class="footer_space">	&nbsp;</div>
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

/*
function init() {
var vidDefer = document.getElementsByTagName('iframe');
for (var i=0; i<vidDefer.length; i++) {
if(vidDefer[i].getAttribute('data-src')) {
vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
} } }
window.onload = init;*/

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


<script>
                 $(document).ready(function(){
                 setTimeout(function(){ 
                 var currentURL = window.location.href;
                 $('#sf_00N7F00000HNBcC').val($('#00N7F00000HNBcC').val());
                  }, 3000); 
                   });
</script>

<script type="text/javascript">
_linkedin_partner_id = "446033";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=446033&fmt=gif" />
</noscript>



</body>
</html>
