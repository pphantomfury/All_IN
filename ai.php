<?php
header('Content-Type: application/json');
$input = json_decode(file_get_contents('php://input'), true);

$apiKey = 'YOUR_OPENAI_API_KEY_HERE'; // Keep this secret!
$topic = $input['topic'];
$query = $input['query'];

$data = [
    "model" => "gpt-3.5-turbo",
    "messages" => [
        ["role" => "system", "content" => "You are a Nairobi travel expert for the website 'All In'. Provide specific details on $topic sites, including estimated Uber/Bolt costs, entry fees in KSH, and locations."],
        ["role" => "user", "content" => $query]
    ]
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);

$response = curl_exec($ch);
echo $response;
?>