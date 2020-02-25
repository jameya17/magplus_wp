<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://alpha-publish.magplus.com/login?[registration][email]=amitesh@magplus.com&[registration][password]=magplus123",
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
    "Cookie: magplus_session_test=eyJ1c2VyX2lkIjo3MjcwMCwibmFtZSI6ImVjaG9BbWl0ZXNoIEphaW4iLCJl%0AbWFpbCI6ImFtaXRlc2hAbWFncGx1cy5jb20iLCJwaG9uZSI6Ijk5OTk5ODc2%0ANTQiLCJyb2xlIjoidXNlciIsInZlcnNpb24iOiIwLjQuMCIsImV4cGlyZXNf%0AYXQiOiIyMDE5LTEyLTEyVDExOjM5OjAxLjM3MFoifQ%3D%3D%0A.b9eac5a610e4ec1bced8f47ec8b49f419b2e4c8eda17da7a3caa3c71b15a2ce2",
    "Host: alpha-publish.magplus.com",
    "Postman-Token: aa42e73e-3286-4349-954c-9b992bfe3816,d547b3aa-2ef1-4f67-addf-d23e338e6817",
    "User-Agent: PostmanRuntime/7.20.1",
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