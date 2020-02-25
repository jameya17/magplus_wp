
<?php 
get_header(); 
// get the custom post objects
#$post_type = get_post_type_object( 'clients' );
#echo '<pre>'; print_r($post_type); echo '</pre>';


//Get total pages number
//Extract category

$sort='';

if(isset($_GET['filter'])){
	$sort = $_GET['filter'];
}


$idGetter = array(
"magazines"=>"20505",
"sales-materials"=>"20581",
"marketing"=>"20627",
"product-brochures-guides"=>"20605",
"catalogs"=>"20617",
"internal-communications"=>"20661",
"education"=>"20499"
);
//print_r($idGetter);
//Array to figure out number of posts to show correct "Load More Button"

$args=array(
	  'post_type' => 'clients',
	  'post_status' => 'publish',
	  'posts_per_page' => 12,
	  'caller_get_posts'=> 1,
	  'suppress_filters' => false,
	  'meta_query' => array(),
	);

if($sort){
	$sort = $idGetter[$sort];
	$jsSort='?filter='.$sort;
}
if($sort){
	
	$meta_args = array(
        'key' => 'use_type_cat',
        'value' => $sort,
        'compare' => 'LIKE'
    );
	array_push($args['meta_query'],$meta_args);
}
//Query post to get total #
$thePosts = query_posts($args);
global $wp_query; 
$numOfPosts = ceil($wp_query->found_posts/$wp_query->query['posts_per_page']);

?>
<div id="content" class="content group wrapper">
	<div class="main main-full">
		
		<article id="clients" <?php post_class('group'); ?>>
			<h1>Clients</h1>
			<div class="entry-content">
				<?php
			
				$id = ps_get_id_by_slug('clients');
				$clients_page = get_post($id);
				echo apply_filters('the_content', $clients_page->post_content);
				
				?>
			</div>

			<ul id="clients-list" class="expandBox1"></ul>
	
		
		</article>
      
  
<a href="#" class="load-more"></a>      
    </div><!-- .main -->
</div> <!-- .content -->
<!--<script>
        var sort = '<?= $jsSort ?>';
        var numOfPosts= <?= $numOfPosts ?>
</script>-->

<script>
	$(document).ready(function(){
    	$(".menu-item-home a").css("color", "#999");
    	$('.menu-item-home a').hover(
	       function(){ $(this).css("color", "#fff") },
	       function(){ $(this).css("color", "#999") }
		)
	});
    var sort = '<?= $jsSort ?>';
    var numOfPosts= <?= $numOfPosts ?>
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_sharing_toolbox"></div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#async=1"></script>
<?php get_template_part('social-bar'); ?>
<?php get_footer(); ?>