<?php
define('IS_ZENDESK_HEADER', true);

//Allow access to Suport site. Used for Ajax include of Header and Footer
$origin_s = $_SERVER['HTTP_ORIGIN'];
if(strpos($origin_s,'magplus.zendesk.com')!== false || strpos($origin_s,'support.magplus.com')!== false || strpos($origin_s,'magplus1423624593.zendesk.com')!== false){

  header('Access-Control-Allow-Origin: '.$origin_s);
}


require( '../wp-load.php' );
// get the help and inspiration
query_posts('page_id=17419');
the_post();
require( '../wp-content/themes/magplus_2/head.php' );
?>




<?php get_footer(); ?>