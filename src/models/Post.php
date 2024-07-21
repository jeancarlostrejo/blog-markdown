<?php

namespace Ferre\Blog\models;

class Post
{
    public function __construct(private string $file)
    {
    }

    public function getContent(): void
    {
        $stream = fopen($this->getFileName(), "r");
        $content = fread($stream, filesize($this->getFileName()));

        echo $content;
    }

    public function getFileName(): string
    {
        $dir = Url::getRootPath();
        $fileName = "{$dir}/entries/{$this->file}";
        return $fileName;
    }

    public static function getPosts(): array
    {
        $posts = [];
        $files = scandir(Url::getRootPath() . "/entries");

        foreach ($files as $file) {
            if (strpos($file, ".md") > 0) {
                $posts[] = new Post($file);
            }

        }

        return $posts;
    }

    public function getUrl(): string
    {
        $url = substr($this->file, 0, strpos($this->file, ".md"));
        $title = str_replace(" ", "-", $url);

        return "http://localhost/blog-md/?post={$title}";
    }
}
