

 <?php
 //class database
   class Database {
     // DB Parameters
     private $host = 'localhost';
     private $db_name = 'myblog';
     private $username = 'root';

     private $conn;

     // DB Connect
     public function __construct() {
       $this->conn = null;

       try {

         $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->setAttribute(PDO::ATTR_EMULATE_PREPARES,false)
       } catch(PDOException $e) {
         echo 'Connection Error: ' . $e->getMessage();
       }

       return $this->conn;
     }

     public function getAll($condition=""){
   		$result = $this->conn->query("SELECT * FROM student $condition");
   		return $result->fetch_all(MYSQLI_ASSOC);
   	}


   	public function getById($id){
   		return $this->conn->query("SELECT * FROM student WHERE id=$id")->fetch_assoc();
   	}

    public function insert($name, $email, $address){
    		$this->conn->query("INSERT INTO student (id, name, email, address) VALUES (null, '$name', '$email', '$address')");
    		return $this->conn->insert_id;
    	}


    	public function update($id, $name, $email, $address){
    		return $this->conn->query("UPDATE student SET name='$name', email='$email', address='$address' WHERE id=$id");
    	}


    	public function delete($id){
    		return $this->conn->query("DELETE FROM student WHERE id=$id");
    	}


   }
   ?>
