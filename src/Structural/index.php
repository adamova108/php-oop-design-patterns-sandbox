<?php

use KWD_Sandbox\Structural\Composite\Playlist;
use KWD_Sandbox\Structural\Composite\Song;
use KWD_Sandbox\Structural\Decorator\Espresso;
use KWD_Sandbox\Structural\Decorator\WithMilk;
use KWD_Sandbox\Structural\Decorator\WithSugar;

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

//composite();

function decorator()
{

    $espresso = new Espresso();
    var_dump($espresso);

    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";

    $espresso = new WithMilk($espresso);
    var_dump($espresso);
    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";
    echo $espresso->getDescription();

    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";

    $espresso = new WithSugar($espresso);
    var_dump($espresso);
    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";
    echo $espresso->getDescription();
}

decorator();