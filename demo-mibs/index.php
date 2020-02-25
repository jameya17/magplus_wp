<?php
/**
 * Return the current url
 */
function AbsURI(){
	$ThisLink = 'http' . (isset($_SERVER["HTTPS"]) ? $_SERVER["HTTPS"] == 'off' ? '' : 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	$UrlParts = parse_url($ThisLink);
	$Path = $UrlParts['path'];
	// Get rid of filename.html in /folder1/folder2/filename.html
	$Path = preg_replace('#(/)([^/]*?\..*?$)#i', '$1', $Path);
	// Make it standard to have trailing / at the end of a foldername
	if (substr($Path, -1) != '/') $Path .= '/';
	$absURI = $UrlParts['scheme'] . '://' . $UrlParts['host'] . $Path;
	return $absURI;
}

$dir = '';
$sub_dir = '';
// check if user visit sub dir and scan that
if( isset($_GET['dir']) ){
	$get_dir = urldecode( $_GET['dir'] );
	// check if the dir exist
	if( is_dir($get_dir) ){
		// set the sub dir from this file
		$sub_dir = $get_dir .'/';
	}
}else{
	// else scan this folder
	$dir = '.';
}

// get all files in the dir
$files = scandir( $dir . $sub_dir );
// An array to stor all the mibs and folders
$filelist = array();
// the current url
$abs_uri = AbsURI();

foreach( $files as $file ){
	// is dir and not . or ..
	if ( is_dir($sub_dir . $file) && $file != '.' && $file != '..' ) {
		$filelist[] = array( "name" => $file, "url" => $abs_uri . '?dir=' . urlencode( $sub_dir . $file ) );
	// only show mibs
	}elseif( pathinfo($file, PATHINFO_EXTENSION) == 'mib' ) {
		$filelist[] = array(
			"name" => $file, 
			"mib_url" => $abs_uri . $sub_dir . $file, 
			"size" => filesize( $sub_dir . $file), 
			"filemtime" => filemtime( $sub_dir . $file )
		);
	}
}

$result = array( "payload" => $filelist, "status" => "ok", "url" => $abs_uri );

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($result);