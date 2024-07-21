<?php

namespace Ferre\Blog\models;

class Url
{
    public static function getRootPath(): string
    {
        return substr(__DIR__, 0, strpos(__DIR__, "src") + 3);
    }
}
