
<?php
/**
 * - Signup
 * - Download
 * - Installation msg
 */
$devEnvironments = array("d3v.magplus.com", "www.magplus.dev");
if(in_array($_SERVER['SERVER_NAME'], $devEnvironments)){
	define('MAGPLUS_REGISTER_URL', "https://staging-publish.magplus.com/registration");
	//define('MAGPLUS_REGISTER_REDIRECT', "http://d3v.magplus.com/my-magplus/");
	define('MAGPLUS_VERIFY_REDIRECT', "https://d3v.magplus.com/my-magplus/");
	
	define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");
	//define('MAGPLUS_VERIFY_REDIRECT', "https://d3v.magplus.com/my-magplus/");

	define('MAGPLUS_FAILED_REDIRECT', "http://d3v.magplus.com/signup/");
	define('MAGPLUS_DOWNLOAD_URL', "https://download.magplus.com/");
}else{
	define('MAGPLUS_REGISTER_URL', "https://publish.magplus.com/registration");
	//define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/my-magplus/?message=new-user");
	define('MAGPLUS_REGISTER_REDIRECT', "https://www.magplus.com/thank-you-for-registering-with-magplus/");
	define('MAGPLUS_VERIFY_REDIRECT', "https://www.magplus.com/my-magplus/?message=new-user");
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


	$referral = unserialize(stripcslashes($_COOKIE['mp_referral']));
	$referral = json_encode($referral);
	$out = '';
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$out .= '
	<form id="magplus_signup2" action="'. MAGPLUS_REGISTER_URL .'" class="magform magplus-half-form magplus-signup" method="post">
 <p class="form-group sf_required_fields_msg" id="requiredfieldsmsg"><sup><span class="required" style="color:red;width: auto !important;font-size: 12px;text-align: right;">*</span></sup> These fields are required.</p>
<div id="message" style="display: none;">
<div style="padding: 5px;">
<div id="inner-message" class="alert alert-error"><button class="close" type="button" data-dismiss="alert">�</button></div>
</div>
</div>

		<div class="form-loader"><a href="#" class="form-loader-close">Close</a></div>
		<div class="signup-errors"></div>
		<input type="hidden" id="registration_url" class="register-new-form-where" name="registration[from_where]" value="Url - ">
		
		
		<input type="hidden" name="utf8" value="✓">
		<input type="hidden" name="redirect_to" value="'. MAGPLUS_REGISTER_REDIRECT .'">
		<input type="hidden" name="verify_redirect_to" value="'. MAGPLUS_VERIFY_REDIRECT .'">
		<input type="hidden" name="failed_redirect_to" value="'. MAGPLUS_FAILED_REDIRECT .'">
		<input  id="00N7F00000HNBcC" maxlength="100" name="00N7F00000HNBcC" size="20" type="hidden" value="'.$ipaddress.'" />
		<div class="signup-row">
			<label for="registration-first-name">First name<span style="color:red" >*</span></label>
			<input class="text" name="registration[first_name]" type="text" autofocus="autofocus" pattern="[a-zA-Z\s]*" required="required">
			<span class="ps-error"></span>
		</div>
		<div class="signup-row">
			<label for="registration-name">Last name<span style="color:red" >*</span></label>
			<input class="text" name="registration[name]" required="required" pattern="[a-zA-Z\s]*" title="Only Letter" type="text" >
			<span class="ps-error"></span>
		</div>
		<div class="signup-row">
			<label for="registration-email">
				Email<span style="color:red" >*</span>
			</label>
			<input class="registration-email" name="registration[email]" required="required" type="email" >
			<span class="ps-error"></span>
		</div>
		<div class="signup-row">
			<label for="registration-password">
				Password<span style="color:red" >*</span>
			</label>
			<input class="text" id="registration_password" name="registration[password]" required="required" type="password">
			<!--div class="desc">Choose a password with 6-40 characters</div-->
			<span class="ps-error"></span>
		</div>
		<div class="signup-row signup-country-row">
			<label for="registration-phone">
				Phone <sup><span class="required" style="color:red">*</span></sup>
			</label>
			'.
			country_select($countryCode)
			.'
			<input class="registration-phone no-spin" name="registration[phone]" type="number" required="required"  title="Only Numeric For Your MOblie/Phone Number ">
			<span class="ps-error"></span>
		</div>	
		<div class="signup-row">
			<label for="registration_company">
				<span class="signup-type signup-pro">Organization<span style="color:red" >*</span></span>
				<span class="signup-type signup-student hidden">School<span style="color:red" >*</span></span>
			</label>
			<input class="text" id="registration_company" name="registration[company]" required="required" type="text" >
			<span class="ps-error"></span>
		</div>
		<div class="signup-row">
			<label class="w2llabel   text" for="sf_title">Job Title:</label>
			<input placeholder="" value="" id="sf_title" class="w2linput text" name="registration[title]" type="text">
		</div>
		<div class="signup-row">
			<label  text" for="sf_state">State/Prov:</label>
			<input placeholder="" value="" id="sf_state"  name="registration[state]" type="text">
		</div>
		<div class="signup-row">
			<!--<label class="w2llabel required  select" for="sf_country">Country: <sup><span class="required" style="color:red">*</span></sup></label>-->
			
			<label class="w2llabel required  select">Country: <sup><!--<span class="required" style="color:red">*</span>--></sup></label>
			<!--<select id="sf_country" name="registration[country]" style="width: 97% !important;" >-->
			<select id="sf_countries" name="country"  class="form-control error" placeholder="" aria-required="true">
			<option value="">Please Select One</option>
			<option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Brazil">Brazil</option><option value="Brunei">Brunei</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option><option value="Congo, Republic of the">Congo, Republic of the</option><option value="Costa Rica">Costa Rica</option><option value="CÃ´te d\'Ivoire">CÃ´te d\'Ivoire</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macedonia">Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Norway">Norway</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia and Montenegro">Serbia and Montenegro</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Sudan, South">Sudan, South</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option><option value=""></option></select>

		</div>

		<!-- Industry -->
		<div class="signup-row">
		<!--	<label>
				<input name="registration[user_category]" class="signup-user-type" type="radio"  value="pro">
				Professional
			</label>
			<label>
				<input name="registration[user_category]" class="signup-user-type" type="radio"  value="student">
				Student
			</label>-->
			<label class="w2llabel required  select" for="sf_industry">Industry: <sup><span class="required" style="color:red">*</span></sup></label>
			<select id="sf_industry" class=" select" name="registration[industry]" required="required" ><option value="">Please Select One</option><option value="I’m a student">I’m a student</option><option value="Agency">Agency</option><option value="Auto">Auto</option><option value="Association / Non-profit">Association/Non-profit</option><option value="Education">Education</option><option value="Finance">Finance</option><option value="Government">Government</option><option value="Human Resources">Human Resources</option><option value="Legal">Legal</option><option value="Manufacturing">Manufacturing</option><option value="Marketing/
Media">Marketing / Media</option><option value="Medical">Medical</option><option value="Museum">Museum</option><option value="Publishing">Publishing</option><option value="Retail">Retail</option><option value="Travel">Travel</option><option value="Sports">Sports</option><option value="Other..">Other..</option></select>
		</div>
		
		<div class="signup-row">
			<label for="sf_description">What Are You Looking to Create?</label>
			<textarea id="sf_descriptions" name="registration[description]" placeholder=""></textarea>
			<label class="gdpr">
					<input type="checkbox" name="accept_terms" class="accept-terms" class="checkbox" checked>
					Yes, I would like mag+ to contact me based on the information provided above. Read our <a href="'. get_bloginfo('url') .'/legal/privacy-policy" target="_blank">Privacy Policy </a>for details on how your information may be used.
				</label>
		</div>
		<div class="submit-area">
			<p class="accept-licence" style="display: none">
				<label>
					<input type="checkbox" name="accept_terms" class="accept-terms" class="checkbox" checked>
					I confirm that I have read and understand the
				</label>
				<a href="'. get_bloginfo('url') .'/legal/eula" target="_blank">End User Licence Agreement</a>
			</p>
			<input name="commit" id="pr_button" class="primary-button" type="submit" value="Sign up">
		</div>
		<input type="hidden" id="sf_Lead_Event_Origin__c" class="w2linput hidden" name="registration[Lead_Event_Origin__c]" value="URL: ">
		<div class="alignright desc">
			<br>
			Already a user? <a href="https://login.magplus.com/">Log in</a>
		
		</div>
		<div class="clear"></div>
		<input type="hidden" name="registration[ip_info]" value=\''. $reginfo .'\'>
		<input type="hidden" name="registration[traffic]" value=\''. $referral .'\'>
		
	</form>
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
	$out = '<select name="registration[country_code]" class="mag-customselect">';
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
		
	$out = '

	<form id="form1" action="'. MAGPLUS_DOWNLOAD_URL .'" class="magplus-download '. $class .'" method="get">
		<div class="ps-split">
			<select name="cs_version" id="cs_version" class="cs_version">
				<option value="">Select your Adobe InDesign version</option>
				<option value="CC_2019" id="cs_version_CC_2019">CC 2019</option>
				<option value="CC_2018" id="cs_version_CC_2018">CC 2018</option>
				<option value="CC_2017" id="cs_version_CC_2017">CC 2017</option>
				<option value="CC_2015" id="cs_version_CC_2015">CC 2015</option>
				<option value="CC_2014" id="cs_version_CC_2014">CC 2014</option>
				<option value="CC" id="cs_version_CC">CC</option>
				<option value="CS6" id="cs_version_CS6">CS6</option>
				<option value="CS5.5" id="cs_version_CS5_5">CS5.5</option>
				<option value="CS5" id="cs_version_CS5">CS5</option>
				
			</select>
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
					You're a forerunner – help us empower other creatives to reinvent digital publishing.
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
				You\'re a forerunner – help us empower other creatives to reinvent digital publishing.
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
				You\'re a forerunner – help us empower your friends to reinvent digital publishing.
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
