<?php get_header(); ?>


<div id="content" class="content group wrapper"> 
		<div class="shadow-wrapper">
	<div class="main main-blog main-one-sidebar" role="main">
	
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
				<header class="entry-header">
					<nav class="sub-nav clearfix breadcrumbs"><a href="/customer-uses">Customer Examples</a> / <a href="/customer-uses/software-uses">Software Uses</a> / <a href="/customer-uses/publishing">Publishing</a></nav>		
					<h1 class="entry-title">
						<?php the_title(); ?>
					</h1>
			
				</header><!-- .entry-header -->
			
				<div class="entry-content">
					<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
					<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-content -->
							
			</article><!-- post_class -->
		<?php endwhile; endif; ?>
		
	
	</div>
	<div class="use-case-sidebar">
		<div class="takeaways">
			<h2> Key Takeaways </h2>
			<?= get_field('takeaways') ?>

			<? 

			$wp =get_field('white_paper');
			$cs =get_field('case_study');
			$tut =get_field('tut');
			
			if( $wp || $cs ){ ?>
			<ul class="downloads">
				<? if($wp) {?><li><a href="<?=$wp; ?>" class="wp">White Paper</a></li><?}?>
				<? if($cs) {?><li><a href="<?=$cs;?>" class="sc">Case Study</a></li><?}?>
				<? if($tut) {?><li><a href="<?=$tut;?>" class="tut">Tutorial</a></li><?}?>
			</ul>
			<?}?>
		</div>

		<?
		$appID = get_field('client_app');
		$appID =$appID[0];
		$apple_store =get_field('apple_store', $appID);
		$google_store =get_field('google_store', $appID);
		$amazon_store =get_field('amazon_store', $appID);

		$haslinks= $amazon_store.$google_store.$apple_store;

		if($haslinks){
		?>
		<ul class="links stores">
			<?php if ($apple_store): ?>
			<li ><a href="<?=$apple_store?>" target="_blank" class='store-apple'>Download on the Apple App Store</a></li>
			<?php endif; ?>
			<?php if ($google_store): ?>
			<li ><a href="<?=$google_store?>" target="_blank" class='store-google'>Get it on Google Play</a></li>
			<?php endif; ?>
			<?php if ($amazon_store): ?>
			<li ><a href="<?=$apple_store?>" target="_blank" class='store-amazon'>Download on Amazon</a></li>
			<?php endif; ?>
		</ul>
		<?}?>
		<div class="share">
			<div class="addthis_toolbox addthis_default_style" >
				<div class="custom_images">
					<a class="addthis_button_more"></a>
				</div>
			</div>
		</div>
	</div>
	
</div>
</div>

<?php get_footer(); ?>