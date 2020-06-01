<?php
$host = 'localhost';
$dbuser = 'root';
$dbPassword='';
$dbName="Members";

try {
  $dsn="mysql:host=" .$host .";dbname=" .$dbName;
  $pdo=new PDO($dsn,$dbuser,$dbPassword);


 } catch (PDOException $e) {
      echo "Conncted failed" .$e->getMessage();

    }
    $message="";
    $length="";
    $saved="";
if($_SERVER['REQUEST_METHOD']=='POST'){

  $groupId=12;
  $username = filter_input(INPUT_POST, 'username');
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email');
  $password = filter_input(INPUT_POST, 'password');
  $pin = filter_input(INPUT_POST, 'pin');


  $pinlength=strlen($pin);
  $passwordlength=strlen($password);
  $usernamelength=strlen($username);
 
  //validation of length
  if($pinlength<=4 or $passwordlength<=4  or $usernamelength<=4){
    $length="credentials are to short";
    }else{
//checking if username exists
        try {
            $soapClient= new SoapClient("http://test.mcash.ug/mobicore/services/members?wsdl");
            $params=array(

            'username' => $username

            );
            $response=$soapClient->loadByUsername($params);
          //  $response is not string

            $resp=json_decode(json_encode($response),true);

            foreach($resp as $key => $val) {

               foreach ($val as $record => $value) {

               }

            }


          if( $value){
              $message= "the username is already taken";
          }
          else{
            //registering users to the database
               try{

                $param=array([
                'groupId'=>$groupId,
                'username' => $username,
                'name'=>$name,
                'email'=>$email,
                'loginPassword'=>$password,
                'pin'=>$pin
                ]);
                $res=$soapClient->registerMember($param);
                foreach($res as $key => $val) {
                  while(list($key,$value)=each($val)){
                    if($key=="awaitingEmailValidation"){
                      $awaitingEmailValidation=$value;

                    }
                  }
                  while(list($key,$value1)=each($val)){
                    if($key=="Id"){
                      $id=$value1;

                    }
                  }


                }


               }catch(Exception $e){
                    echo $e->getMessage();
                 }
//saving data to mysql database
              $sql= "INSERT INTO person
              (username,name,email,Password,pin,groupId,awaitingEmailValidation,Userid) VALUES
              (:username,:name,:email,:password,:pin,:groupId,:awaitingEmailValidation,:Id)";
              $stmt=$pdo->prepare($sql);
              $stmt->execute([
                'username'=>$username,
                'name'=>$name,
                'email'=>$email,
                'password'=>$password,
                'pin'=>$pin,
                'groupId'=>$groupId,
                'awaitingEmailValidation'=>$awaitingEmailValidation,
                'Id'=>$id
              ]
            );

            $saved="data saved";

          }


      }catch(Exception $e){
           echo $e->getMessage();
        }

      }





}


 ?>

 <html>
 </head>
 <body>


        <form action="connect.php" method="post">
         Username : <input name="username"  type="text"  required /><br />
          <br/>
          Name: <input name="name"  type="text"  required/><br /><br/>
          Email: <input name="email"  type="text"  required/><br /><br/>
         Password: <input name="password" type="password"  required/><br />
           <br/>
         PIN: <input name="pin"  type="text"  required/><br /><br/>
         <input  name="Add" type="submit" type="submit"  /><br/>
         <?php echo $message ?>
         <?php echo $length ?>
         <?php echo $saved ?>

       </form>


 </body>
