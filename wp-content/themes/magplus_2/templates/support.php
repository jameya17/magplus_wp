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
                <div class="g-col align-center">
                    <div class="content-block">
                        <h3>Mag+ Tutorials</h3>
                        <div class="small-wrap">
                            <p>Mag+ makes it easy to publish your content to your own mobile app. From text to video to interactive elements, no matter the source, the mag+ software lets you bring your content to life on tablets and phones with no coding and no hassles.</p>
                            <div class="btn-block align-center">
                                <a href="/" class="primary-btn" title="Watch All Tutorials">
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
                            ?>
                                <div class="item">
                                    <a href="<?php the_permalink(); ?>" target="_blank" rel="" class="item-image">
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
                    <div class="g-col align-center">
                        <div class="content-block">
                            <h3>Mag+ Case Studies</h3>
                            <div class="small-wrap">
                                <p>Mag+ makes it easy to publish your content to your own mobile app. From text to video to interactive elements, no matter the source, the mag+ software lets you bring your content to life on tablets and phones with no coding and no hassles.</p>
                                <div class="btn-block align-center">
                                    <a href="/" class="primary-btn" title="View All Case Studies">
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
                                            <div class="one-half image-block">
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
                    <div class="g-col align-center">
                        <div class="content-block">
                            <h3>Mag+ Blogs</h3>
                            <div class="small-wrap">
                                <p>Mag+ makes it easy to publish your content to your own mobile app. From text to video to interactive elements, no matter the source, the mag+ software lets you bring your content to life on tablets and phones with no coding and no hassles.</p>
                                <div class="btn-block align-center">
                                    <a href="/" class="primary-btn" title="View All Blogs">
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
                                            <span class="publish-date"><?php the_time('F d, Y'); ?> </span>
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