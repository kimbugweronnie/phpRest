

<?php
$message = "";

// Includes client to get $client object
include 'SOAPcrud/soapclient.php';


if( isset($_POST['submit']) ){


	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	// calling  the update function
	if( $client->__soapCall("update", array($id, $name, $email, $address))  ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
	}
}

$id = $_GET['id']; // id from url


$data = $client->__soapCall("getById", array($id));


?>
