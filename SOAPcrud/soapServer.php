<?php
include "database.php";

try {
  $server = new SOAPServer(
    NULL,
    array(
     'uri' => 'http://localhost/phpRest/SOAPcrud/soapServer.php'
    )
  );

  // SETTING UP THE Db CLASS
  $server->setClass('conn');
  $server->handle();
}

catch (SOAPFault $f) {
  print $f->faultstring; exit;
}

?>
