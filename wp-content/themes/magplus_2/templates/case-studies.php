<?php
/**
 * Template Name: Case Studies Listing Template
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

$args = array(
    'post_type' => 'video',
    'post_status' => 'publish',
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'posts_per_page' => 4,
    'tax_query' => array(
        array(
            'taxonomy' => 'video_cat',
            'field' => 'id',
            'terms' => array(183,171)
        )
    )
);
$the_showcase_query = new WP_Query( $args );

?>
        <div class="container casestudiesPg">
            <section id="tutorials" class="l-section sec-pad grey-bg pad-top0 scrrol-sec">
                <div class="l-section-wrap">
                    <div class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                            <li class="breadcrumb-item"><a href="#">Support</a></li>
                            <li class="breadcrumb-item"><a href="#">Case Studies</a></li>
                        </ul>
                    </div>
                    <div class="g-col align-center">
                        <div class="content-block">
                            <h3>Case Studies</h3>
                            <div class="small-wrap">
                                <p class="">More than 5000 apps have been created using the mag+ platform till now. See below to see how some of our customers have used mag+ to solve their business problems and increase their engagement with the end-users.</p>
                            </div>  
                        </div>    
                    </div>   
                </div>            
            </section>  

            <section id="case-tudies" class="l-section sec-pad pad-top0 white-bg">
                <div class="l-section-wrap"> 
                    <div class="l-sub-section-pad">
                        <div class="tab-section">
                            <ul class="tab-head">
                                <li class="tab-item active"><a href="#" class="tab-link casestudyLink" title="All" data-value="all">All</a></li>
                                <li class="tab-item"><a href="#" class="tab-link casestudyLink" title="Advertisements" data-value="183">Advertisements</a></li>
                                <li class="tab-item"><a href="#" class="tab-link casestudyLink" title="Applications" data-value="171">Applications</a></li>
                            </ul>
                        </div>

                        <div class="case-studies-listing listingActive">
                            <?php 
                                while ( $the_showcase_query->have_posts() ) : $the_showcase_query->the_post(); 
                                $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                            ?>
                                <div class="g-col offset_default">
                                    <a href="<?php the_permalink(); ?>" class="one-half image-block" data-aos="fade-right">
                                        <img src="<?php echo $thumb; ?>">
                                    </a>    
                                    <div class="one-half" data-aos="fade-left">
                                        <h3 class="sec-title"><?php the_title(); ?></h3>
                                        <p class="block-ellipsis"><?php echo get_the_excerpt(); ?></p>
                                        <a href="<?php the_permalink(); ?>" title="View Case Study +" class="text-link"> View Case Study +</a>
                                    </div>     
                                </div>    
                            <?php endwhile; ?>
                        </div>    
                        <input type="hidden" value="4" id="offsetValue"/>
                        <input type="hidden" value="all" id="term_id"/>
                        <div class="case-studies-foot">
                            <div class="loading-spinner" style="display: none;"></div>
                            <a href="/" class="primary-btn align-center" title="View More" id="view-more-case-studies">View More
                                <span class="span1">View More</span>
                                <span class="span2">View More</span>
                                <span class="span3">View More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>    
        </div>
    <?php
get_footer();   