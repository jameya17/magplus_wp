<?php get_header(); ?>

	<div class="container casestudiesPg"> 
        <section id="tutorials" class="l-section sec-pad pad-top0">
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
                        
                    ?>
                        <div class="main one-third">
                            <article class="type-post">
                                <header class="entry-header">
                                    <div class="post-meta h-entry"> 
                                        <a href="" class="category-name"><?php echo $terms[0]->slug; ?></a>
                                        <span class="publish-details">
                                            <time class="dt-published" datetime="19-09-12">September 12, 2019</time>, by <span class="author vcard h-card p-author"> admin, </span> 
                                        </span>
                                    </div> 
                                    <h1 class="entry-title"><?php the_title(); ?></h1>  
                                    <p><?php the_excerpt(); ?></p>
                                </header>

                                <div class="entry-content">
                                    <img src="<?php echo $thumb; ?>" class="blog-img" alt="" />
                                    <?php the_content(); ?>
                                    <p>
                                        <iframe src="<?php echo $video; ?>" style="width:100%;max-width:720px;height:400px;" allowfullscreen></iframe>
                                    </p>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; endif; ?>

                    <div class="sidebar post-sidebar one-cal">
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Categories</h3>
                            <ul class="sidebar-listing">
                                <li><a href="">Business Insights<span class="count"> (16)</span></a></li>
                                <li><a href="">Digital Magazine Publishing <span class="count"> (23)</span></a></li>
                                <li><a href="">Marketing<span class="count"> (9)</span></a></li>
                                <li><a href="">Publishing Trends<span class="count"> (15)</span></a></li>
                                <li><a href="">Tips and Tricks<span class="count">(31)</span></a></li>
                            </ul>
                        </div>                                             
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Latest Post</h3>
                            <ul class="sidebar-listing">
                                <li><a href="" title="">Expand your market with Digital Catalog Publishing</a></li>
                                <li><a href="" title="">Ten Benefits of Publishing Digital Magazines</a></li>
                                <li><a href="" title="">Diversify Your Revenue Stream with Mobile App Publishing</a></li>
                                <li><a href="" title="">Digital Magazines for Tablets: 10 Tips for Creating Better Ads</a></li>
                            </ul>
                        </div>                                             
                        <div class="sidebar-section-listing">
                            <h3 class="sec-title">Tags</h3>
                            <ul class="sidebar-listing tags-listing">
                                <li class="tag-link"><a href="" title="">Marketing</a></li>
                                <li class="tag-link"><a href="" title="">logo</a></li>
                                <li class="tag-link"><a href="" title="">Cars</a></li>
                                <li class="tag-link"><a href="" title="">design</a></li>
                                <li class="tag-link"><a href="" title="">A4</a></li>
                                <li class="tag-link"><a href="" title="">Apps</a></li>
                                <li class="tag-link"><a href="" title="">print</a></li>
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
                                            <span class="publish-date">August 6, 2017 </span>
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