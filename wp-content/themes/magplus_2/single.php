<?php get_header(); ?>
<?php 
	if(have_posts()): while(have_posts()): the_post(); 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	endwhile; endif;
?>
<div class="container casestudiesPg casestudiesdtlPg"> 
        <section id="tutorials" class="l-section sec-pad pad-top0 blog-listing-section">
            <div class="l-section-wrap">
                <div class="breadcrumb">
                    <ul>
                        <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                        <li class="breadcrumb-item"><a href="#">Support</a></li>
                        <li class="breadcrumb-item"><a href="#">Case Studies</a></li>
                        <li class="breadcrumb-item"><a href="">Maserati</a></li>
                    </ul>
                </div>
                <div class="g-col offset_default">
                    <div class="main one-third">
                        <article class="type-post">
                            <header class="entry-header">
                                <div class="post-meta h-entry"> 
                                	<?php 
                                		$categoryObj = get_the_category(); 
                                		foreach($categoryObj as $categoryKey => $category){
                                	?>
                                		<a href="" class="category-name"><?php echo $category->name; ?></a>
                                	<?php
                                		}
                                	?>
                                    <span class="publish-details">
                                        <time class="dt-published" datetime="19-09-12"><?php the_time('F d, Y'); ?></time>, by <span class="author vcard h-card p-author"><?php the_author_meta( 'user_nicename' , $author_id ); ?>, </span> 
                                    </span>
                                </div> 
                                <h1 class="entry-title"><?php the_title(); ?></h1>  
                                
                            </header>

                            <div class="entry-content">
                                <img src="<?php echo $thumb[0]; ?>" class="blog-img" alt="" />
                                <p><?php the_content(); ?></p>
                            </div>
                        </article>
                    </div>
                    <?php include("includes/sidebar.php"); ?>
                </div>            
            </div>   
        </section>

        <section class="l-section fiveCol-slider sec-pad pad-top0">
            <div class="l-section-wrap">
                <div class="sec-holder">
                    <h3>More Blogs</h3>     
                    <div class="slider-container">
                        <div class="nonloop owl-carousel col-carousel out-of-nav five-col-carousel"> 
                        	<?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'posts_per_page' => 7
                                );
                                $the_query = new WP_Query( $args );
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                $text = get_the_excerpt();
                                $text = preg_replace('#\[vc_row\](.*?)\[vc_column_text\]#ims', '', $text);
                            ?>
                            	<div class="card card-with-image item">
	                                <div class="card-body">
	                                    <div class="card-image">
	                                        <img src="<?php echo $thumb[0]; ?>" alt="" />  
	                                    </div>
	                                    <div class="card-body-con">
	                                        <span class="publish-date"><?php the_time('F d, Y'); ?> </span>
	                                        <h5 class="card-title two-ellipsis"><?php the_title(); ?></h5>
	                                        <p class="card-discp block-ellipsis"><?php echo $text; ?></p>
	                                        <a href="<?php the_permalink(); ?>" class="text-link">Read More +</a>
	                                    </div>    
	                                </div>
	                            </div>
                            <?php endwhile; ?>
                        </div> 
                        <div class="slider-counter">1/5</div>
                    </div>                                                              
                </div>    
            </div>    
        </section>
    </div>
<?php get_footer(); ?>