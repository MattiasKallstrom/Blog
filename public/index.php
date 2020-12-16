<?php
    
    require('../src/dbconnect.php');
    
    $pageTitle = "Home";
    $pageId = "home";
  
?>
<?php include('layout/header.php'); include('layout/footer.php') ?>

<?php



$stmt = $conn->prepare("SELECT * FROM posts ORDER BY id DESC");
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="My blog">My blog</h1>

<div class="container">
    <div class="row">
    <?php foreach ($rows as $row) { ?>
    
      

             <h2><?php echo htmlspecialchars($row['title']); ?></h2>
             <div><?php echo htmlspecialchars($row['content']); ?></div>
              <div><?php echo htmlspecialchars($row['author']); ?></div>
              <div><?php echo htmlspecialchars($row['published_date']); ?></div>
               
                  
            
   

    <?php } ?>
        <?php include('layout/byline.html'); ?>            
</div>
</div>
    