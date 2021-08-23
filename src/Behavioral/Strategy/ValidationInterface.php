<?php

namespace KWD_Sandbox\Behavioral\Strategy;

interface ValidationInterface
{
    public function __construct(string $value, string $name);

    public function validate(): string;
}