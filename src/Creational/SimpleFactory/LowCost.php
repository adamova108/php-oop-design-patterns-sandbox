<?php

namespace KWD_Sandbox\Creational\SimpleFactory;

class LowCost extends AbstractVehicle
{
    public function call()
    {
        return 'Low cost: ' . $this->cars[array_rand($this->cars)];
    }
}