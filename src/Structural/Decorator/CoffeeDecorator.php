<?php

namespace KWD_Sandbox\Structural\Decorator;

abstract class CoffeeDecorator extends Coffee
{
    public function getDescription(): string
    {
        return $this->description;
    }
}