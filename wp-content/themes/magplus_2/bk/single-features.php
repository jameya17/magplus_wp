

<?php 
/*
Template name: Features w/ Carousel
if this file name changes, you need to chnage logic in header.php
*/


get_header();

the_post();
do_action('features_carousel');

$meta = get_post_meta($post->ID, '_landing_meta', true);
$title = get_post_meta($post->ID, '_alt_page_title', true);
$title_color = get_post_meta($post->ID, '_alt_page_title_color', true);
?>
<div id="loader" class="fadeIn"><em>Loading...</em></div>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/main.jpg" alt="Example" class="carcl-feat-image overview"/>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/monetizing.jpg" alt="Example" class="carcl-feat-image monetizing-content"/>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/content.jpg" alt="Example" class="carcl-feat-image creating-content"/>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/delivery.jpg" alt="Example" class="carcl-feat-image delivery-and-distribution"/>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/engaging.jpg" alt="Example" class="carcl-feat-image engaging-users"/>
<img src="https://d3qvq3btfltx1c.cloudfront.net/wp-content/themes/magplus_2/images/carousel-slides-feat/monetizing.jpg" alt="Example" class="carcl-feat-image monetizing-content"/>

<div class="subpage-mantle">
<div id="content" class="features">
	<div class="carcl-nav">
		<div class="carcl-container">
			<ul>
				<?php 
			
				
				$children = get_pages('parent=22179&sort_column=menu_order');

				foreach ($children as &$value) {
					


					//Create title of button
					$title = $value->post_title;
					$link = get_permalink($value->ID);
					if($title == 'All Features'){
						$title = 'Overview';

					}
					//Create title data-title
					$dataTitle = strtolower(str_replace(" ","-",$title));
					
				?>

				<li data-title='<?= $dataTitle ?>'><a href="<?= $link ?>" data-id='<?= $value->ID?>'><?= $title ?></a></li>
		
				<?php }?>
			</ul>
		</div>
	</div>	


	<div class="mantle showCarousel">
		<?php 
			//if on Features root page add the carousel. If not load later with Ajax
			if($post->ID == '22179'){
				include 'template-features-carousel.php';
			}
		?>
	</div>

</div>

<div class="wrapper">
	<div class="holder content fa_holder" style="padding-bottom: 0px !important;">
		<?php 
			//Added content of URL id subpage
			
			//Use the first word of the title to lable it's containing div
				$title = $post->post_title;

				$ancestor =  count(get_post_ancestors($post->ID));

				if($title=='All Features'){
					$title='overview';
				}

				$title = strtolower(str_replace(" ","-",$title));

				//don't render ot the page unless it's a subpage
				if($ancestor>0){
		?>
					<div class='<?= strtolower($title) ?> on'><div class="shadow-wrapper">		
						<?php include 'template-feature.php'; ?>
					</div></div>
				<?php } ?>
	</div>
</div></div>
<script>
var uncache = <? if(isset($_GET['uncache'])){ echo('"?uncache=true"');} else{ echo("''");} ?>;
var pg = "<?= $title ?>";
var loadseperate <?= $_GET[loadseperate] ? '=true' : false ?> ;
</script>

<?php get_footer(); ?>