<?php get_header(); ?>

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
                    <?php 
                        $termId = 0;
                        if(have_posts()): while(have_posts()): the_post(); 
                        $video_id = get_post_meta($post->ID, '_mag_video_id', true);
                        $service = get_post_meta($post->ID, '_mag_video_service', true);
                        $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                        
                        if($service == 'vimeo'){
                            $video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
                        }elseif($service == 'youtube'){
                            $video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
                        }

                        $terms = get_the_terms( $post->ID, 'video_cat' );
                        $termId = $terms[0]->term_id;
                        $author_id=$post->post_author;
                        
                    ?>
                        <div class="main one-third">
                            <article class="type-post">
                                <header class="entry-header">
                                    <div class="post-meta h-entry"> 
                                        <a href="" class="category-name"><?php echo $terms[0]->slug; ?></a>
                                        <span class="publish-details">
                                            <time class="dt-published" datetime="19-09-12"><?php the_time('F d, Y'); ?></time>, by <span class="author vcard h-card p-author"> <?php the_author_meta( 'user_nicename' , $author_id ); ?>, </span> 
                                        </span>
                                    </div> 
                                    <h1 class="entry-title"><?php the_title(); ?></h1>  
                                    <p><?php the_excerpt(); ?></p>
                                </header>

                                <div class="entry-content">
                                    <?php the_content(); ?>
                                    <p>
                                        <div class="item">
                                            <a href="<?php echo $video; ?>" target="_blank" rel="" class="item-image" data-fancybox title="">
                                                <img src="<?php echo $thumb; ?>" alt="" />        
                                                <span class="video-play-btn">
                                                </span>
                                            </a>    
                                            <div class="item-detail">
                                                <p><?php the_title(); ?></p>
                                            </div>    
                                        </div>
                                    </p>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; endif; ?>

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
                                                <input type="checkbox" checked>
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

        <section class="l-section fiveCol-slider sec-pad pad-top0">
            <div class="l-section-wrap">
                <div class="sec-holder">
                    <h3>More Case Studies</h3>     
                    <div class="slider-container">
                        <div class="nonloop owl-carousel col-carousel out-of-nav five-col-carousel"> 
                            <?php
                                if($termId == 171){
                                    $termId = 183;
                                }
                                else{
                                    $termId = 171;
                                }
                                $args = array(
                                    'post_type' => 'video',
                                    'post_status' => 'publish',
                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'posts_per_page' => 7,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'video_cat',
                                            'field' => 'id',
                                            'terms' => array($termId)
                                        )
                                    )
                                );
                                $the_showcase_query = new WP_Query( $args );
                                while ( $the_showcase_query->have_posts() ) : $the_showcase_query->the_post();
                                $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                                if($thumb == ""){
                                    $thumb = get_bloginfo('template_directory').'/images/case-study-temp3.png';
                                }
                            ?>
                                <div class="card card-with-image item">
                                    <div class="card-body">
                                        <div class="card-image">
                                            <img src="<?php echo $thumb; ?>" alt="" />  
                                        </div>
                                        <div class="card-body-con">
                                            <span class="publish-date"><?php the_time('F d, Y'); ?> </span>
                                            <h5 class="card-title two-ellipsis"><?php the_title(); ?></h5>
                                            <p class="card-discp block-ellipsis"><?php echo get_the_excerpt(); ?></p>
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