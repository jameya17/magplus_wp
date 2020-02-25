<?php
/*
Template name: Mag+ HTML
*/
get_header(); 

$pageName = preg_replace('/[^a-z0-9-]+/', '', get_the_excerpt());
?>

<div id="content" class="content group wrapper <?=$pageName?>">
	<div class="shadow-wrapper">
    <?php include( TEMPLATEPATH .'/html/'. $pageName .'.php'); ?>
	</div>
</div>
<?php get_footer(); ?>