<?php
$url = "http://192.168.0.96/data";

// The raw binary data (hex: 41 52 4E 41 42 20 42 4F 53 45 = "ARNAB BOSE")
$data = hex2bin('41524E414220424F5345');

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  'Content-Type: application/octet-stream'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
if ($response === false) {
  echo 'Curl error: ' . curl_error($ch);
} else {
  echo "Response: $response\n";
}

curl_close($ch);
