<?php 
/*
Template name: Software Uses
*/

get_header(); 
// get the custom post objects

//print_r($idGetter);
//Array to figure out number of posts to show correct "Load More Button"
$args=array(
	  'post_type' => 'use_case',
	  //'post_status' => 'publish',
	  'posts_per_page' => 12,
	  'caller_get_posts'=> 1,
	  'suppress_filters' => false,
	  'meta_query' => array(),
	);

$pagename= $post->post_title;
$pageid =  $post->ID;
$sort='';

if($pagename!='All'){
	
	$meta_args = array(
        'key' => 'use_cat',
        'value' => $pageid,
        'compare' => 'LIKE'
    );
	array_push($args['meta_query'],$meta_args);

	//Set sort var for passing to Ajax get URL 
	$sort="?filter=".$pageid;
}

//Query post to get total #
$thePosts = query_posts($args);
global $wp_query; 
$numOfPosts = ceil($wp_query->found_posts/12);

?>
<div id="content" class="content group wrapper">
	<div class="main main-full">
		
		<article id="clients" <?php post_class('group'); ?>>
			<? 

			get_template_part( 'content', 'software-select' ); 

			$subhead= get_field('subhead');

			if($pagename=='All'){ 
			?>
			<nav class="sub-nav clearfix breadcrumbs"><a href="/customer-uses">Customer Uses</a> / </nav>		
			<h1>Software Uses </h1>
			<? if($subhead) echo '<h2>'.$subhead.'</h2>' ?>
			<? } 
			else{?>
			<nav class="sub-nav clearfix breadcrumbs"><a href="/customer-uses">Customer Uses</a> / <a href="/customer-uses/software-uses">Software Uses</a> / </nav>		
			<h1><?= $pagename ?></h1>
			<? if($subhead) echo '<h2>'.$subhead.'</h2>' ?>
	
			<?} ?>
			<div class="entry-content">
				<?php
			
				$id = ps_get_id_by_slug('use_case');
				$clients_page = get_post($id);
				echo apply_filters('the_content', $clients_page->post_content);
				
				?>
			</div>

			<ul id="clients-list" class="expandBox1"></ul>
	
		
		</article>
      
  
<a href="#" class="load-more"></a>      
    </div><!-- .main -->
</div> <!-- .content -->
<script>
		var customer_uses = true;
        var sort = '<?= $sort ?>';
        var datalink=1;
        var numOfPosts= <?= $numOfPosts ?>
</script>

<?php get_template_part('social-bar'); ?>
<?php get_footer(); ?>
