<?php get_header(); ?>

<div id="content" class="content group wrapper">
	
	<?php get_sidebar('left'); ?>  
	
	<div class="main" role="main">
		<?php get_template_part( 'loop', 'page' ); ?>
	</div>
	
	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>