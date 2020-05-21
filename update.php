<?php

// User data to send using HTTP PUT method in curl
$data = array('title'=>'London ','body'=>'the london bridge');

// Data should be passed as json format
$data_json = json_encode($data);

// API URL to update data with employee id
$url = 'https://jsonplaceholder.typicode.com/posts/1';

// curl initiate
$start = curl_init();

curl_setopt($start, CURLOPT_URL, $url);

curl_setopt($start, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_json)));

// SET Method as a PUT
curl_setopt($start, CURLOPT_CUSTOMREQUEST, 'PUT');

// Pass user data in POST command
curl_setopt($start, CURLOPT_POSTFIELDS,$data_json);

curl_setopt($start, CURLOPT_RETURNTRANSFER, true);

// Execute curl and assign returned data
$response  = curl_exec($start);

// Close curl
curl_close($start);


print_r ($response);

?>
