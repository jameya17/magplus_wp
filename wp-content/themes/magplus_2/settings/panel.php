<?php



/**
 *  Register the settings page
 */
add_action('admin_menu', 'ps_init_the_options_page'); 
function ps_init_the_options_page() {
	add_options_page('Mag+ settings', 'Mag+ settings', 'administrator', __FILE__, 'ps_the_settings_page');
}


/**
 *   Register the settings
 */
add_action('admin_init', 'ps_register_the_options' );
function ps_register_the_options(){
	// Get the options array
	require_once(TEMPLATEPATH. '/settings/options.php');
	register_setting( 'magplus_options', 'magplus_options', 'ps_validate_magplus_setting' );
 
	add_settings_section('main_section', 'Magp+ theme settings', '__return_false', __FILE__);
 	
 	$i = 0;
 	foreach($magplus_options as $opt){
 		add_settings_field('magplus_opt_'.$i, $opt['title'], 'ps_print_magplus_fields', __FILE__, 'main_section', $opt);
 		$i++;
 	}  
}


/**
 *   The settings page
 */
function ps_the_settings_page() { ?>
<div id="theme-options-wrap" class="wrap">
	<div class="icon32" id="icon-tools"></div>
	<h2><?php _e('Settings'); ?></h2>
	
	<form method="post" action="options.php" enctype="multipart/form-data">
		<?php settings_fields('magplus_options'); ?>
		<?php do_settings_sections(__FILE__); ?>
		<p class="submit">
			<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
	</form>
</div>
<?php
}


/**
 *   Print all form fields
 */
$saved_options = get_option('magplus_options');
function ps_print_magplus_fields($args) {

	global $saved_options;
	//echo '<pre>'; print_r($saved_options); echo '</pre>';
	
	switch($args['type']){
		
		case 'text':
			?>
			 <input name="magplus_options[<?php echo $args['id']; ?>]" class="regular-text" value="<?php echo $saved_options[$args['id']]; ?>" />
			 <?php if(isset($args['desc']) && !empty($args['desc'])): ?><span class="description"><?php echo $args['desc']; ?></span><?php endif; ?>
			 <?php 
			 break;
		
		case 'textarea':
			?> 
			<textarea cols="42" rows="5" name="magplus_options[<?php echo $args['id']; ?>]"><?php echo $saved_options[$args['id']]; ?></textarea>
			<?php if(isset($args['desc']) && !empty($args['desc'])): ?><br /><span class="description"><?php echo $args['desc']; ?></span><?php endif; ?>
			<?php
			break;
			
		case 'radio':
			?> 
			<input type="radio" name="<?php echo $args['id']; ?>" value="<?php echo $saved_options[$args['id']]; ?>" />
			<?php if(isset($args['desc']) && !empty($args['desc'])): ?><br /><span class="description"><?php echo $args['desc']; ?></span><?php endif; ?>
			<?php
			break;
			
		case 'checkbox':
			?> 
			<input type="checkbox" name="<?php echo $args['id']; ?>" value="<?php echo $saved_options[$args['id']]; ?>" />
			<?php if(isset($args['desc']) && !empty($args['desc'])): ?><br /><span class="description"><?php echo $args['desc']; ?></span><?php endif; ?>
			<?php
			break;
			
		case 'dropdown':
			?> 
			<select name="magplus_options[<?php echo $args['id']; ?>]">
				<?php foreach($args['option'] as $k => $v):
					echo '<option '. selected($saved_options[$args['id']], $k) .' value="'. $k .'">'. $v .'</option>';
				endforeach; ?>
			</select>
			<?php if(isset($args['desc']) && !empty($args['desc'])): ?><br /><span class="description"><?php echo $args['desc']; ?></span><?php endif; ?>
			<?php
			break;
	}

}
  
 
// This function can be used to validate the inputs
function ps_validate_magplus_setting($options) {
	return $options;
}



 

/**
 * Theme settings
 *
 * ps_settings()
 */
function get_ps_settings($name){
		
	// get the settings
	$settings = get_option('magplus_options');
	
	// if there aren't any reurn false
	if($settings){
		// if user selected one setting send it and not all
		if($name && isset($settings[$name])){
			$settings = stripslashes($settings[$name]);
		}elseif($name){
			return false;
		}else{
			foreach($settings as $n => $v){
				$settings[$n] = stripslashes($v);
			}
		}
		return $settings;
	}else{
		return false;
	}
}

function ps_settings($opt, $echo = true){

	$opt = (!empty($opt)) ? $opt : false;
	if($echo){
		echo get_ps_settings($opt);
	}else{
		return get_ps_settings($opt);
	}
}
