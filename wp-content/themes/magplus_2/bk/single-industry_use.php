<?php
/*
Template name: Industry Use
*/
get_header(); 
the_post();


$visual_layout = get_field('visual_layout');

if($visual_layout == 'three'){
	$expl_1_img = get_field('expl_1_img');
	$expl_1_img  = $expl_1_img ['sizes']['medium'];

	$expl_2_img = get_field('expl_2_img');
	$expl_2_img  = $expl_2_img ['sizes']['medium'];


	$expl_3_img = get_field('expl_3_img');
	$expl_3_img  = $expl_3_img ['sizes']['medium'];
}
if($visual_layout == 'wide'){
	$wide_image = get_field('expls_img');
	$wide_image  = $wide_image ['sizes']['large'];
}
if($visual_layout == 'video'){
	$videoid= get_field('wide_video');
}

?>

<div id="content" class="content group wrapper industry-use">
	<div class="shadow-wrapper">	<div class="mbox">
	<nav class="sub-nav clearfix breadcrumbs"><a href="/customer-uses">Customer Examples</a> / <a href="/customer-uses/industries">Industries</a></nav>		
	<div class="mantle"><h1><?php the_title(); ?></h1>
   	<?php 

the_content(); ?>
   </div>



		<ul class="wide">
		<li>
			<? if($visual_layout == 'wide'):?>
				<div class="wide"><img src="<?= $wide_image ?>" /></div>
			<? endif;?>
			<? if($visual_layout == 'video'):?>
				<div class="video">
					<iframe width="100%" height="315" src="//www.youtube.com/embed/<?= $videoid ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<? endif;?>
		</li>
	</ul>
	<ul class="examples">
		<li>
			<? if($visual_layout == 'three'):?>
				<div class="thumb"><img src="<?= $expl_1_img ?>" /></div>
			<? endif;?>
			<h3><? the_field('expl_1_hdlne')?></h3>
			<p><? the_field('expl_1_copy')?></p>
		</li>
		<li>
			<? if($visual_layout == 'three'):?>
					<div class="thumb"><img src="<?= $expl_2_img ?>" /></div>
			<? endif;?>
			<h3><? the_field('expl_2_hdlne')?></h3>
			<p><? the_field('expl_2_copy')?></p>
		</li>
		<li>
			<? if($visual_layout == 'three'):?>
					<div class="thumb"><img src="<?= $expl_3_img ?>" /></div>
			<? endif;?>
			<h3><? the_field('expl_3_hdlne')?></h3>
			<p><? the_field('expl_3_copy')?></p>
		</li>
	</ul>
</div>
	<div class="uses">
		<div class="clmn">
			<? the_field('software_use_txt') ?>
			<h3>
				Check out real-life examples of Mag+ apps.
			</h3>
		
			<? get_template_part( 'content', 'software-select' ); ?>
		</div>
	</div>

 </div>


<?php get_footer(); ?>