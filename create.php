<?php
//$message = ""; 
if( isset($_POST['submit']) ){


	include 'SOAPcrud/soapclient.php';

	// Gets the data from post
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];


	if( $client->__soapCall("insert", array($name, $email, $address)) ){
		$message = "Data is inserted successfully.";
	}else{
		$message = "Sorry, Data is not inserted.";
	}
}
?>
