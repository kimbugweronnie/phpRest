 <?php
 if( isset($_POST['Add'])){
try{
//getting the wsdl client
$soapClient= new SoapClient("http://www.dneonline.com/calculator.asmx?wsdl");

$A = $_POST['num1'];
$B = $_POST['num2'];
$param=array('intA'=>$A,'intB'=>$B);
//adding the Add endpoint
$response=$soapClient->Add($param);


 $resp=json_decode(json_encode($response),true);
 foreach($resp as $key => $val) {
     //echo  $val;

}
}
catch(Exception $e){
   echo $e->getMessage();
}
}else{
  // $message="Try Again";
}

  ?>
<html>
</head>
<body>


     <form action="soap.php" method="post">
      Number 1 : <input name="num1" id="number1" type="text" /><br />
      <br/>
      Number 2: <input name="num2" id="number2" type="text" /><br />
      <input  name="Add" type="submit" type="submit"  />
    </form>
    <?php echo $val ?>


</body>
</html>
