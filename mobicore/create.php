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
  if($pinlength<=4 or $passwordlength<=4  or $usernamelength<=4){
    $length="credentials are to short";

  }else{
    try {
      $soapClient= new SoapClient("http://test.mcash.ug/mobicore/services/members?wsdl");
      $params=array('username' => $username);
      $response=$soapClient->loadByUsername($params);
      $resp=json_decode(json_encode($response),true);
      foreach($resp as $key => $val) {
        foreach ($val as $record => $value) {
          if($value==filter_input(INPUT_POST, 'username')){
            $message = "username is taken";
          }

        }
      }

      if($message){
        return $message;

      }

            else{
              try {
                $param=array(
                'groupId'=>$groupId,
                'username' => filter_input(INPUT_POST, 'username'),
                'name'=>filter_input(INPUT_POST, 'name'),
                'email'=>filter_input(INPUT_POST, 'email'),
                'loginPassword'=>filter_input(INPUT_POST, 'password'),
                'pin'=>filter_input(INPUT_POST, 'pin')
                );
                $res=$soapClient->registerMember($param);
                $awaitingEmailValidation=null;
                $id=null;

                foreach($res as $key => $val) {
                  foreach ($val as $record => $value) {
                    if($record=="awaitingEmailValidation"){
                      $awaitingEmailValidation=$value;
                    }

                }
              }

              foreach($res as $key1 => $val1) {
                foreach ($val1 as $record1 => $value1) {
                  if($record1=="id"){
                    $id=$value1;
                  }

              }
            }
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

              } catch(Exception $e){
                  echo $e->getMessage();
               }

            }


        //   }
        // }


     } catch(Exception $e){
         echo $e->getMessage();
      }


  }

  }


 ?>




<html>

<body>


       <form action="post.php" method="post">
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
</html>
