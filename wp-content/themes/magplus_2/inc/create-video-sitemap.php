<?php 

function ps_create_video_sitemap(){
	global $post;
	/*
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"> 
	   <url> 
	     <loc>http://www.example.com/videos/some_video_landing_page.html</loc>
	     <video:video>
	       <video:thumbnail_loc>http://www.example.com/thumbs/123.jpg</video:thumbnail_loc> 
	       <video:title>Grilling steaks for summer</video:title>
	       <video:description>Alkis shows you how to get perfectly done steaks every            
	         time</video:description>
	       <video:content_loc>http://www.example.com/video123.flv</video:content_loc>
	       <video:player_loc allow_embed="yes" autoplay="ap=1">
	         http://www.example.com/videoplayer.swf?video=123</video:player_loc>
	       <video:duration>600</video:duration>
	       <video:expiration_date>2009-11-05T19:20:30+08:00</video:expiration_date>
	       <video:rating>4.2</video:rating> 
	       <video:view_count>12345</video:view_count>    
	       <video:publication_date>2007-11-05T19:20:30+08:00</video:publication_date>
	       <video:tag>steak</video:tag> 
	       <video:tag>meat</video:tag> 
	       <video:tag>summer</video:tag> 
	       <video:category>Grilling</video:category>
	       <video:family_friendly>yes</video:family_friendly>   
	       <video:restriction relationship="allow">IE GB US CA</video:restriction> 
	       <video:gallery_loc title="Cooking Videos">http://cooking.example.com</video:gallery_loc>
	       <video:price currency="EUR">1.99</video:price>
	       <video:requires_subscription>yes</video:requires_subscription>
	       <video:uploader info="http://www.example.com/users/grillymcgrillerson">GrillyMcGrillerson
	         </video:uploader>
	       <video:live>no</video:live>
	     </video:video> 
	   </url> 
	</urlset>
	*/
	
	$map = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
	xmlns:video="http://www.google.com/schemas/sitemap-video/1.1"> ';
	
	$args = array(
		'post_type' => 'video',
		'posts_per_page' => -1,
		'meta_key' => '_mag_video_id'
	);
	$q = new WP_Query($args);
	
	// the different meta _mag_video_X
	$video_meta = array(
		'id',
		'service',
		'thumbnail',
		'height',
		'width',
		'duration',
		'pub_date',
		'tags',
		'category'
	);
	$info = array(
		'url' => 'http://www.magplus.com/about/',
		'name' => 'Mag+'
	);
	
	if($q->have_posts()): while($q->have_posts()): $q->the_post();
		
		#echo '<pre>'; print_r(get_post_custom($post->ID)); echo '</pre>'; die();
		
		// get all meta and put it in an variable
		foreach($video_meta as $meta){
			$$meta = get_post_meta($post->ID, '_mag_video_'. $meta, true);
		}
		
		// enter an small number if empty
		if( empty($duration) ){
			$duration = '60';
		}
		
		if($service == 'vimeo'){
			$video = 'http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0';
		}elseif($service == 'youtube'){
			$video = 'http://www.youtube.com/v/'. $id .'?version=3&f=videos&app=youtube_gdata';
		}
		
		$map .= '
		<url> 
		<loc>'. get_permalink($post->ID) .'</loc>
		<video:video>';
		if($thumbnail) $map .= '
			<video:thumbnail_loc>'. htmlspecialchars($thumbnail) .'</video:thumbnail_loc>';
		$map .= '
			<video:title>'. htmlspecialchars($post->post_title) .'</video:title> 
			<video:description>'. htmlspecialchars( str_replace('&hellip;', '..', substr( get_the_excerpt(), 0, 2048) ) ) .'</video:description>
			<video:player_loc allow_embed="yes" autoplay="ap=1">'. htmlspecialchars($video) .'</video:player_loc>
			<video:duration>'. $duration .'</video:duration>';
		if($pub_date) $map .= ' 
			<video:publication_date>'. $pub_date .'</video:publication_date>';
		// the video tags
		if(!empty($tags)){ foreach($tags as $tag){
			$map .= '
			<video:tag>'. $tag .'</video:tag>';
		}}
		if(!empty($category)){
			$map .= '
			<video:category>'. $category .'</video:category>';
		}
		$map .= '
			<video:family_friendly>yes</video:family_friendly>   
			<video:uploader info="'. $info['url'] .'">'. $info['name'] .'</video:uploader>
			<video:live>no</video:live>
		</video:video> 
	</url>
	';
		
	endwhile; endif; wp_reset_postdata();
	
	$map .= '</urlset>';
	
	$myFile = ABSPATH ."sitemap-video.xml";
	$fh = fopen($myFile, 'w') or die("can't open file");
	fwrite($fh, $map);
	fclose($fh);
	
	
	$filename = ABSPATH ."sitemap-video.xml.gz";
	//open gz -- 'w9' is highest compression
	$fp = gzopen ($filename, 'w9');
	gzwrite ($fp, $map);
	gzclose ($fp); 
	
}