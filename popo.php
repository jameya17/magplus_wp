<?php

$curl = curl_init();
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//curl_setopt ($curl, CURLOPT_CAINFO, "/COMODORSAOrganizationValidationSecureServerCA.crt");
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://alpha-publish.magplus.com/registration?redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&verify_redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&failed_redirect_to=http://betamagplus.mpstechnologies.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=amitesh&registration[name]=jain&registration[email]=amitesh100opppppmay@gmail.com&registration[password]=magplus123&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=http://betamagplus.mpstechnologies.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
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
    "Cookie: PHPSESSID=earkshk1ccj7n4rec5on55pnu4; mp_browser=unknown; mp_referral=a%3A5%3A%7Bs%3A12%3A%22traffic_type%22%3Bs%3A8%3A%22Referral%22%3Bs%3A14%3A%22traffic_domain%22%3Bs%3A25%3A%22alpha-publish.magplus.com%22%3Bs%3A11%3A%22traffic_url%22%3Bs%3A615%3A%22https%3A%2F%2Falpha-publish.magplus.com%2Fregistration%3Fredirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fthank-you-for-contacting-us%2F%26verify_redirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fthank-you-for-contacting-us%2F%26failed_redirect_to%3Dhttp%3A%2F%2Fbetamagplus.mpstechnologies.com%2Fsignup%2F%2600N7F00000HNBcC%3D121.244.129.246%26registration%5Bfirst_name%5D%3Damitesh%26registration%5Bname%5D%3Djain%26registration%5Bemail%5D%3Damitesh%2B11152019212%40magplus.com%26registration%5Bpassword%5D%3D1234567890%26registration%5Bcountry_code%5D%3DIN%26registration%5Bphone%5D%3D0000000000%26registration%5Bcompany%5D%3Dmagplus%26registration%5Baccept_terms%5D%3D1%26registration%5Bstate%5D%3DNew%2520Delhi%2C%2520Delhi%22%3Bs%3A9%3A%22traffic_q%22%3Bs%3A0%3A%22%22%3Bs%3A13%3A%22traffic_other%22%3Bs%3A0%3A%22%22%3B%7D",
    "Postman-Token: ff14afd6-8a11-4618-93f2-dc7d9612e22b,4973a1b6-0821-4781-ad9c-d91d19b927b2",
    "Referer: https://alpha-publish.magplus.com/registration?redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&verify_redirect_to=http://betamagplus.mpstechnologies.com/thank-you-for-contacting-us/&failed_redirect_to=http://betamagplus.mpstechnologies.com/signup/&00N7F00000HNBcC=121.244.129.246&registration[first_name]=amitesh&registration[name]=jain&registration[email]=amitesh100opmay@gmail.com&registration[password]=magplus123&registration[country_code]=IN&registration[phone]=9999987654&registration[company]=magplus&registration[accept_terms]=1&registration[gdpr]=1&registration[state]=New%20Delhi,%20Delhi&registration[from_where]=http://betamagplus.mpstechnologies.com/signup/&registration[city]=New%20Delhi&registration[zip]=100100&registration[social_media_provider]=outlook",
    "User-Agent: PostmanRuntime/7.19.0",
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
}