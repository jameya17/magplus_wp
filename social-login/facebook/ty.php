<?php
//echo "sdasd";
//die;

include 'class.IPInfoDB.php';
$ipinfodb = new IPInfoDB('f64cd0dd022586c3806218bc3f9fa3c590b7ce4bbb3862929dd552d4d1c95ebd');
$results = $ipinfodb->getCity($_SERVER['REMOTE_ADDR']);
print_r($results);



$curl = curl_init();
curl_setopt_array($curl, array(
 
  CURLOPT_URL => "https://publish.magplus.com/registration?redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&verify_redirect_to=https://www.magplus.com/thank-you-for-registering-with-magplus/&failed_redirect_to=https://www.magplus.com/signup/&00N7F00000HNBcC=" . $results[ipAddress]. "&registration[first_name]=test&registration[name]=test&registration[email]=amitesh11223344556677123ab@gmail.com&registration[password]=amitesh11223344556677@gmail.com&registration[country_code]=" . $results[countryCode]. "&registration[phone]=NA&registration[company]=NA&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=" . $results[regionName]. "&registration[from_where]=https://www.magplus.com/signup/&registration[city]=" . $results[cityName]. "&registration[zip]=110011&registration[social_media_provider]=facebook",
 
 
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
  echo $results[ipAddress];
  echo $results[cityName];
  echo $results[countryCode];
  echo $results[zipCode];
}