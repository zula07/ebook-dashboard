<?php
// search.php
require_once 'config.php';

if (!isset($_GET['query'])) {
    die(json_encode(['error' => 'Arama terimi girin.']));
}

$query = $_GET['query'];
$apiKey = GEMINI_API_KEY;
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . $apiKey;

$data = json_encode([
    "contents" => [
        ["parts" => [["text" => "Provide direct download links for the ebook: " . $query]]]
    ]
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => curl_error($ch)]);
} else {
    echo $response;
}
curl_close($ch);
?>
