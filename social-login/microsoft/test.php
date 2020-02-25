<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=amitesh&registration[name]=jain&registration[email]=amitesh100200000000@outlook.com&registration[password]=amitesh1002@outlook.com&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=https://www.magplus.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
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
  echo $response;
  $pieces = explode(" ", $response);
					echo '<br>';
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
					echo $pieces[6]; 
					
					
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
					
}