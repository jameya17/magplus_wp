<?php get_header(); ?>

<div class="container"> 
        <section id="tutorials" class="l-section sec-pad pad-top0 blog-listing-section">
            <div class="l-section-wrap">
                <div class="breadcrumb">
                    <ul>
                        <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                        <li class="breadcrumb-item"><a href="#">Support</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="g-col offset_default">
                    <div class="main one-third">
                        <div class="blog-listing">
                        	<?php 
                        		if(have_posts()): while(have_posts()): the_post(); 
                        			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                    $text = get_the_excerpt();
                                    $text = preg_replace('#\[vc_row\](.*?)\[vc_column_text\]#ims', '', $text);
                        	?>
                            <div class="card card-with-image item" data-aos="fade-up">
                                <div class="card-body">
                                    <div class="card-image">
                                        <img src="<?php echo $thumb[0]; ?>" alt="">  
                                    </div>
                                    <div class="card-body-con">
                                        <span class="publish-date"><?php the_time('F d, Y'); ?></span>
                                        <h5 class="card-title two-ellipsis"><?php the_title(); ?></h5>
                                        <p class="card-discp block-ellipsis"><?php echo $text; ?></p>
                                        <a href="<?php the_permalink(); ?>" class="text-link">Read More +</a>
                                    </div>    
                                </div>
                            </div>
                            <?php endwhile; endif; ?>
                        </div>

                        <ul class="pagination">
                            <?php wp_pagenavi(); ?>
                        </ul>
                    </div>

                    <?php include("includes/sidebar.php"); ?>
                </div>            
            </div>   
        </section>        
    </div> 


<?php get_footer(); ?>