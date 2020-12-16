<?php
require ('../src/dbconnect.php');
require ('../src/config.php');
require_once('../src/functions.php');



print_r($_POST);

$id = '';
$title = '';
$content = '';
$author = '';
$error = '';
$msg = '';
if (isset($_POST['edit'])) {
    $id = $_GET['edit'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $author = trim($_POST['author']);
    
    
   

        
    }     

$post = $postMod->fetchById($_GET['edit']);


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];


}
   

?>
<body>

      <div id="content">
        <article class="border">
        <form action="" method="post">    
            <p>
                <h2> EDIT </h2>

                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $post['title']; ?>"placeholder="Title">
              

                <label for="content">Content</label>
                <textarea type="text" name="content" rows="5" cols="40" placeholder="Content"><?php echo $post['content']; ?></textarea>
                

                <label for="author">Author</label>
                <input type="text" name="author" value="<?php echo $post['author']; ?>" placeholder="Author">
             
          
                <button type="submit" class="" name="update">Update</button>
              
                <input type="hidden" name="id" value="<?php echo $id;?>">
    
                <a href="admin.php">Back to admin page</a>
            
            </p>
        </form>

            <?php include('layout/byline.html'); ?>            

            <hr>
        </article>
    </div>
   
</body>