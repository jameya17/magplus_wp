<?php
/**
 * Show the image insted of a unik page
 * 
 * Why?
 * - many users don't change to show original image
 */
$uploads = wp_upload_dir();
$metadata = wp_get_attachment_metadata();


header("Content-type: ". $post->post_mime_type);  
readfile($post->guid);

#echo '<pre>'; print_r($metadata); echo '</pre>';
#echo '<pre>'; print_r($post); echo '</pre>';