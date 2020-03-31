<?php
/**
 * Template Name: Support New Template
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
//$terms = get_terms("video_cat");

$args = array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => 'video_cat',
            'field' => 'id',
            'terms' => '366'
        )
    )
);
$the_tutorials_query = new WP_Query( $args );


$args = array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page' => 5,
    'tax_query' => array(
        array(
            'taxonomy' => 'video_cat',
            'field' => 'id',
            'terms' => '183'
        )
    )
);
$the_showcaseAds_query = new WP_Query( $args );


$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page' => 5
);
$the_query = new WP_Query( $args );



//while ( $the_showcaseAds_query->have_posts() ) : $the_showcaseAds_query->the_post();
   //echo get_the_title();
   //echo "<br/><br/>";
//endwhile;    
get_header();
    ?>
        <div class="container">
            <section id="tutorials" class="l-section sec-pad white-bg pad-top0 scrrol-sec" style="flex-direction: column;">
                <div class="l-section-wrap">
                    <div class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="">Magpplus</a></li>
                            <li class="breadcrumb-item"><a href="">Support</a></li>
                        </ul>
                    </div>
                    <div class="sticky-nav-block white-bg"> 
                        <ul class="nav sticky-sidebar" >
                            <li><a class="nav-link" title="Tutorials" data-scroll="tutorials">Tutorials</a></li>
                            <li><a class="nav-link" title="Case Studies" data-scroll="case-studies">Case Studies</a></li>
                            <li><a class="nav-link" title="Blogs" data-scroll="blog">Blogs</a></li> 
                        </ul>
                    </div>
                </div>    
                <div class="g-col align-center" data-aos="fade-up">
                    <div class="content-block">
                        <h3>Tutorials</h3>
                        <div class="small-wrap">
                            <p>Watch this carefully curated list of tutorial videos to help you kickstart you jour with using mag+. You can always reach out to us at <a href="support@magplus.com" class="text-link" title="support@magplus.com">support@magplus.com</a> if you need additional information on any of the topics.</p>
                            <div class="btn-block">
                                <a href="<?php echo get_permalink(31675); ?>" class="primary-btn" title="Watch All Tutorials">Watch All Tutorials
                                    <span class="span1">Watch All Tutorials</span>
                                    <span class="span2">Watch All Tutorials</span>
                                    <span class="span3">Watch All Tutorials</span>
                                </a>
                            </div>
                        </div>

                        <div class="owl-carousel full-wrap-carousel">
                            <?php 
                                while ( $the_tutorials_query->have_posts() ) : $the_tutorials_query->the_post(); 
                                $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                                $video_id = get_post_meta($post->ID, '_mag_video_id', true);
                                $service = get_post_meta($post->ID, '_mag_video_service', true);
                                
                                if($service == 'vimeo'){
                                    $video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
                                }elseif($service == 'youtube'){
                                    $video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
                                }
                            ?>
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
                            <?php 
                                endwhile; 
                            ?>
                        </div>    
                    </div>    
                </div>     
            </section>  

            <section id="case-studies" class="l-section sec-pad grey-bg scrrol-sec">
                <div class="l-section-wrap"> 
                    <div class="g-col align-center" data-aos="fade-up">
                        <div class="content-block">
                            <h3>Case Studies</h3>
                            <div class="small-wrap">
                                <p>More than 5000 apps have been created using the mag+ platform till now. See below to see how some of our customers have used mag+ to solve their business problems and increase their engagement with the end-users.</p>
                                <div class="btn-block">
                                    <a href="<?php echo get_permalink(31670); ?>" class="primary-btn" title="View All Case Studies">View All Case Studies
                                        <span class="span1">View All Case Studies</span>
                                        <span class="span2">View All Case Studies</span>
                                        <span class="span3">View All Case Studies</span>
                                    </a>
                                </div>
                            </div>

                            <div class="slider-container">
                                <div class="owl-carousel section-carousel">
                                    <?php
                                        while ( $the_showcaseAds_query->have_posts() ) : $the_showcaseAds_query->the_post(); 
                                        $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                                    ?>
                                        <div class="g-col offset_default item">
                                            <div href="<?php the_permalink(); ?>" class="one-half image-block">
                                                <img src="<?php echo $thumb; ?>" alt="App Update Services">  
                                            </div>

                                            <div class="one-half item-detail">
                                                <h3 class="sec-title"><?php the_title(); ?></h3>
                                                <p><?php the_excerpt(); ?></p>
                                                <a href="<?php the_permalink(); ?>" class="text-link">View Case study +</a>
                                            </div>        
                                        </div>

                                    <?php
                                        endwhile;
                                    ?>
                                </div>
                                <div class="slider-counter"></div>
                            </div>
                        </div>   
                    </div>      
                </div>
            </section>   
            
            <section id="blog" class="l-section sec-pad white-bg scrrol-sec">
                <div class="l-section-wrap">
                    <div class="g-col align-center" data-aos="fade-up">
                        <div class="content-block">
                            <h3>Blogs</h3>
                            <div class="small-wrap">
                                <p>Get the latest news, industry insights, stories and all things publishing with our mag+ blog posts.</p>
                                <div class="btn-block">
                                    <a href="<?php echo get_permalink(19); ?>" class="primary-btn" title="View All Blogs">View All Blogs
                                        <span class="span1">View All Blogs</span>
                                        <span class="span2">View All Blogs</span>
                                        <span class="span3">View All Blogs</span>
                                    </a> 
                                </div>
                            </div>

                            <div class="nonloop owl-carousel col-carousel two-col-carousel blog-carousel"> 
                                <?php 
                                    while ( $the_query->have_posts() ) : $the_query->the_post(); 
                                    $url = get_the_post_thumbnail_url();
                                ?>
                                    <div class="card card-with-image item">
                                    <div class="card-body">
                                        <div class="card-image">
                                            <img src="<?php echo $url; ?>" alt="" />  
                                        </div>
                                        <div class="card-body-con">
                                            <span class="publish-date"><?php the_time('F d, Y'); ?></span>
                                            <h5 class="card-title two-ellipsis"><?php the_title(); ?></h5>
                                            <div class="card-discp block-ellipsis"
                                            ><?php the_excerpt(); ?></div>
                                            <a href="<?php the_permalink(); ?>" class="text-link">Read More +</a>
                                        </div>    
                                    </div>
                                </div>

                                <?php endwhile; ?>
                            </div>    
                        </div>    
                    </div>    
                </div>            
            </section>
        <div> 
    <?php
get_footer();    