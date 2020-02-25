<?php
/**
 * Custom meta boxes for posts
 *
 */

add_action('admin_menu','ps_post_meta_box_init');
function ps_post_meta_box_init(){
	// meta boxes on press
	foreach( array('post', 'page', 'video', 'clients', 'press') as $post_type){
		add_meta_box('post_custom_meta', 'Post custom info', 'ps_post_meta_box_setup', $post_type, 'normal', 'high');
	}
	// add a callback function to save any data a user enters in
	add_action('save_post','ps_post_meta_box_save');
}



function ps_post_meta_box_setup(){
	global $post;

	$tag_text = get_post_meta($post->ID, '_tag_wrapp_text', true);
	$tag_pos = get_post_meta($post->ID, '_tag_text_pos', true);
 	?>

 	<p>
 		<strong>Tag text</strong><br />
 		Insert default text:<br />
 		<div class="ps-insert-default-tag-text" data-pos="1">Posted in our <a href="[tag_link]">[tag]</a> series</div>
 		<div class="ps-insert-default-tag-text" data-pos="2">More information about <a href="[tag_link]">[tag]</a></div>
 	</p>


 	<!--Above or under -->
	<p>
		<label for="tag_text_pos">Where the tag text should be</label><br />
		<label>Above <input type="radio" class="ps-tag-pos" name="_tag_text_pos" id="tag_text_pos" <?php if(empty($tag_pos) || $tag_pos == 1) echo 'checked="checked"'; ?> value="1" /></label>
		<label>Under <input type="radio" class="ps-tag-pos" name="_tag_text_pos" <?php if($tag_pos == 2) echo 'checked="checked"'; ?> value="2" /></label>
	</p>

	<!-- tag text -->
 	<p>
		<label for="ps_tag_text">Alternative tag text</label>

		<?php
		/*
		wp_editor( $tag_text, 'ps_tag_text', array(
			'textarea_name' => '_tag_wrapp_text',
			'textarea_rows' => 1,
			'teeny' => true,
			'quicktags' => false,
			'media_buttons' => false,
			'tinymce' => array(
				'theme_advanced_buttons1' => "bold,italic,underline,separator,strikethrough,bullist,numlist,justifyleft,justifycenter,justifyright,undo,redo,link,unlink"
			)
		)); */ ?>

		<textarea class="widefat" name="_tag_wrapp_text" id="ps_tag_text" rows="1"><?php if(!empty($tag_text)) echo $tag_text; ?></textarea>
		<span class="description">Enter the text you want and use [tag_link tag='The tag'] for the link. Use single quotes '</span>
	</p>


	<script type="text/javascript">
		jQuery(document).ready(function($){

			$('.ps-insert-default-tag-text').click(function(){

				var $this = $(this),
					text = $this.html(),
					pos = $this.attr('data-pos'),
					tag = $('.tagchecklist span:first').text().substr(2);

				$('.ps-tag-pos')
					.removeAttr('checked')
					.filter('[value="'+ pos +'"]')
					.attr('checked', 'checked');

				text = text.replace('[tag]', '{'+ tag +'}');
				text = text.replace('[tag_link]', '[tag_link tag=\''+ tag +'\']');

				$('#ps_tag_text').val(text);


				tinyMCE.get('ps_tag_text').execCommand('mceSetContent', false, text);

				return false;
			});



			var $tags = $('#tax-input-post_tag'),
				tags_value = $tags.val();
			//if(!tags_value){
				$tags.live('change', function(){
					alert('majs');
				});
			//}


		});
	</script>




 	<?php
	// create a custom nonce for submit verification later
	echo '<input type="hidden" name="post_meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
}

function ps_post_meta_box_save($post_id)
{
	// authentication checks
	// make sure data came from our meta box
	if (!isset($_POST['post_meta_noncename']) || !wp_verify_nonce($_POST['post_meta_noncename'],__FILE__)) return $post_id;
	// check user permissions
	if ($_POST['post_type'] == 'post'){
		if (!current_user_can('edit_page', $post_id)) return $post_id;
	}
	// authentication passed, save data
	$meta = array(
		'_tag_wrapp_text',
		'_tag_text_pos'
	);
	foreach($meta as $m){
		$_POST[$m] = str_replace('%20', ' ', $_POST[$m]);
		if (!isset($_POST[$m]) || is_null($_POST[$m])) delete_post_meta($post_id, $m);
		else update_post_meta($post_id, $m, $_POST[$m]);
	}
	return $post_id;
}







add_shortcode('tag_link', 'ps_mag_tag_link');
function ps_mag_tag_link( $atts ){
	extract( shortcode_atts( array(
		'tag' => false
	), $atts));

	// get all tags
	$tags = get_the_tags();
	$final_tag = false;
	// if tag isset
	if($tag){
		// check if it exist in the list
		foreach($tags as $t){
			if($tag == $t->name){
				$final_tag = $t->term_id;
				break;
			}
		}
	}

	if(!$final_tag){
		$final_tag = $tags[0]->term_id;
	}
	return get_tag_link($final_tag);
}

add_shortcode('mag_tag', 'ps_mag_tag');
function ps_mag_tag( $atts ){
	extract( shortcode_atts( array(
		'text' => false,
		'tag' => 1
	), $atts));
	#echo '<pre>'; print_r(get_the_tags()); echo '</pre>';

	// get the selected tag
	$tags = get_the_tags();
	$the_tag = '';
	$i = 0;
	foreach( $tags as $t ){ $i++;
		if($tag === $i){
			$the_tag = $t;
			break;
		}
	}
	$text = str_ireplace('-tag-', $the_tag->name, $text);

	// if no text isset use the tags name
	if(!$text) $text = $the_tag->name;

	return '<a href="'. get_tag_link($the_tag->term_id) .'">'. do_shortcode($text) .'</a>';
}

add_shortcode('tag_name', 'ps_tag_name_shortcode');
function ps_tag_name_shortcode(){
	$tags = get_the_tags();
	$the_tag = array_shift($tags);
	return $the_tag->name;
}










