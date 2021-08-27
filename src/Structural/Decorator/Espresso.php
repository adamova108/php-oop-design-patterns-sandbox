<?php

namespace KWD_Sandbox\Structural\Decorator;

class Espresso extends Coffee
{
    public function __construct()
    {
        $this->description = 'Espresso';
    }

    public function cost(): float
    {
        return 1.99;
    }
}