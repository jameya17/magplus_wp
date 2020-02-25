<?php
/*
Template name: sidebar left
*/
get_header(); ?>

<div id="content" class="content group wrapper">
	
	<?php get_sidebar('left'); ?>  	
	<div class="main main-one-sidebar" role="main">
		<?php get_template_part( 'loop', 'page' ); ?>
	</div>

</div>
<?php get_footer(); ?>