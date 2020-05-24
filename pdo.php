<?php
$host="localhost";
$user='root';
$password="";
$dbname="PDO"

//dsn

$dsn='mysql:host='.$host.';
dbname='.$dbname;

//Create a PDO instance
$connection= new PDO($dsn,$user,$password);

//default to an object
$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
//emulation to false so as to use LIMIT
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

// PDO Query
// $stmt=$connection->query('SELECT * FROM post');

// // attribute overidding from PDO::FETCH_OBJ to PDO::FETCH_ASSOC
// while($row->fetch(PDO::FETCH_ASSOC)){
//   echo $row['title'] .'<br>';
// }


// while($row=$stmt->fetch(PDO::FETCH_OBJ)){
//   echo $row->title .'<br>';
// }

// prepared statement(prepare and execute) instruction from data

//fetch multiple Post
//positional params ?????????????????
$author="ronnie"
$isPublished="true"
$id=11

$sql= 'SELECT *FROM posts WHERE author=?';
$stmt=$pdo->prepare($sql);
$stmt->execute([$author]);
$posts= $stmt->fetchAll();


//named params

$sql= 'SELECT *FROM posts WHERE author=:author';
$stmt=$pdo->prepare($sql);
$stmt->execute(['author'=>$author]);
$posts= $stmt->fetchAll();

 foreach ($posts as $post) {
   echo $post->title .'<br>';
 }
 //multiple params
 $sql= 'SELECT *FROM posts WHERE author=:author && isPublished= :isPublished';
 $stmt=$pdo->prepare($sql);
 $stmt->execute(['author'=>$author,'isPublished'=>$isPublished]);
 $posts= $stmt->fetchAll();

  foreach ($posts as $post) {
    echo $post->title .'<br>';
  }

  //single record
  $sql= 'SELECT *FROM posts WHERE id=:id';
  $stmt=$pdo->prepare($sql);
  $stmt->execute(['id'=>$id]);
  $post= $stmt->fetch();

  echo $post->body;

//get row count
$sql= 'SELECT *FROM posts WHERE author=:author';
$stmt=$pdo->prepare($sql);
$stmt->execute([$author]);
$postCount=$stmt->rowCount();
echo $postCount;

//posting data
$title='DAnte';
$body='Why do you seek such wohhh';
$author="ronnie";

$sql='INSERT INTO posts(title,body,author) VALUES(:title,:body,:author)';
$stmt=$pdo->prepare($sql);
$stmt->execute(['title'=>$title,'body'=>$body,'author'=>$author]);
echo 'Post has been added';

//updating  data
$id=2;
$title='DAnte';
$body='The treasure of Rome';
$author="ronnie";

$sql='UPDATE posts SET body=:body WHERE id=:id';
$stmt=$pdo->($sql);
$stmt->execute([
  'title'=>$title,
  'body'=>$body,
  'author'=>$author,
  'id'=>$id


  ]
);
echo 'Post has been updated';

//Deleting
$id=1;


$sql='DELETE FROM posts  WHERE id=:id';
$stmt=$pdo->($sql);
$stmt->execute([

  'id'=>$id


  ]
);
echo 'Post has been Deleted';

//Searching for data that has variable
$Search="%posting%"
$sql= 'SELECT *FROM posts WHERE title LIKE ?';
$stmt=$pdo->prepare($sql);
$stmt->execute([$Search]);
$posts= $stmt->fetchAll();

 foreach ($posts as $post) {
   echo $post->title .'<br>';
 }
//limiting to One
 author="ronnie"
 $isPublished="true"
 $id=11
 $limit=1

 $sql= 'SELECT *FROM posts WHERE author=? && isPublished=? LIMIT ?';
 $stmt=$pdo->prepare($sql);
 $stmt->execute([$author,$isPublished,$limit]);
 $posts= $stmt->fetchAll();

 ?>
