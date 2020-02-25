<?php
/**
 * Custom meta boxes
 *
 */
/*
26286290

Array
(
    [0] => stdClass Object
        (
            [id] => 26286290
            [title] => Creative Use of Layers
            [description] => The Power Broker, from Popular Science

This feature story employs a common single-text-column reading experience, but creatively uses masks on the A layer (inspired by the style of the opening illustration) to subtly hint at the changing photos in the background and keep the reader's attention on the copy.
            [url] => http://vimeo.com/26286290
            [upload_date] => 2011-07-11 15:12:21
            [thumbnail_small] => http://b.vimeocdn.com/ts/173/524/173524150_100.jpg
            [thumbnail_medium] => http://b.vimeocdn.com/ts/173/524/173524150_200.jpg
            [thumbnail_large] => http://b.vimeocdn.com/ts/173/524/173524150_640.jpg
            [user_name] => Mag+
            [user_url] => http://vimeo.com/magplus
            [user_portrait_small] => http://b.vimeocdn.com/ps/177/485/1774850_30.jpg
            [user_portrait_medium] => http://b.vimeocdn.com/ps/177/485/1774850_75.jpg
            [user_portrait_large] => http://b.vimeocdn.com/ps/177/485/1774850_100.jpg
            [user_portrait_huge] => http://b.vimeocdn.com/ps/177/485/1774850_300.jpg
            [stats_number_of_likes] => 1
            [stats_number_of_plays] => 636
            [stats_number_of_comments] => 0
            [duration] => 35
            [width] => 424
            [height] => 552
            [tags] => mag+, ipad
            [embed_privacy] => anywhere
        )

)
lKM1IFKr0eo

stdClass Object
(
    [apiVersion] => 2.1
    [data] => stdClass Object
        (
            [id] => lKM1IFKr0eo
            [uploaded] => 2011-11-04T12:01:03.000Z
            [updated] => 2011-11-04T12:39:07.000Z
            [uploader] => magplus
            [category] => Howto
            [title] => Walk through digital publishing with Mag+
            [description] => Learn how to create pixel perfect apps for iPad and Android tablets. It's like having a print button for the touchscreen. <a href="http://www.magplus.com/digital-publishing/">The tools are free</a>. Download now from www.magplus.com and play around!
            [tags] => Array
                (
                    [0] => digtial publishing
                    [1] => software tutorial
                    [2] => ipad publishing
                    [3] => tablet publishing
                    [4] => create apps
                )

            [thumbnail] => stdClass Object
                (
                    [sqDefault] => http://i.ytimg.com/vi/lKM1IFKr0eo/default.jpg
                    [hqDefault] => http://i.ytimg.com/vi/lKM1IFKr0eo/hqdefault.jpg
                )

            [player] => stdClass Object
                (
                    [default] => http://www.youtube.com/watch?v=lKM1IFKr0eo&feature=youtube_gdata_player
                    [mobile] => http://m.youtube.com/details?v=lKM1IFKr0eo
                )

            [content] => stdClass Object
                (
                    [5] => http://www.youtube.com/v/lKM1IFKr0eo?version=3&f=videos&app=youtube_gdata
                    [1] => rtsp://v4.cache2.c.youtube.com/CiILENy73wIaGQnq0atSIDWjlBMYDSANFEgGUgZ2aWRlb3MM/0/0/0/video.3gp
                    [6] => rtsp://v3.cache3.c.youtube.com/CiILENy73wIaGQnq0atSIDWjlBMYESARFEgGUgZ2aWRlb3MM/0/0/0/video.3gp
                )

            [duration] => 119
            [aspectRatio] => widescreen
            [rating] => 5
            [likeCount] => 1
            [ratingCount] => 1
            [viewCount] => 41
            [favoriteCount] => 0
            [commentCount] => 0
            [accessControl] => stdClass Object
                (
                    [comment] => allowed
                    [commentVote] => allowed
                    [videoRespond] => moderated
                    [rate] => allowed
                    [embed] => allowed
                    [list] => allowed
                    [autoPlay] => allowed
                    [syndicate] => allowed
                )

        )

)
*/


add_action('wp_head', 'ps_video_header_info');
function ps_video_header_info(){
	global $post;
	if(is_single() && get_post_type() == 'video'){
	
		$id = get_post_meta($post->ID, '_mag_video_id', true);
		$service = get_post_meta($post->ID, '_mag_video_service', true);
		$thumbnail = get_post_meta($post->ID, '_mag_video_thumbnail', true);
		$height = get_post_meta($post->ID, '_mag_video_height', true);
		$width = get_post_meta($post->ID, '_mag_video_width', true);
		
		if($service == 'vimeo'){
			$video = 'http://player.vimeo.com/video/'. $id .'?title=0&byline=0&portrait=0';
		}elseif($service == 'youtube'){
			$video = 'http://www.youtube.com/v/'. $id .'?version=3&f=videos&app=youtube_gdata';
		}
		/*
		if($service == 'vimeo'){
			$video_info = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'. $id .'.json'));
		}elseif($service == 'youtube'){
			$video_info = json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/videos/'. $id .'?v=2&alt=jsonc&prettyprint=true'));
		}
		echo '<pre>'; print_r($video_info); echo '</pre>';
		*/
		?>
		<link rel="image_src" href="<?php echo $thumbnail; ?>" />
	    <link rel="video_src" href="<?php echo $video; ?>"/>
	    <?php if(!empty($height)): ?>
		    <meta name="video_height" content="<?php echo $height; ?>" />
		    <meta name="video_width" content="<?php echo $width; ?>" />
		<?php endif;
		
	}
}





// http://player.vimeo.com/video/26286290?title=0&byline=0&portrait=0

add_action('admin_menu','ps_video_meta_init');
function ps_video_meta_init(){
	
	// meta boxes on press
	add_meta_box('video_custom_meta', 'Video custom info', 'ps_video_meta_setup', 'video', 'normal', 'high');

	// add a callback function to save any data a user enters in
	add_action('save_post','ps_video_meta_save');
}


$video_meta_prefix = '_mag_video_';
$ps_video_meta = array(
	array(
		'title' => 'Video ID',
		'meta_name' => 'id',
		'desc' => 'The ID of the video',
		'type' => 'text'
	),
	array(
		'title' => 'Video service',
		'meta_name' => 'service',
		'desc' => 'Where is the movie?',
		'type' => 'dropdown',
		'opts' => array('youtube', 'vimeo')
	),
	/*
	array(
		'title' => 'Video width',
		'meta_name' => 'width',
		'desc' => 'Width of the video',
		'type' => 'text'
	),
	array(
		'title' => 'Height',
		'meta_name' => 'height',
		'desc' => 'Height of the video',
		'type' => 'text'
	),
	array(
		'title' => 'Duration',
		'meta_name' => 'duration',
		'desc' => 'The vidoe thumbnail',
		'type' => 'text'
	)*/
);


function ps_video_meta_setup()
{
	global $post, $ps_video_meta, $video_meta_prefix;
	
	// get all meta
	foreach($ps_video_meta as $meta){
		$$meta['meta_name'] = get_post_meta($post->ID, $video_meta_prefix . $meta['meta_name'], true);
	}
	
	$thumb = get_post_meta($post->ID, '_mag_video_thumbnail', true);
	if(!empty($thumb)){
		echo '<img src="'. $thumb .'" alt="video image" width="auto" height="100" />';
	}
	
	foreach($ps_video_meta as $video): 
		switch($video['type']){
			case 'text': ?>
			 	<p>
					<label for="ps_video_<?php echo $video['meta_name']; ?>"><?php echo $video['title']; ?></label>
					<input class="widefat" type="text" name="<?php echo $video_meta_prefix.$video['meta_name']; ?>" id="ps_video_<?php echo $video['meta_name']; ?>" value="<?php if(!empty($$video['meta_name'])) echo $$video['meta_name']; ?>"/>
					<div class="description"><?php echo $video['desc']; ?></div>
				</p>
				<?php break;
			case 'dropdown': ?>
				<p>
					<label for="ps_video_<?php echo $video['meta_name']; ?>"><?php echo $video['title']; ?></label>
					<select class="widefat" type="text" name="<?php echo $video_meta_prefix.$video['meta_name']; ?>" id="ps_video_<?php echo $video['meta_name']; ?>">
						<?php foreach($video['opts'] as $opt){ ?>
						<option <?php selected($$video['meta_name'], $opt); ?>><?php echo $opt; ?></option>
						<?php } ?>
					</select>
					<div class="description"><?php echo $video['desc']; ?></div>
				</p>
 			<?php break;
 		}
 	endforeach;
	
	echo get_post_meta($post->ID, '_mag_video_thumbnail', true);


	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="video_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function ps_video_meta_save($post_id)
{
	// authentication checks
	// make sure data came from our meta box
	if (!isset($_POST['video_meta_noncename']) || !wp_verify_nonce($_POST['video_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'video'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data 28417953
	
	
	global $ps_video_meta,$video_meta_prefix;
	
	
	$id = $_POST['_mag_video_id'];
	$service = $_POST['_mag_video_service'];
	$video = array();
	
	if($service == 'vimeo'){
		$v = json_decode(file_get_contents('http://vimeo.com/api/v2/video/'. $id .'.json'));
		
		$video = array(
			'height' => $v[0]->height,
			'width' => $v[0]->width,
			'thumbnail' => $v[0]->thumbnail_large,
			'duration' => $v[0]->duration,
			'pub_date' => $v[0]->upload_date,
			'tags' => explode(',', $v[0]->tags)
		);
		
	}elseif($service == 'youtube'){
		$v = json_decode(file_get_contents('http://gdata.youtube.com/feeds/api/videos/'. $id .'?v=2&alt=jsonc&prettyprint=true&key=AI39si74MwU8qSJhJfr7hULRgi_uEHiA_x560LwWNSN6cE9HXDeJYV7fMgDZaxD4zqy0KV2woAJXvKpJJ7dl0pq1V3QK54Pa6A'));
		
		$video = array(
			'thumbnail' => $v->data->thumbnail->hqDefault,
			'duration' => $v->data->duration,
			'tags' => $v->data->tags,
			'category' => $v->data->category,
			'pub_date' => $v->data->uploaded
		);
	}
	#echo '<pre>'; print_r($video); echo '</pre>'; die();
	
	foreach($video as $name => $v){
		$name = $video_meta_prefix . $name;
		if (empty($v)) delete_post_meta($post_id, $name);
		else update_post_meta($post_id, $name, $v);
	}
	
	foreach($ps_video_meta as $m){
		$name = $video_meta_prefix . $m['meta_name'];
		if (!isset($_POST[$name]) || is_null($_POST[$name])) delete_post_meta($post_id, $name);
		else update_post_meta($post_id, $name, $_POST[$name]);
	}
	
	include(TEMPLATEPATH .'/inc/create-video-sitemap.php');
	ps_create_video_sitemap();
	
	
	return $post_id;
}