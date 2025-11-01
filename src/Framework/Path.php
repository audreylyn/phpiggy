<?php

declare(strict_types=1);

namespace Framework;

class Path
{
    /**
     * Normalize a path by trimming slashes and ensuring it starts and ends with a slash
     * 
     * @param string $path The path to normalize
     * @return string The normalized path
     */
    public static function normalize(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }
}
