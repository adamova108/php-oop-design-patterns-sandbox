<?php

namespace KWD_Sandbox\Creational\SimpleFactory;

class Luxurious extends AbstractVehicle
{
    public function call()
    {
        return 'Luxurious: ' . $this->cars[array_rand($this->cars)];
    }

}