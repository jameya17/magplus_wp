<?php

@session_start();

if(!isset($_SESSION['userData'])){
	header('location: index.php');
}
echo $_SESSION['userData']['name'];
$name = $_SESSION['userData']['name'];
$pieces = explode(" ", $name);

include 'class.IPInfoDB.php';
$ipinfodb = new IPInfoDB('f64cd0dd022586c3806218bc3f9fa3c590b7ce4bbb3862929dd552d4d1c95ebd');
$results = $ipinfodb->getCity($_SERVER['REMOTE_ADDR']);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=" . $_SESSION['userData']['email'] . "&[registration][password]=" . $_SESSION['userData']['email'] . "",
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
    "Cookie: magplus_session=eyJ1c2VyX2lkIjoxMzU3NzcsIm5hbWUiOiJBbWkgUnVjaGkiLCJlbWFpbCI6%0AImFtaXRlc2gxMG1heUBnbWFpbC5jb20iLCJwaG9uZSI6Ik5BIiwicm9sZSI6%0AInVzZXIiLCJ2ZXJzaW9uIjoiMC40LjAiLCJleHBpcmVzX2F0IjoiMjAyMC0w%0AMS0wMlQwNjo0ODowMi43MjZaIn0%3D%0A.a3b22f205e916f98ba277bef2bb87cbf9513a1948fa4c4e886ad0946f651a59c",
    "Host: publish.magplus.com",
    "Postman-Token: 9a722ad6-9c8c-463f-b109-b73e5c755f5a,bd7b3653-8c08-483b-beaa-6fd7a72eb98a",
    "User-Agent: PostmanRuntime/7.20.1",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
				$ResponseResult = json_decode($response);
				//echo "<pre>";print_r($ResponseResult);die;
				if ($ResponseResult->status == 'failure'){
					header("location:https://www.magplus.com/signup/?error=Email+has+already+been+taken");
						//print $_SESSION['userData']['email']; 
				}
				else {  
				//print $response;
				$ResponseResult = json_decode($response);
				//echo "<pre>";print_r($ResponseResult);
				
					if ($ResponseResult->status == '406') {//echo "GO"; echo "<pre>";print_r($ResponseResult);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				

$curl = curl_init();

curl_setopt_array($curl, array(
 
 
 CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=" . $results[ipAddress]. "&registration[first_name]=" . $pieces[0] . "&registration[name]=" . $pieces[1] . "&registration[email]=" . $_SESSION['userData']['email'] . "&registration[password]=" . $_SESSION['userData']['email'] . "&registration[country_code]=" . $results[countryCode]. "&registration[phone]=0000000000*&registration[company]=NA&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=" . $results[regionName]. "&registration[from_where]=https://www.magplus.com/signup/&registration[city]=" . $results[cityName]. "&registration[zip]=" . $results[zipCode]. "&registration[social_media_provider]=facebook",
 
 
 
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
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  print $response; print "go2";
  $pieces = explode(" ", $response);
  $pieces2 = explode("/", $pieces[4]);
  $my_url = "thank-you-for-registering-with-magplus";
	if ($pieces2[3] == $my_url) { 
	  $curl = curl_init();
            
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=" . $_SESSION['userData']['email'] . "&[registration][password]=" . $_SESSION['userData']['email'] . "",
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
                    "Host: publish.magplus.com",
                    "cache-control: no-cache"
                )
            ));
            
            $response       = curl_exec($curl);
            $ResponseResult = json_decode($response);
            
            $err = curl_error($curl);
			print $response; print "go1";
			
			$cookie_name  = 'magplus_session';
            $cookie_value = $ResponseResult->cookie;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
			header("location:https://www.magplus.com/my-magplus/");
	}
	//print $response; print "go";
	else {
		$cookie_name  = 'magplus_session';
        $cookie_value = $ResponseResult->cookie;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		header("location:https://www.magplus.com/my-magplus/");
		}
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					}
					//else {echo "GO1";}
				
					$cookie_name  = 'magplus_session';
					$cookie_value = $ResponseResult->cookie;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
				    header("location:https://www.magplus.com/my-magplus/");
				
				} 




}





	