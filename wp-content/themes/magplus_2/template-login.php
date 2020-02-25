<?php
/*
Template name: Logged in
*/

$data = magplus_logged_in();


the_post();
// get a logged in template by title name
$file = TEMPLATEPATH .'/logged-in/'. strtolower($post->post_name) .'.php';

// if the file don't exist redirect to start
if(!file_exists($file)) header('location: http://www.magplus.com');

get_header();

include $file;

get_footer();