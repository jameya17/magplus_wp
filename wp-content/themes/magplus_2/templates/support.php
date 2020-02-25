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
            'terms' => '183'
        )
    )
);
$the_showcaseAds_query = new WP_Query( $args );
while ( $the_showcaseAds_query->have_posts() ) : $the_showcaseAds_query->the_post();
   //echo get_the_title();
   //echo "<br/><br/>";
endwhile;    
get_header();
    ?>
        <div class="container">
            <section id="tutorials" class="l-section sec-pad white-bg pad-top0 scrrol-sec">
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
                                <div class="item">
                                    <a href="/" target="_blank" rel="" class="item-image">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/temp-schedule-demo.svg" alt="" />        
                                        <span class="video-play-btn">
                                        </span>
                                    </a>    
                                    <div class="item-detail">
                                        <p>From the creation of your layout through quality</p>
                                    </div>    
                                </div>
                                <div class="item">
                                    <a href="/" target="_blank" rel="" class="item-image">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/temp-schedule-demo.svg" alt="" />        
                                        <span class="video-play-btn">
                                        </span>
                                    </a>    
                                    <div class="item-detail">
                                        <p>From the creation of your layout through quality</p>
                                    </div>  
                                </div>
                                <div class="item">
                                    <a href="/" target="_blank" rel="" class="item-image">
                                        <img src="<?php bloginfo('template_directory'); ?>/images/temp-schedule-demo.svg" alt="" />        
                                        <span class="video-play-btn">
                                        </span>
                                    </a>    
                                    <div class="item-detail">
                                        <p>From the creation of your layout through quality</p>
                                    </div>  
                                </div> 
                            </div>    
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
                                <div class="card card-with-image item">
                                    <div class="card-body">
                                        <div class="card-image">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/blog-temp1.svg" alt="" />  
                                        </div>
                                        <div class="card-body-con">
                                            <span class="publish-date">August 6, 2017 </span>
                                            <h5 class="card-title two-ellipsis">Computer Hardware Desktops And Notebooks And Handhelds Oh My</h5>
                                            <p class="card-discp block-ellipsis">Maxim Magazine’s September issue uses interactive digital publishing for a very fun NFL feature. Users can read up on their favorite NFL teams, and also predict the future! Ask the app who will win tonight’s game, shake, and receive your answer. </p>
                                            <a href="#" class="text-link">Read More +</a>
                                        </div>    
                                    </div>
                                </div>
                                <div class="card card-with-image item">
                                    <div class="card-body">
                                        <div class="card-image">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/blog-temp2.svg" alt="" />  
                                        </div>
                                        <div class="card-body-con">
                                            <span class="publish-date">August 6, 2017 </span>
                                            <h5 class="card-title two-ellipsis">Computer Hardware Desktops And Notebooks And Handhelds Oh My</h5>
                                            <p class="card-discp block-ellipsis">Maxim Magazine’s September issue uses interactive digital publishing for a very fun NFL feature. Users can read up on their favorite NFL teams, and also predict the future! Ask the app who will win tonight’s game, shake, and receive your answer. </p>
                                            <a href="#" class="text-link">Read More +</a>
                                        </div>    
                                    </div>
                                </div>
                                <div class="card card-with-image item">
                                    <div class="card-body">
                                        <div class="card-image">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/blog-temp2.svg" alt="" />  
                                        </div>
                                        <div class="card-body-con">
                                            <span class="publish-date">August 6, 2017 </span>
                                            <h5 class="card-title two-ellipsis">Computer Hardware Desktops And Notebooks And Handhelds Oh My</h5>
                                            <p class="card-discp block-ellipsis">Maxim Magazine’s September issue uses interactive digital publishing for a very fun NFL feature. Users can read up on their favorite NFL teams, and also predict the future! Ask the app who will win tonight’s game, shake, and receive your answer. </p>
                                            <a href="#" class="text-link">Read More +</a>
                                        </div>    
                                    </div>
                                </div>
                            </div>    
                        </div>    
                    </div>    
                </div>            
            </section>
        <div> 
    <?php
get_footer();    