<?php

namespace KWD_Sandbox\Structural\Decorator;

abstract class Coffee
{
    public string $description = 'Unknown Coffee';

    public function getDescription(): string
    {
        return $this->description;
    }

    public abstract function cost(): float;
}