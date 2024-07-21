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
    use Ferre\Blog\models\Post;

    $posts = Post::getPosts();

    foreach($posts as $post) {
        echo "<div><a href = '{$post->getUrl()}'>{$post->getFileName()} </a></div>";
    }
    ?>
</body>
</html>