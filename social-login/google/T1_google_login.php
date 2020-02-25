<?php
require('http.php');
require('oauth_client.php');
require('config.php');


$client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to Google APIs console page ' .
          'http://code.google.com/apis/console in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
          'the domain is valid and can be resolved by a public DNS.');

/* API permissions
 */
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
  // Now check if user exist with same email ID
  $sql = "SELECT COUNT(*) AS count from users where email = :email_id";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":email_id", $user->email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      // User Exist 

      $_SESSION["name"] = $user->name;
      $_SESSION["email"] = $user->email;
      $_SESSION["new_user"] = "no";
	  /*********************************************************************************/
	  
	  
	  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://alpha-publish.magplus.com/login?[registration][email]=" . $_SESSION["email"] . "&[registration][password]=" . $_SESSION["email"] . "",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Length: 0",
    //"Cookie: magplus_session_test=eyJ1c2VyX2lkIjo3MjcwMCwibmFtZSI6ImVjaG9BbWl0ZXNoIEphaW4iLCJl%0AbWFpbCI6ImFtaXRlc2hAbWFncGx1cy5jb20iLCJwaG9uZSI6Ijk5OTk5ODc2%0ANTQiLCJyb2xlIjoidXNlciIsInZlcnNpb24iOiIwLjQuMCIsImV4cGlyZXNf%0AYXQiOiIyMDE5LTEyLTEyVDExOjM5OjAxLjM3MFoifQ%3D%3D%0A.b9eac5a610e4ec1bced8f47ec8b49f419b2e4c8eda17da7a3caa3c71b15a2ce2",
    "Host: alpha-publish.magplus.com",
   // "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
   // "User-Agent: PostmanRuntime/7.20.1",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$ResponseResult = json_decode($response);

$err = curl_error($curl);

if(isset($ResponseResult->user) && ($ResponseResult->status=='success')){
	$cookie_name = 'magplus_session';
	$cookie_value = $ResponseResult->cookie;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}else {
  header("location:http://betamagplus.mpstechnologies.com/my-magplus/");
}
	  
	  
	  
	  
	  
	  
	  /**********************************************************************************/
    } else {
      // New user, Insert in database
	  //$platform = "google";
      $sql = "INSERT INTO `users` (`name`, `email`, `platform`) VALUES " . "( :name, :email, :platform)";
	  //$sql = "INSERT INTO `users` set `name`='Amitesh', `email`='amitesh@google.com', `platform`='Google'";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":name", $user->name);
      $stmt->bindValue(":email", $user->email);
	  $stmt->bindValue(":platform", 'Google');
	  try{
      $stmt->execute();
	  }catch(Exception $e){
		  echo "<pre>";print_r($e);die;
	  }
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
        $_SESSION["new_user"] = "yes";
        $_SESSION["e_msg"] = "";
		$_SESSION["platform"] = "google";
		//echo $_SESSION["name"];
		//echo $_SESSION["email"];
		$fullname = $_SESSION["name"];
		$pieces = explode(" ", $fullname);
		//echo $_SESSION["name"];
		//echo $_SESSION["name"];
		//$firstname = $_SESSION["name"];
		//$firstname = $_SESSION["name"];
		//***********************************************************************//
		
		/* $n=10; 
		function getName($n) { 
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
			$randomString = ''; 
  
			for ($i = 0; $i < $n; $i++) { 
				$index = rand(0, strlen($characters) - 1); 
				$randomString .= $characters[$index]; 
			} 
  
			return $randomString; 
		} 
   */
		//echo getName($n); 
		$pw = $_SESSION["email"];
		
		//***********************************************************************//
		$curl = curl_init();
			//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			//curl_setopt ($curl, CURLOPT_CAINFO, "/COMODORSAOrganizationValidationSecureServerCA.crt");
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://alpha-publish.magplus.com/registration?redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&verify_redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&failed_redirect_to=http://betamagplus.mpstechnologies.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=" . $pieces[0] . "&registration[name]=" . $pieces[1]. "&registration[email]=" . $_SESSION["email"] . "&registration[password]=" . $pw . "&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=http://betamagplus.mpstechnologies.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=google",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_SSL_VERIFYHOST => 0,
			  CURLOPT_SSL_VERIFYPEER => 0, 
			  //CURLOPT_CAINFO => /COMODORSACertificationAuthority.crt,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_HTTPHEADER => array(
				"Accept: */*", 
				"Accept-Encoding: gzip, deflate",
				"Cache-Control: no-cache",
				"Connection: keep-alive",
				//"Cookie: PHPSESSID=earkshk1ccj7n4rec5on55pnu4; mp_browser=unknown; mp_referral=a%3A5%3A%7Bs%3A12%3A%22traffic_type%22%3Bs%3A8%3A%22Referral%22%3Bs%3A14%3A%22traffic_domain%22%3Bs%3A25%3A%22alpha-publish.magplus.com%22%3Bs%3A11%3A%22traffic_url%22%3Bs%3A615%3A%22https%3A%2F%2Falpha-publish.magplus.com%2Fregistration%3Fredirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fthank-you-for-contacting-us%2F%26verify_redirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fthank-you-for-contacting-us%2F%26failed_redirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fsignup%2F%2600N7F00000HNBcC%3D121.244.129.246%26registration%5Bfirst_name%5D%3Damitesh%26registration%5Bname%5D%3Djain%26registration%5Bemail%5D%3Damitesh%2B11152019212%40magplus.com%26registration%5Bpassword%5D%3D1234567890%26registration%5Bcountry_code%5D%3DIN%26registration%5Bphone%5D%3D0000000000%26registration%5Bcompany%5D%3Dmagplus%26registration%5Baccept_terms%5D%3D1%26registration%5Bstate%5D%3DNew%2520Delhi%2C%2520Delhi%22%3Bs%3A9%3A%22traffic_q%22%3Bs%3A0%3A%22%22%3Bs%3A13%3A%22traffic_other%22%3Bs%3A0%3A%22%22%3B%7D",
				//"Postman-Token: ff14afd6-8a11-4618-93f2-dc7d9612e22b,4973a1b6-0821-4781-ad9c-d91d19b927b2",
				//"Referer: https://alpha-publish.magplus.com/registration?redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&verify_redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&failed_redirect_to=http://betamagplus.mpstechnologies.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=amitesh&registration[name]=jain&registration[email]=amitesh100opmay@gmail.com&registration[password]=magplus123&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=http://betamagplus.mpstechnologies.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
				//"User-Agent: PostmanRuntime/7.19.0",
				//"cache-control: no-cache"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  echo $response;
			  
			  //*********************************************************************************************************************************//
			  
			  $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://alpha-publish.magplus.com/login?[registration][email]=" . $_SESSION["email"] . "&[registration][password]=" . $pw . "",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Length: 0",
    //"Cookie: magplus_session_test=eyJ1c2VyX2lkIjo3MjcwMCwibmFtZSI6ImVjaG9BbWl0ZXNoIEphaW4iLCJl%0AbWFpbCI6ImFtaXRlc2hAbWFncGx1cy5jb20iLCJwaG9uZSI6Ijk5OTk5ODc2%0ANTQiLCJyb2xlIjoidXNlciIsInZlcnNpb24iOiIwLjQuMCIsImV4cGlyZXNf%0AYXQiOiIyMDE5LTEyLTEyVDExOjM5OjAxLjM3MFoifQ%3D%3D%0A.b9eac5a610e4ec1bced8f47ec8b49f419b2e4c8eda17da7a3caa3c71b15a2ce2",
    "Host: alpha-publish.magplus.com",
   // "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
   // "User-Agent: PostmanRuntime/7.20.1",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$ResponseResult = json_decode($response);

$err = curl_error($curl);

if(isset($ResponseResult->user) && ($ResponseResult->status=='success')){
	$cookie_name = 'magplus_session';
	$cookie_value = $ResponseResult->cookie;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
}else {
  header("location:http://betamagplus.mpstechnologies.com/my-magplus/");
}
			  
			  
			  
			  //*********************************************************************************************************************************//
			  
			  
			  
			  
			  
			//  $pieces = explode(".", $response);
			//  echo '<br>';
			//  echo $pieces[0];
			 // echo '<br>';
			//  echo $pieces[1];
			//  echo '<br>';
			//  echo $pieces[2];
			  //print  $response;
			  //header("Location: ".$response);
			//  echo '<br>';
			  //echo $_SESSION["name"];
			  //echo '<br>';
			  //$pizza = $_SESSION["name"];
			  //echo '<br>';
			 // $pieces = explode(" ", $pizza);
				//echo $pieces[0]; // piece1
				//echo '<br>';
				//echo $pieces[1]; // piece2
			 // echo '<br>';
		     // echo $_SESSION["email"];
			 // echo '<br>';
			 // echo $firstname;
			//  echo '<br>';
			//$url = 'https://alpha-publish.magplus.com/registration?redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&verify_redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&failed_redirect_to=http://betamagplus.mpstechnologies.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=echo' . $pieces[1] . '&registration[name]=' . $pieces[1]. '&registration[email]=' . $_SESSION["email"] . '&registration[password]=magplus123&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=http://betamagplus.mpstechnologies.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=google';
			//echo $url;
			}
		
		
		
		
      }
    }
  } catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }

  $_SESSION["user_id"] = $user->id;
} else {
  $_SESSION["e_msg"] = $client->error;
}
//header("location:http://betamagplus.mpstechnologies.com/my-magplus/?email=%22amiteshmagplus.com%22password=%22.,msdfmmd.,mjczcz,mc%22");
echo "as";
exit;
?>