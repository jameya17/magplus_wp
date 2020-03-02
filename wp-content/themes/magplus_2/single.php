<?php get_header(); ?>
<?php 
	if(have_posts()): while(have_posts()): the_post(); 
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	endwhile; endif;
?>
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
                    <div class="main one-third">
                        <article class="type-post">
                            <header class="entry-header">
                                <div class="post-meta h-entry"> 
                                	<?php 
                                		$categoryObj = get_the_category(); 
                                		foreach($categoryObj as $categoryKey => $category){
                                	?>
                                		<a href="" class="category-name"><?php echo $category->name; ?></a>
                                	<?php
                                		}
                                	?>
                                    <span class="publish-details">
                                        <time class="dt-published" datetime="19-09-12"><?php the_time('F d, Y'); ?></time>, by <span class="author vcard h-card p-author"><?php the_author_meta( 'user_nicename' , $author_id ); ?>, </span> 
                                    </span>
                                </div> 
                                <h1 class="entry-title"><?php the_title(); ?></h1>  
                                <p><?php the_excerpt(); ?></p>
                            </header>

                            <div class="entry-content">
                                <img src="<?php echo $thumb[0]; ?>" class="blog-img" alt="" />
                                <?php the_content(); ?>
                            </div>
                        </article>
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

        <section class="l-section fiveCol-slider sec-pad pad-top0">
            <div class="l-section-wrap">
                <div class="sec-holder">
                    <h3>More Blogs</h3>     
                    <div class="slider-container">
                        <div class="nonloop owl-carousel col-carousel out-of-nav five-col-carousel"> 
                        	<?php
                                $args = array(
                                    'post_type' => 'post',
                                    'post_status' => 'publish',
                                    'orderby' => 'publish_date',
                                    'order' => 'DESC',
                                    'posts_per_page' => 7
                                );
                                $the_query = new WP_Query( $args );
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                            ?>
                            	<div class="card card-with-image item">
	                                <div class="card-body">
	                                    <div class="card-image">
	                                        <img src="<?php echo $thumb[0]; ?>" alt="" />  
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