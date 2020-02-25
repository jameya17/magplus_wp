<?php
/*
Template name: sidebar right
*/
get_header(); ?>

<div id="content" class="content group wrapper">
	
	<div class="main main-one-sidebar" role="main">
		<?php get_template_part( 'loop', 'page' ); ?>
	</div>
	
	<?php get_sidebar('right'); ?>  
	
</div>
<?php get_footer(); ?>