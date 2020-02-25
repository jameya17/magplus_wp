﻿<?php require_once(TEMPLATEPATH .'/head.php'); ?>
<style>
.vc_custom_1526465587991 {
    background-position: center bottom !important;
    background-repeat: no-repeat !important;
}
@media only screen and (max-width: 767px) {
.vc_custom_1526465587991{background-position: 0px 135px!important;  }
@media only screen and (max-width: 500px) {
.vc_custom_1526465587991{background-position: 0px 235px!important;  }
</style>
<?php
$spec_pages = explode(',', ps_settings('spec-menu', false));//array(8683, 8688);
$spec_pages_ignore = explode(',', ps_settings('spec-menu-ignore', false));
$is_spec = ( !is_page($spec_pages_ignore) && (is_page($spec_pages) || is_page_template('t-mag-html.php')) );
$is_my_magplus = (magplus_logged_in_check() &&
	(is_page(MY_MAGLUS_ID) || $post->post_parent == MY_MAGLUS_ID || isset($_GET['from_publish']) ) );
	?>
	<div id="top-bar-wrap" class="clr always-visible">
		<div id="top-bar2">			
			<!-- <div id="top-bar-social" class="clr top-bar-left">
				<a href="https://twitter.com" title="twitter" target="_blank"><span class="fa fa-twitter"></span></a>
				<a href="http://facebook.com" title="facebook" target="_blank"><span class="fa fa-facebook"></span></a>
				<a href="https://plus.google.com" title="google-plus" target="_blank"><span class="fa fa-google-plus"></span></a>
				<a href="https://www.instagram.com" title="instagram" target="_blank"><span class="fa fa-instagram"></span></a>
				<a href="https://www.youtube.com" title="youtube" target="_blank"><span class="fa fa-youtube"></span></a> 
			</div>-->
			<div id="top-bar-content" class="clr top-bar-right">
				
					<?php
					/************* The Nav state is controlled by Javascript to prevent issues from caching **********/
						/*$userli .= '<li class="support"><a href="https://support.magplus.com/hc/en-us" target="_top"><i class="fa fa-headphones"></i> Support</a></li>';
						$userli .= '|';
						$userli .= '<li class="signup aa"><a style="cursor: default;"><img src="https://www.magplus.com/wp-content/uploads/2011/10/US-flag.png" alt="United States" 
						style="  width: 20px;margin-bottom: 2px;"> +1 866-978-1008</a></li>';
						
						//$userli .= '|';*/
						if(magplus_logged_in_check()){
						//$userli = add_btn_mymag();
						//$userli .= '|';
						//$userli.='<li class="logout"><a href="'.MAGPLUS_LOGOUT.'" target="_top"><i class="fa fa-sign-out"></i>Logout</a></li>';
						$userli .='<ul class="auth-nav topmenu" style="display:none;"><div class="sign_login pull-right">
							<ul>
							<li><a href="https://www.magplus.com/signup/" target="_top">Download</a></li>
							<li>|</li>
							<li><a href="'.MAGPLUS_LOGOUT.'" target="_top"><!--<i class="fa fa-sign-out"></i>--> Logout</a></li>
							</ul>
                            </div>';
						//$userLoggedInCheck = 'logged-in ';
						}else{
							$userli .='<ul class="auth-nav topmenu" style="display:none;"><div class="sign_login pull-right">
							<ul>
							<li><a href="https://www.magplus.com/signup/" target="_top">Sign up</a></li>
							<li>|</li>
                            <li><a href="https://login.magplus.com/login" target="_top">Log in</a></li>
							</ul>
                            </div>';
						//$userli .= '<li class="sign_login"><a href="https://www.magplus.com/signup/" target="_top">Sign up</a>|<a   href="https://login.magplus.com/login" target="_top" style="color:#fff;">Log in</a></li>';
						//$userli .= '|';
						//$userli .= '<li class="login"><a href="https://www.magplus.com/signup/" target="_top"> Sign Up</a></li>';
						}

					//display log in/out button
					echo $userli;
					?>
				</ul>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div id="header_wrap">
		<!--[if lt IE 9]><p class="browsehappy badexperience"><span>For an optimal experience please update your browser.</span></p><![endif]-->
		<header class="header wrapper group">
			<?php if ( is_home() || is_front_page() ) $tag = 'h1'; else $tag = 'div'; ?>
			<<?php echo $tag; ?> id="logo">
			<a class="magplus-logo ir" href="<?php echo home_url( '/' ); ?>" <?php /*title="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" */ ?> rel="home" target="_top">
				<?php bloginfo('description'); ?>
			</a>
			
			</<?php echo $tag; ?>>

			<nav id="primaryNav" class="main-nav main-navigation <?= (magplus_logged_in_check()) ? 'loggedin' : false ?>">
			<div class="navigation-toggle"><div class="toggle-icon"></div></div>
			<div class="mobile-scrollpane">
					<?php					
						$wp_nav_menu = wp_nav_menu( array(
							'echo' => false,
							'container' => 'ul',
							'menu_id' => 'main-menu',
							'menu_class' => 'menu',
							'theme_location' => 'primary-menu' )
						);
			//rewrite links to open in top window for support site
						$wp_nav_menu = str_replace('<a','<a target="_top"',$wp_nav_menu);
						// Create  absolute links for relative links needed when on support.magplus
						$wp_nav_menu = str_replace('href="/','href="//'.$_SERVER['SERVER_NAME'].'/',$wp_nav_menu);
			//display main menu
						echo $wp_nav_menu;
						?>
				</div>
			</nav><!-- end #mainNav -->
		</header>

		<?php

		$usetype = $post->post_type;
		$querytype = $usetype;

		//My Magplus Header
		if($is_my_magplus){
			echo '<div id="subNav">';
			$fromPublish = isset($_GET['from_publish'])? ' from-publish' : '';
			wp_nav_menu( array( 'container' => 'ul', 'menu_id' => 'logged_in', 'menu_class' => 'wrapper'.$fromPublish, 'theme_location' => 'logged-in-menu' ) );
			echo '</div>';
		}
		// Uses Header
		else if($post->post_name == 'signup'){
			//dont render a subheader
		}
		
		else if($post->post_type == 'page' && $post->ID == '20501'){
		echo '<div id="subNav"> <ul class="wrapper use_types">				
								<li><a href="/software-uses/digital-magazines" data-taxid="20505" data-taxname="magazines">Magazines</a></li>
								<li><a href="/software-uses/sales-collateral" data-taxid="20581" data-taxname="software-usessales-collateral">Sales Materials</a></li>
								<li><a href="/software-uses/marketing-collateral" data-taxid="20627" data-taxname="software-usesmarketing-collateral">Marketing</a></li>
								<li><a href="/software-uses/custom-digital-brochures" data-taxid="20605" data-taxname="software-usescustom-digital-brochures">Guides &amp; Brochures</a></li>
								<li><a href="/software-uses/custom-digital-catalogs" data-taxid="20617" data-taxname="software-usescustom-digital-catalogs">Catalogs</a></li>
								<li><a href="/software-uses/internal-communications" data-taxid="20661" data-taxname="software-usesinternal-communications">Internal Communications</a></li>
								<li><a href="/software-uses/college-marketing" data-taxid="20499" data-taxname="software-usescollege-marketing">Universities</a></li>
								<li><a href="/software-uses/digital-agencies" data-taxid="20691" data-taxname="software-usesdigital-agencies">Agencies</a></li>
				</ul></div>';
		}
		
		
		
		else if($usetype=='use_types' || $usetype=='clients' || $usetype =='devices' || $usetype =='app_publishing'){

			echo '<div id="subNav"> <ul class="wrapper '.$usetype.'">';


			if($usetype =='clients'){ ?>
			<li><a href="../">All Clients</a></li>
			<?php
		}elseif($usetype !=='use_types'){?>
			<li><a href="../">Overview</a></li><?php
		}
		
	
		if($usetype =='clients'){
			$querytype  = 'use_types';
		}
		$args=array(
			'post_type' => $querytype ,
			'post_status' => 'publish',
			'posts_per_page' => -1,
			'orderby' => 'post_date',
			'caller_get_posts'=> 1
			);

		$my_query = null;
		$my_query = new WP_Query($args);
		//print_r($my_query );
		$count = count($my_query->posts);

		if( $my_query->have_posts() ) {
			while ($my_query->have_posts()) : $my_query->the_post(); 
			$URLprotocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
			//echo get_permalink()."  :::  ".$URLprotocol.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];

			$currenturl = $URLprotocol.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];

			if($currenturl === get_permalink() || (isset($_GET['filter']) &&$post->post_name == $_GET['filter'])){
				

				$activeClass='class="current_page_item"';
			}
			else{
				$activeClass='';
			}
		//echo ($posttype !='clients').' '.($post->post_name != 'agencies').'  '.$post->post_name ;
			if($post->post_name.$usetype!== 'agenciesclients'){
				?>
				<li <?= $activeClass ?>><a href="<?php the_permalink(); ?>" data-taxid="<?=$post->ID; ?>" data-taxname="<?=$post->post_name; ?>"><?php the_title(); ?></a></li>
				<?php  
			}
			endwhile;
		}

	  wp_reset_query();  // Restore global post data stomped by the_post().

	  echo '</ul></div>';
	}
	else{

		$isAFeature;

		if(get_page_template_slug($post->ID) == 'single-features.php'){
			$isAFeature = 1;
		}

	//Don't show subnav for Features;
		if(!$isAFeature && $post){

			subNav($post->ID);
		}
	}
	?>
</div><!-- end .header-wrap -->
