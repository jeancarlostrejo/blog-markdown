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
}
