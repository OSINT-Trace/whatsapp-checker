<?php

$curl = curl_init();

curl_setopt_array($curl, [
	// Primary (Recommended): OSINT Trace Direct API
	CURLOPT_URL => "https://api.osinttrace.com/v1/check/whatsapp",
	// Alternative (API.Market): "https://prod.api.market/api/v1/osint-trace-1/whatsapp-checker/check/whatsapp"
	// Alternative (RapidAPI): "https://whatsapp-checker4.p.rapidapi.com/check"
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'input' => '+19295551234'
	]),
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		"x-osint-key: YOUR_OSINT_KEY"
		// Alternative API.Market: "X-Api-Key: YOUR_API_KEY"
		// Alternative RapidAPI: "x-rapidapi-host: whatsapp-checker4.p.rapidapi.com", "x-rapidapi-key: YOUR_RAPIDAPI_KEY"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
