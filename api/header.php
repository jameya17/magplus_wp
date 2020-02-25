<?php
define('IS_ZENDESK_HEADER', true);

//Allow access to Suport site. Used for Ajax include of Header and Footer
$origin_s = $_SERVER['HTTP_ORIGIN'];
if(strpos($origin_s,'magplus.zendesk.com')!== false || strpos($origin_s,'support.magplus.com')!== false || strpos($origin_s,'magplus1423624593.zendesk.com')!== false){

  header('Access-Control-Allow-Origin: '.$origin_s);
  header('Access-Control-Allow-Credentials: true');
}


require( '../wp-load.php' );
// get the help and inspiration
query_posts('page_id=17419');
the_post();
get_header();

?>


<script>
	<?php 
	$user = magplus_logged_in_check();
	if($user) {
		echo 'ps_tmp_user_login = true;';
	}else{
		echo 'ps_tmp_user_login = false;';
	}
	?>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="application/javascript" src="https://www.magplus.com/api/header.js"></script>
</body>
</html>