<?php

namespace KWD_Sandbox\Creational\SimpleFactory;

class VehicleFactory
{
    public static function getVehichle(string $type): AbstractVehicle
    {
        switch ($type) {
            case 'Luxurious':
                return new Luxurious(['Mercedes', 'BMW', 'Audi', 'Tesla']);

            case 'Low-Cost':
                return new LowCost(['Opel', 'Suzuki', 'Lada', 'Trabant']);

            default:
                throw new \Exception('Type is not valid.');

        }
    }
}