<?php 
/*
Template name: Dynamic Home Page
*/
?>




<?php get_header();?>

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,'script',

'https://connect.facebook.net/en_US/fbevents.js');


fbq('init', '987512781426904'); 

fbq('track', 'PageView');

</script>

<noscript>

<img height="1" width="1" 

src="https://www.facebook.com/tr?id=987512781426904&ev=PageView

&noscript=1"/>

</noscript>


<?php //new WP_Query( 'page_id=24697' );
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
<style type="text/css">
.contains {
    max-width: 960px;
    margin: 0 auto;
    float: none;
    padding: 0 20px;
}
.firstheight {
	height: 445px;
}
.magheading {
    text-align: center;
    text-transform: uppercase;
    font-size: 15px;
    color: #999;
}
.dwrap > div {
    float: left;
    width: 26%;
    font-size: 12px;
    margin-right: 40px;
    color: #827e7e;
    padding-right: 36px;
    font-family: Arial, sans-serif;
}
.dwrap:before, .dwrap:after {
    content: "";
}
.dwrap > div:last-child {
    padding-right: 0;
}
.main-dwrap {
	padding-top: 40px;
	padding-bottom: 40px;
    background-color: #E9E9E9;
}
.dwrap h3 {
    text-transform: uppercase;
    font-family: Arial, sans-serif;
    color: #909090;
    font-size: 19px;
    font-weight: 500;
    margin: 0;
    line-height: 3;
}
.dwrap ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
li.need-header {
    color: #849CD0;
    padding-left: 15px;
    position: relative;
}
li.need-header:after {
    content: "";
    position: absolute;
    width: 100%;
    height: 1.4px;
    left: 0;
    background-color: #849cd08c;
    top: 7px;
}
li.need-header span:after {
    content: "";
    width: 100%;
    height: 100%;
    background: #E9E9E9;
    position: absolute;
    z-index: -2;
    left: -4px;
    top: 0;
    padding-right: 20px;
    padding-left: 4px;
}
li.need-header span {
    position: relative;
    z-index: 2;
}
.dwrap > div ul li:nth-child(2) > ul {
    position: relative;
    padding-top: 10px;
}
.dwrap > div ul > li:nth-child(2) > ul:after {
    content: "";
    width: 1.3px;
    height: 15px;
    background-color: #849cd08c;
    position: absolute;
    top: -7px;
    right: 0;
}
.dwrap > div ul > li:nth-child(2) > ul:before {
    content: "";
    width: 1.3px;
    height: 15px;
    background-color: #849cd08c;
    position: absolute;
    top: -7px;
    left: 0;
}
.dwrap > div > ul {
    padding-top: 10px;
}
.dwrap > div ul li ul li img {
    max-width: 34px;
}
.dwrap > div ul li ul li:first-child {
    width: 35px;
    float: left;
    padding-right: 5px;
}
.dwrap > div ul li ul li:nth-child(2) {
    padding-top: 6px;
    padding-bottom: 13px;
}
.contains:before, .contains:after {
    content: "";
    clear: both;
    display: table;
}
ul.right-need {
    margin-top: 30px;
}

@media only screen and (max-width: 767px){
	.dwrap > div {
	    float: none;
	    width: 100%;
	    font-size: 12px;
	    color: #827e7e;
	    margin-bottom: 25px;
	}
}

</style>
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
	<div class="animation">
		<?php $hopost   = get_post( 29200 );
		$my_post_content = $hopost->post_content;
		$my_post_content = apply_filters('the_content', $my_post_content);
		$my_formatted_content = str_replace(']]>', ']]>', $my_post_content);
		echo $my_formatted_content;
		?>
	</div>
	<div class="clearfix"></div>
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
	    </div>
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
<script type="text/javascript">	
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