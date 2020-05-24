<?php
// Includes client to get $client object
include 'SOAPcrud/soapclient.php';
/**
* Calling the "getAll" method by "__soapCall" from SOAP SERVER
* $client: object of SOAP CLIENT
* @params: null
*/
$result = $client->__soapCall("getAll", array());

?>
