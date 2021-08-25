<?php

namespace KWD_Sandbox\Behavioral\Observer;

class PriceSimulator implements ObserverInterface
{
    private $currencies = [];

    public function addCurrency(Currency $currency)
    {
        array_push($this->currencies, $currency);
    }

    public function updatePrice()
    {
        foreach ($this->currencies as $currency) {
            $currency->update();
        }
    }
}