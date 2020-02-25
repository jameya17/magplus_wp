
<?php
/**
 * - Signup
 * - Download
 * - Installation msg
 */
 
 //include 'https://www.magplus.com/social-login/facebook/class.IPInfoDB.php';
 //echo (__DIR__)."<hr>";
// $absolutepath = dirname(dirname(dirname(dirname(dirname(__FILE__)))));
 //die($absolutepath);
// $includePathOfConfig = $absolutepath.'/social-login/facebook/config.php';
// require_once $includePathOfConfig;
 
// $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);

//$wecho = htmlspecialchars ($loginURL);
//echo $wecho;
//die("fffff".$includePathOfConfig);
//$wecho = htmlspecialchars ($loginURL);
//echo $wecho;
 
$devEnvironments = array("d3v.magplus.com", "www.magplus.dev");
if(in_array($_SERVER['SERVER_NAME'], $devEnvironments)){
	define('MAGPLUS_REGISTER_URL', "https://staging-publish.magplus.com/registration");
	//define('MAGPLUS_REGISTER_REDIRECT', "http://d3v.magplus.com/my-magplus/");
	//define('MAGPLUS_VERIFY_REDIRECT', "https://d3v.magplus.com/my-magplus/");
	define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");
	define('MAGPLUS_VERIFY_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");

	define('MAGPLUS_FAILED_REDIRECT', "http://d3v.magplus.com/signup/");
	define('MAGPLUS_DOWNLOAD_URL', "https://download.magplus.com/");
}else{
	//define('MAGPLUS_REGISTER_URL', "https://alpha-publish.magplus.com/registration");
	define('MAGPLUS_REGISTER_URL', "https://publish.magplus.com/registration");
	//define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/my-magplus/?message=new-user");
	//define('MAGPLUS_VERIFY_REDIRECT', "https://www.magplus.com/my-magplus/?message=new-user");
	define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");
	define('MAGPLUS_VERIFY_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");
	define('MAGPLUS_FAILED_REDIRECT', "https://www.magplus.com/signup/");
	define('MAGPLUS_DOWNLOAD_URL', "https://download.magplus.com/");
}



/**************************************************
 *
 * - Signup
 *
 **************************************************/

/**
 * Creates a login form
 */
function magplus_login_form( $args = array(), $echo = true ){
	$default = array(
		'origin' => get_bloginfo('url') .'/my-magplus/?message=new-user',
		'title' => '',
		'text' => '',
		'submit' => 'Login',
		'class' => ''
	);
	extract(array_merge( $default, $args ));

	$out = '';

	$out .= '<form action="https://login.magplus.com/auth/identity/callback" class="magform magplus-half-form" method="post">';
	$out .= $title;
	$out .= ($text) ? '<div class="p login-text">'. $text .'</div>' : '';
	$out .= "\t\t".'<div class="form-row">
			<label for="auth_key">Email</label>
			<input type="email" name="auth_key">
		</div>
		<div class="form-row">
			<label for="password">Password</label>
			<input type="password" name="password" />
		</div>
		<div class="form-row last-row">
			<input type="hidden" name="origin" value="'. $origin .'" />
			<input type="submit" name="commit" class="primary-button" value="'. esc_attr($submit) .'" />
		</div>
	</form>';
	if( $echo ){
		echo $out;
	}else{
		return $out;
	}
}
add_shortcode('magplus_loginform', 'magplus_login_form_shortcode');
function magplus_login_form_shortcode( $atts, $content ){
	if ( '</p>' == substr( $content, 0, 4 ) ) $content = substr( $content, 4 );
	if ( '<p>' == substr( $content, -3 ) ) $content = substr( $content, 0, -3 );
	$atts['text'] = $content;
	return magplus_login_form($atts, false);
}



/**
 *
 */




function magplus_sign_up_form(){
	//Just one step away from getting the tools First name
	$data_org = get_user_country_by_ip();
	$number_prefix = '';
	if( $data_org ){
		$data = json_decode($data_org);
		if(isset($data->countryCode)){
			$countryCode = strtolower($data->countryCode);
			$number_prefix = country_number_codes($countryCode);
			if($number_prefix){
				$number_prefix = '+'. $number_prefix .' ';
			}
		}
	}

	//Reormat Use IP json data for MAG+ DB 
	$reginfo = '{"ipinfo":{"ip_address":"'.$data->ipAddress.'","ip_type":"Mapped","Location":{"continent":"N/A","latitude":'.$data->latitude.',"longitude":'.$data->longitude.',"CountryData":{"country":"'.strtolower($data->countryName).'","country_code":"'.strtolower($data->countryCode).'"},"region":"N/A","StateData":{"state":"'.strtolower($data->regionName).'","state_code":"'.strtolower($data->regionCode).'"},"dma":"N/A","msa":"N/A","CityData":{"city":"'.strtolower($data->cityName).'","postal_code":"'.$data->zipCode.'","time_zone":"'.$data->timeZone.'","area_code":" "}}}}';

	//if (!empty($data)) { header("location:https://www.magplus.com/my-magplus/");} 
	
	
	
	
	
	$referral = unserialize(stripcslashes($_COOKIE['mp_referral']));
	$referral = json_encode($referral);
	$out = '';
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$out .= '
	<div class="w3-container w3-center w3-animate-top">
   <h1 class="toph1 text-pop-up-top">Create your mag+ Account</h1>
   <div id="message" style="display: none;">
			<div style="padding: 5px;">
				<div id="inner-message" class="alert alert-error"><button class="close" type="button" data-dismiss="alert">×</button></div>
			</div>
		</div>
   
   	  <div class="social_login_btn_div1"></div>
<div class="social_login_btn_div"><a class="social_login_btns btns_back1" href="https://www.magplus.com/social-login/google/google_login.php"><i class="fa fa-google i_ss"></i> Login with Google</a></div>
<br>
<div class="social_login_btn_div"><a  class="social_login_btns btns_back2" href="https://www.magplus.com/social-login/facebook/"><i class="fa fa-facebook i_ss"></i> Login with Facebook</a></div>

		

   <br>
  <div class="social_login_btn_div"><a href="https://www.magplus.com/social-login/microsoft/live_login.php" class="social_login_btns btns_back3"><i class="fa fa-windows i_ss"></i> Login with Microsoft</a></div>
   <!--</div>-->
<div class="social_login_ss">
   <h4>- or -</h4>
</div>
<div class="social_login_btn_div1"></div>
<div class="social_login_btn_div"><a class="social_login_btns btns_back4" href=""><i class="fa fa-envelope-o i_ss"></i> Login with Email</a></div>
   <div class="div_form">
      <form autocomplete="off" id="magplus_signup2" action="'. MAGPLUS_REGISTER_URL .'" class="magform magplus-half-form magplus-signup" method="post">
		
	  
	  
	  
	  <!---------------------------------------------------------------------------------------------------------------------->
	  

	  <!----------------------------------------------------------------------------------------------------------------------->
	  
	    <input type="hidden" name="utf8" value="âœ“">
		<input type="hidden" id="redirect_to" name="redirect_to" value="'. MAGPLUS_REGISTER_REDIRECT .'">
		<input type="hidden" id="verify_redirect_to" name="verify_redirect_to" value="'. MAGPLUS_VERIFY_REDIRECT .'">
		<input type="hidden" name="failed_redirect_to" value="'. MAGPLUS_FAILED_REDIRECT .'">
		
		<!--<input id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" class="00N7F00000HNBcC" size="20" type="hidden" value="">-->
		<input  id="sf_00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="'.$ipaddress.'" />
		<input  id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="'.$ipaddress.'" />
	  
	  
         <div id="row_form1" class="row_form">
            <div class="column_form">
               <label class="dis_non_lable" for="registration-first-name">First name
               <span>*</span>
               </label>
               <br>
               <input class="text margin_l" placeholder="First Name *" name="registration[first_name]" type="text" autofocus="autofocus" pattern="[a-zA-Z\s]*" title="Only Alphabets" required="required">
               <span class="ps-error"></span>
            </div>
            <div class="column_form">
               <label class="dis_non_lable" for="registration-name">Last name
               <span>*</span>
               </label>
               <br>
               <input onfocus="myFunction2()" placeholder="Last Name *" class="text margin_l" name="registration[name]" required="required" pattern="[a-zA-Z\s]*" title="Only Alphabets" type="text">
               <span class="ps-error"></span>
            </div>
         </div>
         <div id="row_form2" class="row_form displaynone">
            <div class="column_form_2">
               <label class="dis_non_lable" for="registration-first-name">Email
               <span">*</span>
               </label>
               <br>
               <input class="text" onfocus="myFunction3()" placeholder="Email *" name="registration[email]" type="email" required="" placeholder="Email *" autofocus="autofocus"  required="required">
               <span class="ps-error"></span>
            </div>
         </div>
         <div id="row_form3" class="row_form displaynone">
            <div class="column_form_2">
               <label class="dis_non_lable" for="registration-first-name">Password
               <span>*</span>
               </label>
               <br>
               <input class="text" id="registration_password" onfocus="myFunction4()" placeholder="Password *" name="registration[password]" type="password" autofocus="autofocus" pattern="([A-z0-9À-ž\s]){6,}" title="at least 6 alphanumeric characters" required="required">
               <span class="ps-error"></span>
            </div>
         </div>
         <div id="row_form4" class="row_form displaynone">
            <div class="column_form_2">
			<div class="signup-row signup-country-row margin0">
			<!--<label for="registration-phone">
				Phone <sup><span class="required">*</span></sup>
			</label>-->
			'.
			country_select($countryCode)
			.'
			<input onfocus="myFunction5()" placeholder="Phone *" class="registration-phone no-spin padding29"  name="registration[phone]" type="number" required="required"  title="Only Numeric For Your Moblie/Phone Number ">
			<span class="ps-error"></span>
		</div>	
			
               <!--<label for="registration-first-name">Phone
               <span>*</span>
               </label>
               <br>
               <input class="text" onfocus="myFunction5()" placeholder="Phone" name="registration[phone]" placeholder="Phone *" pattern="[0-10]" title="Valid Phone Number" type="number" autofocus="autofocus" required="required">
               <span class="ps-error"></span>-->
            </div>
         </div>
         <div id="row_form5" class="row_form displaynone">
            <div class="column_form_2">
               <label class="dis_non_lable" for="registration-first-name">Company
               <span>*</span>
               </label>
               <br>
               <input class="text mar_top_cpn"  placeholder="Company *" name="registration[company]" type="text" autofocus="autofocus" pattern="[a-zA-Z\s]*" required="required">
               <span class="ps-error"></span>
            </div>
         </div>
<div id="row_form7" class="row_form displaynone">
            <div class="column_form_2">
               <label class="gdpr checkedcls2">
                  <input  type="checkbox" name="accept_terms_0" id="accept_terms_0" class="accept-terms" checked="" checked>
				  <input name="registration[accept_terms]" id="accept_terms" type="hidden" type="text" value="true" />
                  <p class="pchk">I agree to the 
                     <a class="tnadc" href="https://www.magplus.com/legal/eula/" target="_blank">Terms of Service </a>  & 
                     <a class="tnadc" href="https://www.magplus.com/legal/privacy-policy" target="_blank">Privacy Policy </a>
                  </p>
               </label>
            </div>
         </div>
         <div id="row_form6" class="row_form displaynone">
            <div class="column_form_2">
               <label class="gdpr checkedcls1">
                  <input  type="checkbox" name="gdpr_0" id="gdpr_0" class="accept-terms" checked="" checked>
				  <input name="registration[gdpr]" id="gdpr" type="hidden" type="text" value="true" />
                  <p class="pchk">Yes I would like mag+ to contact me based on the information provided</p>
               </label>
            </div>
         </div>
         <div style="dispaly:none;">
		 <textarea  style="display:none;" id="sf_descriptions" name="registration[description]" placeholder="">	&nbsp; 	&nbsp;</textarea>
		 <input type="hidden" id="sf_street" class="w2linput hidden street_sf" name="street" value="">
		 <input type="hidden" id="sf_city" class="w2linput hidden city_sf" name="city" value="">
		 <input type="hidden" id="sf_state"  class="w2linput hidden state_sf" name="registration[state]" value="">
		 <input type="hidden" id="sf_zip" class="w2linput hidden zip_sf" name="zip" value=" ">
		 <input type="hidden" id="sf_country" class="w2linput hidden country_sf" name="country" value="">
		 <input type="hidden" id="sf_Form_Name__c" class="w2linput hidden" name="Form_Name__c" value="">
		 <input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Url - ">
		 <input type="hidden" name="registration[ip_info]" value=\''. $reginfo .'\'>
		<input type="hidden" name="registration[traffic]" value=\''. $referral .'\'>
		 </div>
         <div id="row_form8" class="row_form displaynone">
            <div class="column_form_2">
               <input name="commit" id="pr_button" class="primary-button" type="submit" value="Create Account">
            </div>
         </div>
      </form>
   </div>
</div>
<div class="alignright desc">
   <br>Already have an account? 
   <a class="already" href="https://login.magplus.com/">Log in</a>
</div>
	';
	return $out;
}
add_shortcode('sign-up', 'magplus_sign_up_form_shortcode');
function magplus_sign_up_form_shortcode( $atts, $content ){
	$atts['text'] = $content;
	return magplus_sign_up_form($atts, false);
}

function country_select($country_code){
	$countries = country_number_codes();
	$country_list = country_list();
	$out = '<select type="hidden" name="registration[country_code]" class="mag-customselect">';
	foreach($countries as $country => $number_prefix){
		$out .= '<option value="'. $country .'"';
			if(strtoupper($country_code) == $country) $out .= ' selected="selected"';
		$out .= ' data-alternative-spellings="'. $country .'">'.
			$country_list[$country] .' (+'. $number_prefix .')</option>';
	}
	$out .= '</select>';
	return $out;
}




function mag_download_form( $class = '' ){
	
	/**
	 * Download
	 */

	//Set version of download to be passed to google analytics for tracking.

	 if(!isset($_COOKIE['mg_version'])){

		$mpUpdate='./magplus/mpidupdate.txt';

		if(file_exists($mpUpdate)){
			$version = file_get_contents($mpUpdate);

			$versionSlicer = explode(substr($version, 1, 1), $version);

			$versiontrk = $versionSlicer[0].'.'.$versionSlicer[1].'.'.$versionSlicer[2];

			setcookie('mg_version', $versiontrk, time()+3600, "/");/* Passes the mag+ version to my-magplus for tracking when downloadinf */
		}

	}
//echo "<pre>";
//print_r (MAGPLUS_DOWNLOAD_URL);
//print_r ($_REQUEST);die;
//$downloadurl= MAGPLUS_DOWNLOAD_URL;
//$downloadurl=str_replace ("array","",$downloadurl);

	/*if(!magplus_logged_in_check()) {
		return 'Please <a href="http://login.magplus.com?https://www.magplus.com/my-magplus">login</a> to download our tools.';
	}*/
	
		$nowFormat = date('Y-m-d'); $timeFormat = date('H:i:s'); 
		$ipaddress = $_SERVER['REMOTE_ADDR']; 
		$data = magplus_logged_in_check();
		//echo '<pre>'; print_r($data); echo '</pre>';
		//$namearray = explode(" ", $data->name);
		//echo $namearray;
		//$firstname = isset($namearray[0])?$namearray[0]:'';
		//$lastname = isset($namearray[1])?$namearray[1]:'';
		
		
		//$temp = 0; 
  

			if (empty($data)) { 
				header("location:https://www.magplus.com/signup/");
			} 
			else { //echo "go"; 

		
		
	$out = '

	<form id="form1" action="'. MAGPLUS_DOWNLOAD_URL .'" class="magplus-download '. $class .'" method="get">
		<div class="ps-split">
			<select name="cs_version" id="cs_version" class="cs_version">
				<!--<option value="">Select your Adobe InDesign version</option>-->
				<option value="CC_2020" id="cs_version_CC_2020">CC 2020</option>
				<option value="CC_2019" id="cs_version_CC_2019">CC 2019</option>
				<option value="CC_2018" id="cs_version_CC_2018">CC 2018</option>
				<!--<option value="CC_2017" id="cs_version_CC_2017">CC 2017</option>
				<option value="CC_2015" id="cs_version_CC_2015">CC 2015</option>
				<option value="CC_2014" id="cs_version_CC_2014">CC 2014</option>
				<option value="CC" id="cs_version_CC">CC</option>-->
				<option value="CS6" id="cs_version_CS6">CS6</option>
				<!--<option value="CS5.5" id="cs_version_CS5_5">CS5.5</option>
				<option value="CS5" id="cs_version_CS5">CS5</option>-->
				
			</select>
			<div class="ver_indver"><p><span class="indver">Shown above is the latest InDesign version. To select a different version, choose from the drop-down menu. </span></p></div>
		</div>
		<div class="ps-split">
			<label class="ps-split-label" for="os_MacOS"><input name="os" tabindex="8" id="osMac" value="MacOS" type="radio">  Mac OS X</label>
			 <label for="os_Win"><input name="os" tabindex="9" id="osWin" value="Win" type="radio"> Windows</label>
		</div>
		<div>
			<input name="submit" id="download-designd-tools-submit-button" class="secondary-button download" tabindex="7" value="Download" type="submit">
		</div>
		<div class="magform-footer desc hidden">
			* Requires Intel processor
		</div>
	</form>
	<div style="display: none !important;">
	<form id="form2">
	<input id="text0" name="text0" type="hidden" value="'.$data->user_id.'" /><br />
    <input id="text1" name="text1" type="hidden" value="'.$data->name.'" /><br />
    <input name="text2" type="hidden" value="'.$data->email.'"/><br />
	<input name="phone" type="hidden" value="'.$data->phone.'"/><br />
	<input id="text3" name="text3" type="hidden" value="'. $nowFormat .'"/><br />
	<input id="time31" name="text31" type="hidden" value="'. $timeFormat .'"/><br />
	<input id="text5" name="text5" type="hidden" value=""/><br />
	<input id="text4" name="text4" type="hidden" value=""/><br />
	<input id="text6" name="text6" type="hidden" value="'. $ipaddress .'"/><br />
	</form>
	</div>
	';	
	return $out;
}

}
// the download shortcode
function mag_download_shortcode(){
	return mag_download_form( 'magform' );
}
add_shortcode('tools_download', 'mag_download_shortcode');
//short code [tools_download]  will activate function mag_download_shortcode
//always to return, (not echo), else it'll come out "to early".


?>
<?php

/**************************************************
 *
 * - Installation msg
 *
 **************************************************/
function installation_message(){

	if($_GET['signup']): ?>

		<div class="success-box">
			<p>
				<strong>Congrats! Your tools have downloaded.</strong><br />
					You're a forerunner â€“ help us empower other creatives to reinvent digital publishing.
					Tell your friends about Mag+!
				</strong>
			</p>

			<div class="">
				<?php
				$args = array(
					'link' => 'http://magpl.us/JepOzi',
					'name' => 'Free software for mobile publishing',
					'caption' => 'I just downloaded Mag+ to create mobile apps without any coding.',
					'description' => 'What about you?',
					'class' => 'facebook-share-icon',
					'track' => 'fb_share_after_download'
				);
				echo ps_share_button( $args );
				$args = array(
					'type' => 'twitter',
					'link' => 'http://magpl.us/KEwT0o',
					'share_text' => 'I just downloaded Mag+ for free to create mobile apps without any coding. What about you?',
					'twitter_count' => 'none',
					'twitter_via' => ''
				);
				echo ps_share_button( $args );

				 ?>
			</div>
			<?php //Here can you read how to install and upgrade. In the menu to the left can you find help and inspiration to get you started. ?>
		</div>
	<?php endif;
}
// prevent robots from that page
add_action('wp_head', 'ps_custom_no_robots');
function ps_custom_no_robots(){
	if( is_page( array('step-2') ) || isset($_GET['signup']) ){
		echo "\n\t".'<meta name="robots" content="noindex,nofollow">'."\n";
	}
}
// the download shortcode
function installation_message_shortcode(){
	installation_message();
}
add_shortcode('installation_message', 'installation_message_shortcode');


/* NEW */
function installation_message_2(){

		$out = '
		<div class="success-box">
			<p>
				You\'re a forerunner â€“ help us empower other creatives to reinvent digital publishing.
				Tell your friends about Mag+!
			</p>

			<div class="">
			';
				$args = array(
					'link' => 'http://magpl.us/JepOzi',
					'name' => 'Free software for mobile publishing',
					'caption' => 'I just downloaded Mag+ to create mobile apps without any coding.',
					'description' => 'What about you?',
					'class' => 'facebook-share-icon',
					'track' => 'fb_share_after_download'
				);
				$out .= ps_share_button( $args );
				$args = array(
					'type' => 'twitter',
					'link' => 'http://magpl.us/KEwT0o',
					'share_text' => 'I just downloaded Mag+ for free to create mobile apps without any coding. What about you?',
					'twitter_count' => 'none',
					'twitter_via' => ''
				);
				$out .= ps_share_button( $args );

			$out .= '</div>
			</div>';
			return $out;
}
// the download shortcode
function installation_message_shortcode_2(){
	return installation_message_2();
}
add_shortcode('installation_message_2', 'installation_message_shortcode_2');

/* NEWER */
function installation_message_3(){

		$out = '
		<div class="success-box">
			<p>
				You\'re a forerunner â€“ help us empower your friends to reinvent digital publishing.
				Tell them about Mag+!
			</p>

			<div class="">
			';
				$args = array(
					'link' => 'http://magpl.us/JepOzi',
					'name' => 'Free software for mobile publishing',
					'caption' => 'I just downloaded Mag+ to create mobile apps without any coding.',
					'description' => 'What about you?',
					'class' => 'facebook-share-icon',
					'track' => 'fb_share_after_download'
				);
				$out .= ps_share_button( $args );
				$args = array(
					'type' => 'twitter',
					'link' => 'http://magpl.us/KEwT0o',
					'share_text' => 'I just downloaded Mag+ for free to create mobile apps without any coding. What about you?',
					'twitter_count' => 'none',
					'twitter_via' => ''
				);
				$out .= ps_share_button( $args );

			$out .= '</div>
			</div>';
		return $out;
}
// the download shortcode
function installation_message_shortcode_3(){
	return installation_message_3();
}
add_shortcode('installation_message_3', 'installation_message_shortcode_3');






/**************************************************
 *
 * - Track user location (REMOVE)
 *
 **************************************************/
add_action( 'wp_ajax_nopriv_ps_signed_up_user', 'ps_signed_up_user' );
add_action( 'wp_ajax_ps_signed_up_user', 'ps_signed_up_user' );
function ps_signed_up_user() {
	#global $wpdb;
	$internal_db = new wpdb(INTERNAL_DB_USER,INTERNAL_DB_PASSWORD,INTERNAL_DB_NAME,INTERNAL_DB_HOST);

	$user = $_POST['user'];
	$db_data = array(
		'user_id' => $user['id'],
		'email' => $user['email'],
		'created_at' => $user['created_at'],
		'name' => $user['name'],
		'phone' => $user['phone'],
		'company' => $user['company'],
		'ip' => $ip,
		'browser_lang' => $_POST['browser_lang'],
		'continent' => '',
		'country' => '',
		'city' => '',
		'org' => '',
		'where' => $_POST['where']
		// 'user_type' => $_POST['user_type'],
		// 'type' => '',
		// 'domain' => '',
		// 'url' => '',
		// 'q' => '',
		// 'other' => ''
	);

	$data = get_user_country_by_ip();
	// return XML data
	if ($data) {
		$data = json_decode($data);
		$db_data['ip'] = $data->ipAddress;
		$db_data['continent'] = '';
		$db_data['country'] = $data->countryName;
		$db_data['city'] = $data->cityName;
		$db_data['org'] = '';
	}

	//echo '<pre>'; print_r($db_data); echo '</pre>'; die();
	//`id``user_id``email``created_at``name``phone``company``verified_at``continent``country``city``org``ip``browser_lang``status`
	#$mydb = new wpdb('username','password','database','localhost');
	#$rows = $mydb->get_results("select Name from my_table");

	// save referral info
	#$referral = unserialize(stripcslashes($_COOKIE['mp_referral']));
	#if($referral){
	#	$db_data['type']
	#	$db_data = array_merge($db_data, $referral);
	#}
	$prepare = array(
		'%d', // user_id
		'%s', // email
		'%s', // created_at
		'%s', // name
		'%s', // phone
		'%s', // company
		'%s', // ip
		'%s', // browser_lang
		'%s', // continent
		'%s', // country
		'%s', // city
		'%s', // org
		'%s' // where
		#'%s' // user_type
		#'%s', // type
		#'%s', // domain
		#'%s', // url
		#'%s', // q
		#'%s' // other
	);
	$hmm = $internal_db->insert(
		'sales_user_info',
		$db_data,
		$prepare
	);
	die();
}









/**
 * Notification
 *
 * If the user don't have validated there email
 */
$magplus_user = magplus_logged_in_check();
#add_action('wp', 'ps_notification_message');
function ps_notification_message(){
	global $post, $magplus_user;
	if( $post->ID == 3284 || $post->post_parent == 3284 ) return;

	if( $magplus_user && ( !isset($magplus_user->verified) || !$magplus_user->verified) ):
		// add a class to the body
		add_filter('body_class','ps_notification_class');
		function ps_notification_class($classes) {
			$classes[] = 'ps-notification';
			return $classes;
		}
		// add the message
		add_filter('wp_footer', 'email_verification_notification');
		function email_verification_notification(){
			global $magplus_user;
			echo '<div class="ps-notification-message">';
				echo 'You havn\'t verified your email. Resend verification email or change your email: <a href="#" id="resend_magplus_activation_email">'. $magplus_user->email .'</a>';
#				echo ' or change <a href="#">email</a>.';
			echo '</div>';
		}
	endif;
}
