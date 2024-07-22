<?php

namespace Ferre\Blog\models;

use Error;

class Post
{
    public function __construct(private string $file)
    {
    }

    public function getContent(): string
    {
        if (file_exists($this->getFileName())) {
            $stream = fopen($this->getFileName(), "r");
            $content = fread($stream, filesize($this->getFileName()));
            return nl2br($content);
        } else {
            $this->getFileNameWithoutDash();

            if (file_exists($this->getFileName())) {
                $stream = fopen($this->getFileName(), "r");
                $content = fread($stream, filesize($this->getFileName()));
                return nl2br($content);
            }
        }

        throw new Error("No existe");
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

    private function getFileNameWithoutDash()
    {
        $title = str_replace("-", " ", $this->file);
        $this->file = $title;

        return $title;
    }

    public function getPostName(): string
    {
        $title = $this->file;
        $title = str_replace("-", " ", $this->file);
        $title = str_replace(".md", "", $this->file);

        return $title;
    }
}
