<?php

namespace KWD_Sandbox\Behavioral\Observer;

interface CurrencyInterface
{
    public function update(float $price);

    public function getPrice();
}