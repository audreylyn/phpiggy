<?php

declare(strict_types=1);

namespace Framework;

class Path
{
    /**
     * Normalize a path by trimming slashes and ensuring it starts and ends with a slash
     */
    public static function normalize(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }
}
