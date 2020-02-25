<?php
require('http.php');
require('oauth_client.php');
require('config.php');

include 'class.IPInfoDB.php';
$ipinfodb = new IPInfoDB('f64cd0dd022586c3806218bc3f9fa3c590b7ce4bbb3862929dd552d4d1c95ebd');
$results = $ipinfodb->getCity($_SERVER['REMOTE_ADDR']);


if ($_GET["error"] <> "") {
  // in case if user cancel the login. redirect back to home page.
  $_SESSION["e_msg"] = $_GET["error"];
  header("location:index.php");
  exit;
}

$client = new oauth_client_class;


$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = SECRET_KEY;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
 die('Please go to github applications page ' .
          'https://account.live.com/developers/applications/create in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The Callback URL must be ' . $client->redirect_uri);

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
              'https://apis.live.net/v5.0/me', 'GET', array(), array('FailOnAccessError' => true), $user);
      
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit) exit;
if ($success) {
  $email = $user->emails->account;
  if ($email == "") {
    $email = $user->emails->preferred;
  }
  
  // Now check if user exist with same email ID
  $sql = "SELECT COUNT(*) AS count from users where email = :email_id";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":email_id", $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      // User Exist 

      $_SESSION["name"] = $user->name;
      $_SESSION["email"] = $email;
      $_SESSION["new_user"] = "no";
	  
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=" . $_SESSION["email"] . "&[registration][password]=" . $_SESSION["email"] . "",
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
                    "Host: publish.magplus.com",
                    // "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
                    // "User-Agent: PostmanRuntime/7.20.1",
                    "cache-control: no-cache"
                )
            ));
            
            $response       = curl_exec($curl);
            $ResponseResult = json_decode($response);
            
            $err = curl_error($curl);
            
            if (isset($ResponseResult->user) && ($ResponseResult->status == 'success')) {
				 magplus_logged_in_check();
				 //echo "<pre>YAHOO";print_r($ResponseResult);die;
                
            }
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
				//echo $response;
				//echo "1";
				$ResponseResult = json_decode($response);
				//echo "<pre>";print_r($ResponseResult);die;
				if ($ResponseResult->status == 'failure'){header("location:https://www.magplus.com/signup/?error=Email+has+already+been+taken");}
				else {header("location:https://www.magplus.com/my-magplus/");} 
				
				
             //   header("location:https://www.magplus.com/my-magplus/");
            }
            
            
            
            
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  
    } else {
      // New user, Insert in database
      $sql = "INSERT INTO `users` (`name`, `email`, `platform`) VALUES " . "( :name, :email, :platform)";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":name", $user->name);
      $stmt->bindValue(":email", $email);
	  $stmt->bindValue(":platform", 'outlook');
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $email;
        $_SESSION["new_user"] = "yes";
        $_SESSION["e_msg"] = "";
		$_SESSION["platform"] = "outlook";
		//////////////////////////////////////////////////////////////////////////////////
		$fullname             = $_SESSION["name"];
        $pieces               = explode(" ", $fullname);
		//////////////////////////////////////////////////////////////////////////////////
		/* echo $pieces[1]; echo '<br>';
		echo $_SESSION["email"]; echo '<br>';
		echo $pieces[0]; echo '<br>';
		echo $pw; echo '<br>';
		echo $_SESSION["platform"];
		die; */
		
		
		//***********************************************************************//
                $curl = curl_init();
                //curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                //curl_setopt ($curl, CURLOPT_CAINFO, "/COMODORSAOrganizationValidationSecureServerCA.crt");
                curl_setopt_array($curl, array(
                    //CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=" . $pieces[0] . "&registration[name]=" . $pieces[1] . "&registration[email]=" . $_SESSION["email"] . "&registration[password]=" . $pw . "&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=https://www.magplus.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
                   // CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=" . $pieces[0] . "&registration[name]=" . $pieces[1] . "&registration[email]=" . $_SESSION["email"] . "&registration[password]=" . $_SESSION["email"] . "&registration[country_code]=%20&registration[phone]=NA&registration[company]=NA&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=NA&registration[from_where]=https://www.magplus.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
				   CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=" . $results[ipAddress]. "&registration[first_name]=" . $pieces[0] . "&registration[name]=" . $pieces[1] . "&registration[email]=" . $_SESSION["email"] . "&registration[password]=" . $_SESSION["email"] . "&registration[country_code]=" . $results[countryCode]. "&registration[phone]=0000000000*&registration[company]=NA&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=" . $results[regionName]. "&registration[from_where]=https://www.magplus.com/signup/&registration[city]=" . $results[cityName]. "&registration[zip]=" . $results[zipCode]. "&registration[social_media_provider]=outlook",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"Accept: */*",
						"Accept-Encoding: gzip, deflate",
						"Cache-Control: no-cache",
						"Connection: keep-alive",
						"User-Agent: PostmanRuntime/7.20.1",
						"cache-control: no-cache"
                    )
                ));
                //echo $response;
				//die;
                $response = curl_exec($curl);
                $err      = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
					$pieces = explode(" ", $response);
					/* echo '<br>';
					echo $pieces[0];
					echo '<br>';
					echo $pieces[1];
					echo '<br>';
					echo $pieces[2];
					echo '<br>';
					echo $pieces[3];
					echo '<br>';echo '<br>';
					echo $pieces[4];
					echo '<br>';echo '<br>';
					echo $pieces[5];
					echo '<br>';echo '<br>';
					echo $pieces[6];  */
					
					
					$pieces2 = explode("/", $pieces[4]);
                    
					/* echo '<br>';
					echo $pieces2[0];
					echo '<br>';
					echo $pieces2[1];
					echo '<br>';
					echo $pieces2[2];
					echo '<br>';
					echo $pieces2[3];
					echo '<br>';echo '<br>';
					echo $pieces2[4];
					echo '<br>';echo '<br>';
					echo $pieces2[5];
					echo '<br>';echo '<br>';
					echo $pieces2[6];
                    echo '<br>';echo "-----------------------"; */
                    
                    $my_url = "thank-you-for-registering-with-magplus";
					//echo $my_url;
					//echo '<br>';
					//echo $pieces2[3];
					
					
					if ($pieces2[3] == $my_url) 
					{
					//echo "ok";
					//header("location:http://betamagplus.mpstechnologies.com/my-magplus/");
					/*********************************************************************************/
            
            
            $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=" . $_SESSION["email"] . "&[registration][password]=" . $_SESSION["email"] . "",
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
                    "Host: publish.magplus.com",
                    // "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
                    // "User-Agent: PostmanRuntime/7.20.1",
                    "cache-control: no-cache"
                )
            ));
            
            $response       = curl_exec($curl);
            $ResponseResult = json_decode($response);
            
            $err = curl_error($curl);
            
            if (isset($ResponseResult->user) && ($ResponseResult->status == 'success')) {
                $cookie_name  = 'magplus_session';
                $cookie_value = $ResponseResult->cookie;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                header("location:https://www.magplus.com/my-magplus/");
            }
            
            
            
            
            
            
            /**********************************************************************************/
					}
					else
					{
					//echo "XXXXXXXXXXX";
					//print  $response;
					header("location:https://www.magplus.com/signup/?error=Email+has+already+been+taken");
					}
                    
                    
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
                
		
		
		
		//////////////////////////////////////////////////////////////////////////////////
      }
    }
  } catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }

  $_SESSION["user_id"] = $user->id;
} else {
  $_SESSION["e_msg"] = $client->error;
}


function magplus_logged_in_check(){
	
	if('ENVIRONMENT' == local){
		$cookie_name = 'magplus_session_dev';
	}else{
		$cookie_name = 'magplus_session';
	}


	//die("data testing");
	// Log that the cookie has been altrered      *** TO DO ***
	setcookie ("$cookie_name", false, time() - 3600, '/', '.magplus.com');
	
	
	if(isset($_COOKIE[$cookie_name])){
		// the secret
		  $secret = MAGPLUS_SECRET;
		// assign the cookie info to data and payload
		$cookie = $_COOKIE[$cookie_name];
		$dt = explode('.', $cookie);
		//print_r($dt);
		
		$data=$dt[0];
		$payload=$dt[1];
		//list($data, $payload) = explode('.', $cookie);
		

		// take the data and hash it with the secret
		 $verify = hash('sha256', $data.$secret);
		//$verify  //	$payload
		
		if(true){
			 $data = json_decode(base64_decode($data));
		//print_r($data);
			// if the date has expired remove the cookie and set false
			if( time() > strtotime($data->expires_at) ){	
				setcookie ($cookie_name, false, time() - 3600, '/', '.magplus.com');
				return false;
			}

			// if all is well return true
			return $data;
		}else{
			//die("data testing");
			// Log that the cookie has been altrered      *** TO DO ***
			setcookie ("$cookie_name", false, time() - 3600, '/', '.magplus.com');
			return false;
		}

	}else{
		return false;
	}
	
	
	//return false;
	
}

//header("location:home.php");
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=" . $_SESSION["email"] . "&[registration][password]=" . $_SESSION["email"] . "",
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
                    "Host: publish.magplus.com",
                    // "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
                    // "User-Agent: PostmanRuntime/7.20.1",
                    "cache-control: no-cache"
                )
            ));
            
            $response       = curl_exec($curl);
            $ResponseResult = json_decode($response);
            
            $err = curl_error($curl);
            
            if (isset($ResponseResult->user) && ($ResponseResult->status == 'success')) {

                $cookie_name  = 'magplus_session';
                $cookie_value = $ResponseResult->cookie;
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            
            curl_close($curl);
            
            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
				//echo $response;
				//echo "2";
				$ResponseResult = json_decode($response);
				if ($ResponseResult->status == 'failure'){header("location:https://www.magplus.com/signup/?error=Email+has+already+been+taken");}
				else {header("location:https://www.magplus.com/my-magplus/");} 
                //header("location:https://www.magplus.com/my-magplus/");
            }


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
exit;
?>