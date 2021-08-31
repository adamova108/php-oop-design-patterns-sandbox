<?php

use KWD_Sandbox\Structural\Composite\Playlist;
use KWD_Sandbox\Structural\Composite\Song;

use KWD_Sandbox\Structural\Decorator\Coffee;
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
    printCoffee($espresso);
    /*var_dump($espresso);
    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";*/

    $espresso = new WithMilk($espresso);
    printCoffee($espresso);
    /*var_dump($espresso);
    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";
    echo $espresso->getDescription();*/

    $espresso = new WithSugar($espresso);
    printCoffee($espresso);
    /*var_dump($espresso);
    echo "\n = = = = == = = = == = = = == = = = == = = = == = = = = \n";
    echo $espresso->getDescription();*/
}

function printCoffee(Coffee $coffee): void
{
    echo "Cost: {$coffee->cost()} | Desc: {$coffee->getDescription()}\n";
}

//decorator();
