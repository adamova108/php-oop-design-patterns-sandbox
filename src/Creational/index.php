<?php

use KWD_Sandbox\Creational\SimpleFactory\VehicleFactory;

require_once __DIR__ . './../../vendor/autoload.php';

function simpleFactory()
{

    try {
        $car = VehicleFactory::getVehichle('Luxurious');
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    echo isset($car) ? $car->call() : '';
}

simpleFactory();