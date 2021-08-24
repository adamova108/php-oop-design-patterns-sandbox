<?php

namespace KWD_Sandbox\Structural\Composite;

class Song implements MusicInterface
{
    protected $title, $artist, $path;

    public function __construct(string $title, string $artist, string $path)
    {
        
    }

    public function play()
    {
        // TODO: Implement play() method.
    }
}