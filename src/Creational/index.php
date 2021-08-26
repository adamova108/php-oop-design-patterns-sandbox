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

//simpleFactory();

function fizzBuzz()
{
    /*foreach(range(1,100) as $n) {
        if ($n % 3 === 0 && $n % 5 === 0) {
            echo 'FizzBuzz ';
        } elseif ($n % 3 === 0) {
            echo 'Fizz ';
        } elseif ($n % 5 === 0) {
          echo 'Buzz ';
        } else {
            echo "$n ";
        }

        echo $n % 3 === 0 && $n % 5 === 0 ? 'FizzBuzz ' : ($n % 3 === 0 ? 'Fizz ' : ($n % 5 === 0 ? 'Buzz ' : "$n "));
    }*/

    for ($i = 1; $i <= 100; $i++) {

        $output = '';

        if ($i % 3 === 0) $output .= 'Fizz';
        if ($i % 5 === 0) $output .= 'Buzz';

        if ($output == '') $output .= $i;

        echo $output . "\n";
    }
}

//fizzBuzz();

$_fp = fopen('100000_testinput.txt', "r");

$n = fgets($_fp);
$phoneBook = [];
$output = "";
for ($i = 1; $i <= $n; $i++) {
    $data = explode(' ', trim(fgets($_fp)));
    if (count($data) == 2 && $data[0] != '' && $data[1] != '' && !isset($phoneBook[$data[0]])) {
        $phoneBook[$data[0]] = $data[1];
    }
}

while ($name = trim(fgets($_fp))) {
    $output .= !empty($name) && isset($phoneBook[$name]) ? "$name={$phoneBook[$name]}\n" : "Not found\n";
}
$output = rtrim($output, "\n");

file_put_contents('100000_output.txt', $output);
