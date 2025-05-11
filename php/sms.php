<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://nm22w2.api.infobip.com/sms/3/messages',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{"messages":[{"sender":"InfoSMS","destinations":[{"to":"8801780602502"}],"content":{"text":"V code is 123"}}]}',
    CURLOPT_HTTPHEADER => array(
        'Authorization: App 2fa3495b619ea3a137f59e4e6642a169-09fa10e3-09be-40c8-869f-13f4b087af32',
        'Content-Type: application/json',
        'Accept: application/json'
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
