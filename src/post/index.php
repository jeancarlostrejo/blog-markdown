<?php

use Ferre\Blog\models\Post;

$post = new Post($postName . ".md");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="src/resources/main.css">

</head>
<body>
    <?php require "src/partials/navbar.php";?>
    
    <div class="post-container">
        <?php echo $post->getContent();?>
    </div>

</body>
</html>