<?php

    $soapURL            = "http://test.mcash.ug/mobicore/services/members?wsdl";

    $hostname           = gethostbyaddr($_SERVER['REMOTE_ADDR']);

    $xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:mem="http://members.webservices.cyclos.strohalm.nl/">
   <soapenv:Header/>
   <soapenv:Body>
      <mem:registerMember>
         <!--Optional:-->
         <params>
            <!--Optional:-->
            <groupId>12</groupId>
            <!--Optional:-->
            <username>pzx91234</username>
            <!--Optional:-->
             <name>prox</name>
             <!--Optional:-->
              <email>proxc@gmail.com</email>
            <!--Optional:-->
            <loginPassword>prox12</loginPassword>
            <!--Optional:-->
            <pin>1960</pin>

         </params>
      </mem:registerMember>
   </soapenv:Body>
</soapenv:Envelope>';





    $headers = array(
        "Content-type: text/xml;charset=\"utf-8\"",
        "Accept: text/xml",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        //IS SOAPAction the same as the endpoint "$soapURL"?//
        "SOAPAction: http://test.mcash.ug/mobicore/services/members?wsdl",
        "Content-length: ".strlen($xml_post_string),
    );

    $url2 = $soapURL;
    $soap_do = curl_init();
      curl_setopt($soap_do, CURLOPT_URL, $url2 );
      curl_setopt($soap_do, CURLOPT_HEADER, false);
      curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 100);
      curl_setopt($soap_do, CURLOPT_TIMEOUT,        100);
      curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true );
      curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($soap_do, CURLOPT_POST,           true );
      curl_setopt($soap_do, CURLOPT_POSTFIELDS,     $xml_post_string);
      curl_setopt($soap_do, CURLOPT_HTTPHEADER,     $headers);






      if(curl_exec($soap_do) === false) {
        $err = 'Curl error: ' . curl_error($soap_do);
        curl_close($soap_do);

        print $err;
      } else {
        $result = curl_exec($soap_do);
        echo '<pre>';
        print_r($result);
        curl_close($soap_do);

      }
