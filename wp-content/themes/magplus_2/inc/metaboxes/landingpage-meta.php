<?php
/**
 * Custom meta boxes
 *
 */

add_action('add_meta_boxes','ps_landingpage_meta_init');
function ps_landingpage_meta_init(){
	
	global $post;
	
	if(isset($post->page_template) && ($post->page_template == 'template-landingpage.php' || $post->page_template == 'template-landingpage-2.php') ){
		// meta boxes on press
		add_meta_box('landingpage_custom_meta', 'Landingage custom info', 'ps_landingpage_meta_setup', 'page', 'normal', 'high');
	}
}
// add a callback function to save any data a user enters in
add_action('save_post','ps_landingpage_meta_save');


function ps_landingpage_meta_setup(){

	global $post, $wp_registered_sidebars;
	$all_sidebars = $wp_registered_sidebars;
	
	$meta = get_post_meta($post->ID, '_landing_meta', true);
	
	
	/*
	 * An alternative background image
	 */
	if(!empty($meta['bg'])){
		if(!is_numeric($meta['bg'])){
			$src = $meta['bg'];
		}else{
			$img = wp_get_attachment_image_src($meta['bg'], 'thumbnail');
			$src = $img[0];
		}
	}else{
		$src = get_bloginfo('wpurl').'/wp-admin/images/media-button-image.gif';
	}
	
 	?>
 	<div class="ps-landing-page-meta-wrapp">
 	<p class="group">
		<a title="Add image" class="thickbox" id="ps_landing_img_link" href="media-upload.php?post_id=<?php echo $post->ID; ?>&amp;type=image&amp;TB_iframe=1&amp;width=640&amp;height=452">
			<img alt="Add image" width="150" height="150" id="ps_landing_img" src="<?php echo $src; ?>" />
		</a>
		<label for="ps_landing_img_input">Change the default background image</label><br />
		<input type="text" name="_landing_meta[bg]" id="ps_landing_img_input" value="<?php if(!empty($meta['bg'])) echo $meta['bg']; ?>"/>
		<span class="description">ID of the background image or url</span>
		
		<br />
		<label for="landing_background_repeat">Background repeat</label><br />
		<select name="_landing_meta[bg_repeat]" id="landing_background_repeat">
			<?php
			$values = array('repeat', 'no-repeat', 'repeat-x', 'repeat-y');
			foreach($values as $v){
				echo '<option '. selected($meta['bg_repeat'], $v) .'>'. $v .'</option>';
			}
			?>
		</select>
		<span class="description">Select how the background image will be repeated or not</span>
		
		<br />
		<label for="landing_background_horz">Background position horizontal and vertical</label><br />
		<select name="_landing_meta[bg_horz]" id="landing_background_horz">
			<?php
			$values = array('left', 'center', 'right');
			foreach($values as $v){
				echo '<option '. selected($meta['bg_horz'], $v) .'>'. $v .'</option>';
			}
			?>
		</select>
		<select name="_landing_meta[bg_vert]" id="landing_background_vert">
			<?php
			$values = array('top', 'center', 'bottom');
			foreach($values as $v){
				echo '<option '. selected($meta['bg_vert'], $v) .'>'. $v .'</option>';
			}
			?>
		</select>
		
		<br />
		<label for="landing_background_color">Background color</label><br />
		<input type="text" class="pickcolor" name="_landing_meta[bg_color]" id="landing_background_color" value="<?php if(!empty($meta['bg_color'])) echo $meta['bg_color']; ?>"/>
		<span class="description">Enter a background color e.g. #EA680B</span>
	</p>
	
	
	<p>
		<label>Dark or light background?</label><br>
		<label><input type="radio" name="_landing_meta[bg_dark_light]" value="light" <?php if($meta['bg_dark_light'] != 'dark') echo 'checked="checked"'; ?>> Light</label>
		<label><input type="radio" name="_landing_meta[bg_dark_light]" value="dark" <?php if(isset($meta['bg_dark_light']) && $meta['bg_dark_light'] == 'dark') echo 'checked="checked"'; ?>> Dark</label>
	</p>
	
	<p>
		<label for="landing_custom_content"><strong>Use a video instead of featured image</strong></label><br />
		<textarea name="_landing_meta[custom-content]" id="landing_custom_content"  class="widefat"><?php if(!empty($meta['custom-content'])) echo $meta['custom-content']; ?></textarea><br />
		<span class="description">Enter the embed code</span>
	</p>
	
	<p>
		<label for="landing_mini_title">Mini title</label><br />
		<input name="_landing_meta[mini-title]" id="landing_mini_title" class="widefat" value="<?php if(!empty($meta['mini-title'])) echo $meta['mini-title']; ?>">
	</p>
	
	<!--   Choose and order sidebars   -->
	<div class="group">
	
		<strong><?php _e('Order and select sidebars', 'magplus_backend'); ?></strong>
		<div class="landing-sidebars" id="ps_landing_sidebars">
			<?php 
			
			$sidebars = array();
			
			if(!empty($meta['order'])){
				$sidebars_tmp = explode(',', $meta['order']);
				foreach($sidebars_tmp as $sidebar){
					$s_tmp = explode('::', $sidebar);
					$all_sidebars[$s_tmp[0]]['cols'] = $s_tmp[1]; 
					$sidebars[$s_tmp[0]] = $all_sidebars[$s_tmp[0]];
					unset($all_sidebars[$s_tmp[0]]);
				}
			}
			
			$all_sidebars = array_merge($sidebars, $all_sidebars);
			
			//echo '<pre>'; print_r($all_sidebars); echo '</pre>';
			 
			//echo '<pre>'; print_r($wp_registered_sidebars); echo '</pre>';
			
			$widget_cols = array( 'one', 'two', 'three', 'four');
			foreach($all_sidebars as $sidebar): 
				
				if(isset($sidebar['cols'])){
					$cols = $sidebar['cols']; 
				}else{
					$cols = false;
				}
				?>
				
				<div class="landing-sidebar" data-id="<?php echo $sidebar['id']; ?>">
					<label class="ps-custom-checkbox">
						<input type="checkbox" name="landing-show" class="ps-landing-show" <?php if($cols) echo 'checked="checked"'; ?> />
						<span class="ps-landing-sidebar-name"><?php echo $sidebar['name']; ?></span>
					</label>
					
					<select name="landing-cols" class="ps-landing-cols">
						<?php foreach($widget_cols as $col): ?>
							<option value="<?php echo $col; ?>" <?php selected($col, $cols); ?>><?php echo ucfirst($col); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				
			<?php endforeach; ?>
		</div>
		
		<input type="hidden" name="_landing_meta[order]" id="ps_landing_order" value="<?php if(!empty($meta['order'])) echo $meta['order']; ?>"/><br />
	</div>
	
	
	 
	<!--   Turn on off header/footer   -->
	<div class="mag-label-desc-wrap">
		<h4><?php _e('Turn on/off header and/or footer', 'magplus_backend'); ?></h4>
		
		<div class="mag-admin-table">
		<?php /*
			<div class="mag-admin-row group">
				<label class="ps-custom-checkbox">
					<input type="checkbox" <?php echo (isset($meta['header'])) ? 'checked="checked"' : ''; ?> name="_landing_meta[header]" />
					<span><?php _e('Hide header', 'magplus_backend'); ?></span>
				</label>
				<span class="description"><?php _e('Checking this will remove the header on the landing page', 'magplus_backend'); ?></span>
			</div>
			
			<div class="mag-admin-row group">
				<label class="ps-custom-checkbox">
					<input type="checkbox" <?php echo (isset($meta['menu'])) ? 'checked="checked"' : ''; ?> name="_landing_meta[menu]" />
					<span><?php _e('Hide the menu to', 'magplus_backend'); ?></span>
				</label>
				<span class="description"><?php _e('Checking this will remove the menu if hide header isset', 'magplus_backend'); ?></span>
			</div>
			*/
			?>
			<div class="mag-admin-row group">
				<label class="ps-custom-checkbox">
					<input type="checkbox" <?php echo (isset($meta['footer'])) ? 'checked="checked"' : ''; ?> name="_landing_meta[footer]" />
					<span><?php _e('Hide footer', 'magplus_backend'); ?></span>
				</label>
				<span class="description"><?php _e('Checking this will remove the footer', 'magplus_backend'); ?></span>
			</div>
		</div>
	</div>
	</div>
 	<?php


	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="landingpage_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function ps_landingpage_meta_save($post_id){
	
	// authentication checks
	// make sure data came from our meta box
	if (!isset($_POST['landingpage_meta_noncename']) || !wp_verify_nonce($_POST['landingpage_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'page'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data
	
	
	$current_data = get_post_meta($post_id, '_landing_meta', TRUE);
	$new_data = $_POST['_landing_meta'];
	#echo '<pre>'; print_r($_POST['_landing_meta']); echo '</pre>'; die();
	
	
	ps_theme_meta_clean($new_data);

	if ($current_data)
	{
		if (is_null($new_data)) delete_post_meta($post_id,'_landing_meta');
		else update_post_meta($post_id,'_landing_meta',$new_data);
	}
	elseif (!is_null($new_data))
	{
		add_post_meta($post_id,'_landing_meta',$new_data,TRUE);
	}

	return $post_id;
}

/**
 * 
 *   Loop through an array and unset empty items
 * 
 */
function ps_theme_meta_clean(&$arr){
	if (is_array($arr)){
		foreach ($arr as $i => $v){
			if (is_array($arr[$i])){
				ps_theme_meta_clean($arr[$i]);
				if (!count($arr[$i])){
					unset($arr[$i]);
				}
			}else{
				if (trim($arr[$i]) == ''){
					unset($arr[$i]);
				}
			}
		}
		if (!count($arr)){
			$arr = NULL;
		}
	}
}



/*
function ps_get_part_of_url($str, $sep = '/'){
	$len = strlen($str);
	$pos = strripos($str, $sep);
	// if the last / is last char
	if($pos == ($len -1)){
		$str = substr($str, 0, -1); // remove the ending /
		$pos = strripos($str, $sep); // get the secound / from behinde
	}
	// if / exsist remove all before last
	if($pos !== false){
		$str = substr($str, ($pos + 1));
	}
	
	// if v= is in the url remove it and everything except the 
	$pos = stripos($str, 'v=');
	if($pos !== false){
		$str = substr($str, ($pos + 2));
		// remove all after if there is any
		$pos = stripos($str, '&');
		if($pos !== false){
			$str = substr($str, 0, $pos);
		}
	}
	return $str;
}
*/
