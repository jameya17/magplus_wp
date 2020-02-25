<?php
/*
Template Name: List post links
*/
$postID = $wpdb->get_col("
	SELECT ID FROM $wpdb->posts
	WHERE (post_type = 'post')
	AND (post_status = 'publish')
	AND (post_password = '')
");

foreach($postID as $post_link) {
	?>
	<?php echo 	str_replace('.dev:8888', '.com', htmlspecialchars_decode(get_permalink($post_link))); ?><br />
	<?php
}
?>