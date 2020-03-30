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
                        	?>
                            <div class="card card-with-image item" data-aos="fade-up">
                                <div class="card-body">
                                    <div class="card-image">
                                        <img src="<?php echo $thumb[0]; ?>" alt="">  
                                    </div>
                                    <div class="card-body-con">
                                        <span class="publish-date"><?php the_time('F d, Y'); ?></span>
                                        <h5 class="card-title two-ellipsis"><?php the_title(); ?></h5>
                                        <p class="card-discp block-ellipsis"><?php echo get_the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="text-link">Read More +</a>
                                    </div>    
                                </div>
                            </div>
                            <?php endwhile; endif; ?>
                        </div>

                        <?php /* Display navigation to next/previous pages when applicable */ 
		
		if(function_exists('wp_pagenavi')){
			wp_pagenavi(); 
		}elseif (  $wp_query->max_num_pages > 1 ){ 
			echo '<div class="post-navigation">';
				posts_nav_link(' &#8212; ', __('&laquo; Nyare inl&auml;gg'), __('&Auml;ldre inl&auml;gg &raquo;'));
			echo '</div>';
		} ?>

                        <ul class="pagination">
                            <li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><img src="images/icons/pagination-prev.svg" alt=""></a></li>
                            <li class="page-item current-page active"><a class="page-link" href="javascript:void(0)">1</a></li>
                            <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">2</a></li>
                            <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">3</a></li>
                            <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">4</a></li>
                            <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">5</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0)">...</a></li>
                            <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">9</a></li>
                            <li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><img src="images/icons/pagination-next.svg" alt=""></a></li>
                        </ul>
                    </div>

                    <div class="sidebar post-sidebar one-cal">
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Categories</h3>
                            <ul class="sidebar-listing">
                            	<?php 
                                    $categories = get_categories(); 
                                    foreach($categories as $categoryKey => $category){
                                    $link = get_category_link($category->cat_ID);

                                ?>
                                    <li><a href="<?php echo $link; ?>"><?php echo $category->name ?><span class="count"> (<?php echo $category->count ?>)</span></a></li>
                                <?php } ?>
                            </ul>
                        </div>                                             
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Latest Post</h3>
                            <?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'posts_per_page' => 4,
                                );
                                $the_query = new WP_Query( $args );

                            ?>
                            <ul class="sidebar-listing">
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        </div>                                             
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Tags</h3>
                            <ul class="sidebar-listing tags-listing">
                                <?php 
                                    $tags = get_tags();
                                    foreach($tags as $tagKey => $tag){
                                        if($tag->count > 4){
                                ?>
                                            <li class="tag-link"><a href="<?php echo get_term_link($tag->term_id); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a></li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                        </div>  
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Share</h3>
                            <ul class="sidebar-listing follow-us-listing">
                                <li><a href="" title="Slack"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-slack.svg" alt="Slack"></a></li>
                                <li><a href="" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-twitter.svg" alt="Twitter"></a></li>
                                <li><a href="" title="facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-facebook.svg" alt="facebook"></a></li>
                                <li><a href="" title="G+"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-gplus.svg" alt="G+"></a></li>
                                <li><a href="" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-instagram.svg" alt="Instagram"></a></li> 
                            </ul>
                        </div> 
                        <div class="sidebar-section-listing">
                            <div class="get-update-ces">
                                <h3 class="sec-title">Get Updates</h3>            
                                <p>Subscribe to our mailing list and get latest product updates, insights, and tips in your inbox. </p>
                                <div class="subscription-sec">
                                    <div class="subscription-form">
                                        <div class="inline-form error-block">
                                            <input type="email" id="email" placeholder="Enter your email" name="email">
                                            <button type="button" id="btnClick" alt="newsletter-submit" class="btn"></button>
                                            <span class="error"></span>
                                        </div>    
                                        <div class="tmc-block ">
                                            <label class="checkbox-container" for="">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                I agree to receive timely updates with the latest blog posts
                                            </label>
                                        </div>    
                                    </div>
                                </div>    

                                <h6>Contact: <a href="tel:+91 80876 00106" title="tel:+91 80876 00106">+91 80876 00106</a></h6>
                            </div>
                        </div>                                             
                    </div>
                </div>            
            </div>   
        </section>        
    </div> 

<?php get_footer(); ?>