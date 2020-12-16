<?php
   
    require('../src/dbconnect.php');
 
?>

<?php 

$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);

$stmt = $conn->prepare("INSERT INTO posts (title, content, author, published_date)
VALUES (:title, :content, :author, :published_date)");


$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':published_date', $published_date);

$errors = array('title'=>'', 'content'=>'', 'author'=>'');

if (isset($_POST['submit'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

    if (empty($_POST["title"])) {
      $errors['title'] = "A title is required";
    } else {
      $title = $_POST["title"];
    }
    
    if (empty($_POST["content"])) {
      $errors['content'] = "Some content is required";
    } else {
      $content = $_POST["content"];
    }
      
    if (empty($_POST["author"])) {
    $errors['author'] = "The post needs an author";
    } else {
      $author = $_POST["author"];
    }

}
}
  
$stmt->execute();
?>
