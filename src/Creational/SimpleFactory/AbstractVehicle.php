<?php

namespace KWD_Sandbox\Creational\SimpleFactory;

abstract class AbstractVehicle
{
    protected array $cars = [];

    public function __construct(array $cars)
    {
        $this->cars = $cars;
    }

    abstract public function call();

}