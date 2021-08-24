<?php

use KWD_Sandbox\Structural\Composite\Playlist;
use KWD_Sandbox\Structural\Composite\Song;

require_once __DIR__ . './../../vendor/autoload.php';


function composite()
{

    $rockPlaylist = new Playlist();
    $rockPlaylist->addSong(new Song('Viral', 'Amaranthe', '/muzik/viral.mp3'));
    $rockPlaylist->addSong(new Song('Morrigan', 'Children Of Bodom', '/muzik/cob-morrigan.mp3'));
    $rockPlaylist->addSong(new Song('Headfuck Rollercoaster', 'Parasite Inc.', '/muzik/hfuk_rollercoaster.mp3'));

    echo "Init Play: {$rockPlaylist->play()}\n";

    echo "Next: {$rockPlaylist->next()}\n";
    echo "Next: {$rockPlaylist->next()}\n";
    echo "Next: {$rockPlaylist->next()}\n";

    echo "Prev: {$rockPlaylist->previous()}\n";
    echo "Prev: {$rockPlaylist->previous()}\n";
    echo "Prev: {$rockPlaylist->previous()}\n";
    echo "Prev: {$rockPlaylist->previous()}\n";

}

composite();