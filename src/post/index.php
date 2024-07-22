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
</head>
<body>
    <h1>Mi primer Post</h1>
    <?php
        echo $post->getContent();   
    ?>
</body>
</html>