<?php
require ('../src/dbconnect.php');
require ('delete.php');
require ('create.php');

require_once('../src/config.php');



//$conn = new PDO("mysql:host=$host;dbname=$db", $username, $password);

    
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
$stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':author', $author);
 ?>
<?php require 'layout/header.php'; ?>

      <h2>All posts</h2> 
      

      <table>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Content</th>
          <th>Author</th>
        </tr>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?php echo htmlspecialchars($post['id']); ?></td>
            <td><?php echo htmlspecialchars($post['title']); ?></td>
            <td><?php echo htmlspecialchars($post['content']); ?></td>
            <td><?php echo htmlspecialchars($post['author']); ?></td>
            <td>
              <a href="edit.php?edit=<?php echo $post['id'] ?>" name="edit">Edit</a>
              <a onclick href="admin.php?delete=<?php echo  $post['id']?>">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
<body>
<?php require_once('../src/functions.php'); ?>
      <div id="content">
        <article class="border">
        <form action="admin.php" method="post">    
            <p>
                <label for="input1">Create a new topic:</label><br>

                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>"placeholder="Title">
                <div><?php echo $errors['title'];?></div><br>

                <label for="content">Content</label>
                <textarea type="text" name="content" value="<?php echo $content; ?>" rows="5" cols="40" placeholder="Content"></textarea>
                <div><?php echo $errors['content'];?></div><br>

                <label for="author">Author</label>
                <input type="text" name="author" value="<?php echo $author; ?>" placeholder="Author">
                <div><?php echo $errors['author'];?></div><br>
              
            
                <input type ="submit" name="submit" value="Submit">
            
            </p>
        </form>

            <?php include('layout/byline.html'); ?>            

            <hr>
        </article>
    </div>
   
</body>