<?php

// Pushover API endpoint
$url = "https://api.pushover.net/1/messages.json";

// Your API token and user key (Replace with your actual values)
$data = [
    "token"   => "ap7ze273i68zjyh9y39dhwz6zxm3or",
    "user"    => "u6z91zovrgep2q689csike3fs2xmtb",
    "message" => "Test notification from PHP cURL!",
];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt_array($ch, [
    CURLOPT_URL            => $url,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => http_build_query($data),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => true,  // Ensure SSL verification
    CURLOPT_SSL_VERIFYHOST => 2,
    CURLOPT_TIMEOUT        => 10,    // Timeout after 10 seconds
]);

// Execute the request
$response = curl_exec($ch);
$error = curl_error($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Close cURL session
curl_close($ch);

// Check for errors
if ($error) {
    die("cURL Error: $error");
} elseif ($httpCode !== 200) {
    die("HTTP Error $httpCode: $response");
}

// Success - Print response
echo "Notification sent successfully! Response: $response";
