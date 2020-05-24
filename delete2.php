<?php


include 'SOAPcrud/soapclient.php';

$id = $_GET['id']; // id from url


if( $client->__soapCall("delete", array($id)) ){
	$message = "Deleted.";
}else {
	$message = "Not deleted.";
}

echo $message;
?>
