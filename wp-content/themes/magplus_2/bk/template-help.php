<?php
/*
Template name: Help
*/

get_header(); ?>

<div id="content" class="content group wrapper">
	
	<?php get_sidebar('left'); ?>  
	
	<div class="main main-one-sidebar main-help" role="main">
		
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
		
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'magplus_theme' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'magplus_theme' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php /*
		<h1>Search</h1>
		
		<div id='gsfn_search_widget'>
		<a href="https://getsatisfaction.com/magplus" class="widget_title">People-Powered Customer Service for Magplus</a>
		<div class='gsfn_content'>
		<form accept-charset='utf-8' action='https://getsatisfaction.com/magplus' id='gsfn_search_form' method='get' onsubmit='gsfn_search(this); return false;'>
		<div>
		<input name='style' type='hidden' value='' />
		<input name='limit' type='hidden' value='5' />
		<input name='utm_medium' type='hidden' value='widget_search' />
		<input name='utm_source' type='hidden' value='widget_magplus' />
		<input name='callback' type='hidden' value='gsfnResultsCallback' />
		<input name='format' type='hidden' value='widget' />
		<label class='gsfn_label' for='gsfn_search_query'>Ask a question, share an idea, or report a problem.</label>
		<input id='gsfn_search_query' maxlength='120' name='query' type='text' value='' />
		<input id='continue' type='submit' value='Continue' />
		</div>
		</form>
		<div id='gsfn_search_results' style='height: auto;'></div>
		</div>
		<div class='powered_by'>
		<a href="https://getsatisfaction.com/"><img alt="Burst16" src="http://getsatisfaction.com/images/burst16.png" style="vertical-align: middle;" /></a>
		<a href="https://getsatisfaction.com/">Get Satisfaction support network</a>
		</div>
		</div>
		<script src="https://getsatisfaction.com/magplus/widgets/javascripts/cb5e3cbfae/widgets.js" type="text/javascript"></script>

		
		
		<h1>Latest things</h1>
		<div id='gsfn_list_widget'>
			<div id='gsfn_content'>Loading...</div>
			<a href="https://getsatisfaction.com/magplus" class="widget_title">Active customer service discussions in Magplus</a>
		</div>
		<script src="https://getsatisfaction.com/magplus/widgets/javascripts/cb5e3cbfae/widgets.js" type="text/javascript"></script>
		<script src="https://getsatisfaction.com/magplus/topics.widget?callback=gsfnTopicsCallback&amp;limit=5&amp;sort=last_active_at" type="text/javascript"></script>
		
		
		*/ ?>
		
	</div>
</div>
<?php get_footer(); ?>