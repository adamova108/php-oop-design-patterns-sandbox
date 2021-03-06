<?php

namespace KWD_Sandbox\Structural\Decorator;

class WithMilk extends CoffeeDecorator
{
    public Coffee $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    /* @override */
    public function getDescription(): string
    {
        return $this->coffee->getDescription() . ', Milk';
    }

    /* @override */
    public function cost(): float
    {
        return $this->coffee->cost() + .50;
    }

}