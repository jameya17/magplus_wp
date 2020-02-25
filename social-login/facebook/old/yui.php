<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://publish.magplus.com/login.json?[registration][email]=amitesh@magplus.com&[registration][password]=abcd1234",
  CURLOPT_RETURNTRANSFER => true,
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
    "Host: publish.magplus.com",
    "Postman-Token: edc0bcc0-e443-4fe7-82a9-8c53db7503a9,00f8f7b3-9565-43a4-a7d5-bfbf62d7c972",
    "User-Agent: PostmanRuntime/7.20.1",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  //echo "cURL Error #:" . $err;
  echo $response;
} else {
  echo $response;
}