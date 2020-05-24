<?php
$client = new SoapClient(null, array(
      'location' => "http://localhost/phpRest/SOAPcrud/soapServer.php",
      'uri'      => "http://localhost/phpRest/SOAPcrud/soapServer.php",
      'trace'    => 1
    )
);
?>
