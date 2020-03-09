<?php
/**
 * Template Name: Tutorials New Template
 *
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
    ?>
        <div class="container">
            <section id="tutorials" class="l-section sec-pad grey-bg pad-top0 scrrol-sec">
                <div class="l-section-wrap">
                    <div class="breadcrumb">
                        <ul>
                            <li class="breadcrumb-item"><a href="#">Magpplus</a></li>
                            <li class="breadcrumb-item"><a href="#">Support</a></li>
                            <li class="breadcrumb-item"><a href="#">Tutorials</a></li>
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
                        </div>    
                    </div>    
                </div>            
            </section>  

            <section id="tutorials" class="l-section sec-pad white-bg tutorial-l-section">
                <div class="l-section-wrap">
                    <div class="tutorial-wraper">
                        <div class="sidebar">
                            <h3 class="sidebar-header">Categories</h3>
                            <ul class="sidebar-listing">
                                <?php 
                                    $terms = get_terms('video_cat' );
                                    $termIdArray = array(366,367,100);
                                    $countArray = array(); 
                                    foreach($terms as $termKey => $term){
                                        if(in_array($term->term_id, $termIdArray)){
                                            $countArray[0] = $countArray[0] + $term->count;
                                        }
                                        if($term->term_id == 366){
                                            $countArray[1] = $term->count;
                                        }
                                        if($term->term_id == 367){
                                            $countArray[2] = $term->count;
                                        }
                                        if($term->term_id == 100){
                                            $countArray[3] = $term->count;
                                        }
                                    }
                                ?>
                                <li>
                                    <label class="checkbox-container">All&nbsp;<span class="count">(<?php echo $countArray[0]; ?>)</span>
                                        <input type="checkbox" class="checkboxTutorials allTutorials" data-value="all" checked="checked">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-container">Tutorials&nbsp;<span class="count">(<?php echo $countArray[1]; ?>)</span>
                                        <input type="checkbox" class="checkboxTutorials" data-value="366">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-container">Webinars&nbsp;<span class="count">(<?php echo $countArray[2]; ?>)</span>
                                        <input type="checkbox" class="checkboxTutorials" data-value="367">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <li>
                                    <label class="checkbox-container">What is Magplus&nbsp;<span class="count">(<?php echo $countArray[3]; ?>)</span>
                                        <input type="checkbox" class="checkboxTutorials" data-value="100">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="video-listing-block"> 
                            <?php
                                $total = $noOfPages = 0;
                                $args = array(
                                    'post_type' => 'video',
                                    'post_status' => 'publish',
                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'posts_per_page' => 9,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'video_cat',
                                            'field' => 'id',
                                            'terms' => array(366,367,100)
                                        )
                                    )
                                );
                                $the_tutorials_query = new WP_Query( $args );
                                $total = $the_tutorials_query->found_posts;
                                $noOfPages = ceil($total/9);
                            ?>
                            <ul class="pagination">
                                <li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><img src="<?php bloginfo('template_directory'); ?>/images/icons/pagination-prev.svg" alt=""></a></li>
                                <?php 
                                    for($i=1; $i<=$noOfPages; $i++){
                                ?>
                                    <li class="page-item current-page pageId-<?php echo $i ?> <?php if($i == 1){?>active<?php } ?>"><a class="page-link" href="javascript:void(0)"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><img src="<?php bloginfo('template_directory'); ?>/images/icons/pagination-next.svg" alt=""></a></li>
                                
                            </ul>

                            <div class="video-container card-deck">
                                <?php
                                    
                                    $i = 0;
                                    while ( $the_tutorials_query->have_posts() ) : $the_tutorials_query->the_post();
                                        $thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
                                        $video_id = get_post_meta($post->ID, '_mag_video_id', true);
                                        $service = get_post_meta($post->ID, '_mag_video_service', true);
                                        
                                        if($service == 'vimeo'){
                                            $video = 'https://player.vimeo.com/video/'. $video_id .'?title=0&amp;byline=0&amp;portrait=0';
                                        }elseif($service == 'youtube'){
                                            $video = 'https://www.youtube.com/embed/'. $video_id .'?rel=0';
                                        }
                                        if($i == 0){
                                ?>
                                            <ul class="video-section video-listing">

                                        <?php } ?>
                                                <li>
                                                    <a href="<?php echo $video; ?>" data-fancybox title="">
                                                        <img src="<?php echo $thumb; ?>" alt="" class="card-img-top img-fluid"/>
                                                        <span class="video-play-btn"></span>
                                                        <span class="play-text">Watch Tutorial</span>
                                                    </a>
                                                    <strong class="tutorials-title"><?php the_title(); ?></strong>    
                                                </li>
                                        <?php 
                                            $i++;
                                            if($i == 3) { 
                                            $i = 0;
                                        ?>
                                            </ul>
                                        <?php } ?>

                                <?php 

                                    endwhile; 
                                ?>
                                
                            </div>     
                                

                            <ul class="pagination pagination-bottom">
                                <li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><img src="<?php bloginfo('template_directory'); ?>/images/icons/pagination-prev.svg" alt=""></a></li>
                                 <?php 
                                    for($i=1; $i<=$noOfPages; $i++){
                                ?>
                                    <li class="page-item current-page pageId-<?php echo $i ?> <?php if($i == 1){?>active<?php } ?>"><a class="page-link" href="javascript:void(0)"><?php echo $i; ?></a></li>
                                <?php } ?>
                                <li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><img src="<?php bloginfo('template_directory'); ?>/images/icons/pagination-next.svg" alt=""></a></li>
                            </ul>
                            <input type="hidden" id="term_id" value="all" />
                            <input type="hidden" id="current_page" value="1" />
                            <input type="hidden" id="total_pages" value="<?php echo $noOfPages; ?>">
                            <video controls id="myVideo" style="display:none;"> 
                                <source src="https://www.html5rocks.com/en/tutorials/video/basics/Chrome_ImF.mp4" type="video/mp4">
                                <source src="https://www.html5rocks.com/en/tutorials/video/basics/Chrome_ImF.webm" type="video/webm">
                                <source src="https://www.html5rocks.com/en/tutorials/video/basics/Chrome_ImF.ogv" type="video/ogg">
                                Your browser doesn't support HTML5 video tag.
                            </video>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    <?php get_footer(); ?>