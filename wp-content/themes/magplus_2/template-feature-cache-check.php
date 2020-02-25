<?php
/*
Template name: Featured Page Cache Check

This file creates a cached version of all the subsections of the Features section. 
It's loaded via javascript on the features page after the initial content for the specific URL is loaded (To be SEO friendly)
*/
?>
<script type="text/javascript"> 
var url      = window.location.href; 
if(url=='https://www.magplus.com/feature-cache'){
window.open('https://www.magplus.com/product-features/','_top');
}
 </script>
<?php


$uncache='';
if($_GET['uncache']){
$uncache = $_GET['uncache'];
}

$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';


$file = './cache-features/sub-features.htm';
$url = $root.'feature?id=';


/* ------------------------------------------------------------------------
								Main Function
------------------------------------------------------------------------*/

function get_content($file,$url,$hours = 24,$fn = '',$fn_args = '', $uncache) {
	
	$current_time = time(); 
	$expire_time = $hours * 60 * 60; 
	$file_time = filemtime($file);


	/*----------------- Get Cached file if requirements are met ---------------*/
	//if((file_exists($file) && ($current_time - $expire_time < $file_time)) && (strlen($uncache)<1)) {
	if(file_exists($file) && (strlen($uncache)<1)) {
		//echo 'returning from cached file';
		return file_get_contents($file);
	}

	
	/*----------------- Create or uncache file if needed ---------------*/
	else {
		
		//echo 'create or uncache file'
		$children = get_pages('parent=22179&sort_column=menu_order');
		$content='';
		//print_r(count($children));

		foreach ($children as &$value) {
			
			//Create title of button
			$title = $value->post_title;
			if($title == 'All Features'){
				$title = 'Overview';

			}
			$dataTitle = strtolower(str_replace(" ","-",$title));
	
			$content.= '<div class="'.$dataTitle.' '.$value->ID.'"><div class="shadow-wrapper">'.(get_url($url.$value->ID)).'</div></div>';
			
		}


		//$content = get_url($url);
		if($fn) { $content = $fn($content,$fn_args); }
		$content.= '<!-- cached:  '.time().'-->';
		if (!file_exists($file )) {
			//echo('trying to save file= '.$file);
		   fopen($file , 'w');
		}
		//$content = preg_replace('~>\s+<~', '><', $content);
		file_put_contents($file,$content);
		//echo 'retrieved fresh from '.$url.':: '.$content;
		return $content;
	}
}

/* ------------------------------------------------------------------------
		Gets content from a URL via curl if cache needs to be set
------------------------------------------------------------------------*/

function get_url($url) {
	$username = office;
	$password = teapot418;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5); //timeout after 30 seconds
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
	$content = curl_exec($ch);
	curl_close($ch);
	return $content;
}

/* -----------------------------------------
			Call for Content
--------------------------------------------*/
echo (get_content($file,$url,$hours = 72,$fn = '',$fn_args = '',$uncache));
?>







