<?php
// adding
// User data to send using HTTP POST method in curl
$data = array('title'=>'Exodus',
'body'=>'Then the Lord said to Moses, 2 “Tell the Israelites to turn back and encamp near Pi Hahiroth, between Migdol and the sea. They are to encamp by the sea, directly opposite Baal Zephon. 3 Pharaoh will think, ‘The Israelites are wandering around the land in confusion, hemmed in by the desert.’ 4 And I will harden Pharaoh’s heart, and he will pursue them. But I will gain glory for myself through Pharaoh and all his army, and the Egyptians will know that I am the Lord.” So the Israelites did this.',
'id' => '133');

// Data should be passed as json format
$data_json = json_encode($data);

// API URL to send data
$url = 'https://jsonplaceholder.typicode.com/posts';

// curl initiate
$start = curl_init();

curl_setopt($start, CURLOPT_URL, $url);

curl_setopt($start, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// SET Method as a POST
curl_setopt($start, CURLOPT_POST, 1);

// Pass user data in POST command
curl_setopt($start, CURLOPT_POSTFIELDS,$data_json);

curl_setopt($start, CURLOPT_RETURNTRANSFER, true);

// Execute curl and assign returned data
$response  = curl_exec($start);

// Close curl
curl_close($start);

// See response if data is posted successfully or any error
print_r ($response);

?>
