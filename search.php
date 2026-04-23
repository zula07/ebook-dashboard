<?php
require_once 'config.php';

if (!isset(['query'])) die('Arama terimi girin.');

 = urlencode(['query']);
 = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . GEMINI_API_KEY;

 = json_encode([
    "contents" => [
        ["parts" => [["text" => "Provide direct download links for the ebook: " . ['query']]]]
    ]
]);

 = curl_init();
curl_setopt(, CURLOPT_RETURNTRANSFER, true);
curl_setopt(, CURLOPT_POST, true);
curl_setopt(, CURLOPT_POSTFIELDS, );
curl_setopt(, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
 = curl_exec();
curl_close();

echo ;
