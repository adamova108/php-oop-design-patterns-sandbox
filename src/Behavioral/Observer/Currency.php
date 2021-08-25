<?php

namespace KWD_Sandbox\Behavioral\Observer;

class Currency implements CurrencyInterface
{
    private $name = '';
    private $price = 0;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function update(float $price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }
}