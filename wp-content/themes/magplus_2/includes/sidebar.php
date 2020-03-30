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
        <?php echo do_shortcode("[do_widget id=a2a_share_save_widget-2]"); ?>
    </div>
    <div class="sidebar-section-listing">
        <h3 class="sec-title">Share</h3>
        <ul class="sidebar-listing follow-us-listing" id="social-share">
            <li><a href="javascript:void(0);" title="Slack"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-slack.svg" alt="Slack"></a></li>
            <li><a href="" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-twitter.svg" alt="Twitter"></a></li>
            <li><a href="javascript:void(0);" title="facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-facebook.svg" alt="facebook"></a></li>
            <li><a href="" title="G+"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-gplus.svg" alt="G+"></a></li>
            <li><a href="" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icons/grey-instagram.svg" alt="Instagram"></a></li> 
        </ul>
    </div> 
    <div class="sidebar-section-listing" style="display:none;">
        <?php echo do_shortcode("[do_widget id=wp_subscribe-2]"); ?>
    </div>
    <div class="sidebar-section-listing">
        <div class="get-update-ces">
            <h3 class="sec-title">Get Updates</h3>      
            <p>Subscribe to our mailing list and get latest product updates, insights, and tips in your inbox. </p>      
            <div class="subscription-sec">
                <div class="subscription-form">
                    <div class="inline-form error-block">
                        <input type="email" id="email" placeholder="Enter your email" name="emailOne">
                        <button type="button" id="btnClick" alt="newsletter-submit" class="btn"></button>
                        <span class="error" id="formEror"></span>
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