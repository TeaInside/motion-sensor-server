<?php

$endpoint = "http://127.0.0.1:8000/insert.php";
$ch = curl_init($endpoint);
curl_setopt_array($ch,
  [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => "action=1",
    CURLOPT_HTTPHEADER => [
      "API-Key: 51866292d9f808e47c67930bb63989fc"
    ]
  ]
);
echo curl_exec($ch), "\n";
curl_close($ch);
