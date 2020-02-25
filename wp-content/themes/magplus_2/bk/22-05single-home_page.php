<?php 
/*
Template name: Dynamic Home Page
*/

get_header();
//new WP_Query( 'page_id=24697' );
do_action('homepage');

$pgId='24697';
$post= get_post($pgId);

$meta = get_post_meta($post->ID, '_landing_meta', true);
$title = get_post_meta($post->ID, 'main_head', true);
$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
?>
<? /*
<video autoplay  poster="/images/hp-video.jpg" id="bgvid" loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->

<source src="/images/hp-video-test.mp4" type="video/mp4">
</video>
*/ 
?>
<div id="popularvideo" class="overlay">
	<div class="popup">
<div class="popupHeader">		
<h2 class="popupHeading">Steve Jobs Loves Popular Science+ on the iPad</h2>
		<a class="popUpclose" href="#">&times;</a>
</div>
		<div class="popUpContent">
			<div class="popupBody">
				<div class="embed-responsive embed-responsive-16by9">
			
			<video controls=”true” class="videoIframe embed-responsive-item" src="https://www.magplus.com/wp-content/uploads/2011/10/SteveLikesMag-4407t.mp4?rel=0"></video>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="hidden-xs"><?php putRevSlider('home_img', 'homepage'); ?></div>
<div class="visible-xs"><?php putRevSlider('home-mob', 'homepage'); ?></div>


	
<div class="home-page">


	<div class="mantle" style="opacity:0">
		<div class="container content">
			<div class="floater infographicmantle">
				<div class="column-l">
					<h1><? the_field('main_head'); ?></h1>
	
					<p><?= $post->post_content; ?></p>
					<div class="tour">
						<a href="#" class="btn-seeit">
							<em></em>
							<h3>See more</h3>
						</a>
					</div>
					<div class="carcl-publish"></div>
				</div>
			</div>
		</div>
	<div class="bgimage" style="opacity:0;background-image: url('<? $img=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); echo $img[0] ?>')"></div>
	
		
</div>

<div class="infoGraphic igbox-1">
		<canvas id="canvas1"   height="750" class="infographic1" style="visibility: hidden;  width:100%"></canvas>
		<div class="noanimation swipeable">
			
			
			<div class="slider">
				<div class="slide">
					<div class="floater">
						<header>
							<h2> <?= get_field('info1_title', $pgId)?></h2>
							<p><?= get_field('info1_descr', $pgId)?></p>
						</header>
					</div>
				</div>

				<div class="slide sl1">
					<div class="floater">
						<div class="arrow"> </div>
				
						<div class="content">
							<img src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/monitor.png" alt="">
							<h3><?= get_field('p1_title', $pgId)?></h3>
							<p><?= get_field('p1_descr', $pgId)?></p>
							<div class="bubble icon-magic"><span>Need help?</span><p><?= get_field('p1_bubble_descr')?></p>
							<p class="ss-ak"><?= get_field('p4_descr',$pgId)?></p></div>
						</div>
					</div>
				</div>
				
				<div class="slide sl2">
					<div class="floater">
						<div class="arrow"> </div>
						
						<div class="content">
							<img src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/devices.png" alt="">
							<h3><?= get_field('p2_title',$pgId)?></h3>
							<p><?= get_field('p2_descr', $pgId)?></p>
							<div class="bubble icon-24x7"><span>Need more features?</span><p><?= get_field('p2_bubble_descr',$pgId)?></p><p class="pointer1"><?= get_field('p5_descr',$pgId)?></p>
</div>
						</div>
					</div>
				</div>

				<div class="slide sl3">
					<div class="floater">
						<div class="arrow"> </div>
						<div class="content">
							<img src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/people.png" alt="">
							<h3><?= get_field('p3_title')?></h3>
							<p><?= get_field('p3_descr')?></p>
							<div class="bubble icon-gear"><span>Need a hand? </span><p><?= get_field('p3_bubble_descr',$pgId)?></p>
							<p class="pointer2"><?= get_field('p6_descr',$pgId)?></p></div>
						</div>
					</div>
				</div>
			</div>
		</div>

</div>
<div class="infoGraphic igbox-2">
	<div class="floater">
		<canvas id="canvas2"   height="580" class="infographic2" style="visibility: hidden;width:100%"></canvas>
		<div class="noanimation">
			<header>
				<h2>  <?= get_field('info2_title')?></h2>
				<p><?= get_field('info2_descr',$pgId)?></p>
			</header>
			<div class="img">
				<img class="horiz"  src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/our_tools.jpg" alt="">
				<img class="vert" src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/our_tools_v.jpg" alt="">
				<ul>
					<li>Your Content</li>
					<li>Our Software</li>
					<li>Your Mobile App</li>
				</ul>
			</div>
			<div><p><?= get_field('info2_overview',$pgId)?></p>
			<p class="platforms"><?= get_field('info2_platforms',$pgId)?><img src="<?php echo get_template_directory_uri(); ?>/images/infographics/mobile/platform-icons.jpg" alt=""></p></div>
		</div>
	</div >
</div>
<div class="igbox-3 companies-using">
	<div id="content" class="content floater group wrapper">
		<header><h2> <? the_field('comp_using_title',$pgId) ?></h2>
		<?= get_field('comp_using_descr',$pgId) ?>
		<strong><?= get_field('comp_using_cta') ?></strong></header>
	<div class="main main-full">
		<article id="clients" <?php post_class('group'); ?>>
			<h6 class="hidden">Mag+<!--Dont remove this its validate the page w3c--></h6>
			<ul id="clients-list" class="expandBox1"></ul>
	</article>
  
<a href="#" class="load-more"></a>   
    </div><!-- .main -->
    <div class="constraint">
    	<a class="secondary-button blue btn-usecases" href="<?= get_field('comp_using_link') ?>"><?= get_field('comp_using_link_txt') ?></a> 
	</div>
</div>
</div> 


<div class="igbox-4 infoGraphic start">
	<div class="floater">
		<div class="get-started">
			<header><h2> <? the_field('started_title') ?></h2></header>
			<ul>
				<li> <? the_field('c1_text') ?> <a href="<?= get_field('c1_link') ?>" class="btn-signup"><?= get_field('c1_link_text') ?></a> </li>
				<li> <? the_field('c2_text') ?>  <a href="<?= get_field('c2_link') ?>" class="btn-pricing"><?= get_field('c2_link_text') ?></a> </li>
			</ul>
		</div>
	</div>
</div>

</div>


<!-- .content -->


<script>
	
	<?php
		//Set sort var for passing to Ajax get URL 
		if($sort[1]){
			$sort = '?filter='.$sort[1];
		}
		else{
			$sort='';
		}
	?>
	var customer_uses = 'companies_using';
	var sort = '<?= $sort ?>';
	var clmns = 5;
    var numOfPosts= 0;

    <? // the below values are captured to be used within the canvas animamations */ ?>
    /*=================== Infographic 1 =================*/
    infoG1_title="<?= html_entity_decode(get_field('info1_title'))?>";
    infoG1_descr="<?= html_entity_decode(get_field('info1_descr'))?>";

    infoG1_p1_title="<?= html_entity_decode (get_field('p1_title'))?>";
    infoG1_p1_descr="<?= html_entity_decode (get_field('p1_descr'))?>";
    infoG1_p1_bub_descr="<?= html_entity_decode (get_field('p1_bubble_descr'))?>";

    infoG1_p2_title="<?= html_entity_decode(get_field('p2_title'))?>";
    infoG1_p2_descr="<?= html_entity_decode (get_field('p2_descr'))?>";
    infoG1_p2_bub_descr="<?= html_entity_decode (get_field('p2_bubble_descr'))?>";

    infoG1_p3_title="<?= html_entity_decode (get_field('p3_title'))?>";
    infoG1_p3_descr="<?= html_entity_decode (get_field('p3_descr'))?>";
    infoG1_p3_bub_descr="<?= html_entity_decode (get_field('p3_bubble_descr'))?>";

    /*=================== Infographic 2 =================*/
    infoG2_title="<?= html_entity_decode (get_field('info2_title'))?>";
    infoG2_descr="<?= html_entity_decode (get_field('info2_descr'))?>";
    infoG2_overview="<?= html_entity_decode (get_field('info2_overview'))?>";
    infoG2_platforms="<?= html_entity_decode (get_field('info2_platforms'))?>";


</script>


<?php get_footer(); ?>