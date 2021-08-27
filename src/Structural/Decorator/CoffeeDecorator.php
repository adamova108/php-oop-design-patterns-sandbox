<?php

namespace KWD_Sandbox\Structural\Decorator;

abstract class CoffeeDecorator extends Coffee
{
    public abstract function getDescription(): string;
}