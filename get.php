<?php
//initialize curl
$curl = curl_init();
//set parameters
curl_setopt_array($curl, array(

//getting a response
CURLOPT_RETURNTRANSFER => 1,
CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts'));

// Send the request & save response to $resp
$resp = curl_exec($curl);


curl_close($curl);
echo $resp;
?>
