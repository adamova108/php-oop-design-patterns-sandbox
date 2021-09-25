<?php

class Comparator
{

    protected string $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function __invoke($a, $b): int
    {
        return $a[$this->key] < $b[$this->key] ?
            -1 : ($a[$this->key] > $b[$this->key] ? 1 : 0);
    }
}

$dI = new DateInterval('P1D');

$comparisonFn = function ($a, $b) {
    return $a['value'] < $b['value'] ? -1 : ($a['value'] > $b['value'] ? 1 : 0);
};

function comparisonFn($a, $b): int
{
    return $a['value'] < $b['value'] ? -1 : ($a['value'] > $b['value'] ? 1 : 0);
}

$arr = [
    ['key' => 3, 'value' => 10, 'weight' => 100],
    ['key' => 5, 'value' => 10, 'weight' => 50],
    ['key' => 2, 'value' => 3, 'weight' => 0],
    ['key' => 4, 'value' => 2, 'weight' => 400],
    ['key' => 1, 'value' => 9, 'weight' => 150]
];

$key = 'value';
usort($arr, function ($a, $b) use ($key) {
    return $a[$key] < $b[$key] ? -1 : ($a[$key] > $b[$key] ? 1 : 0);
});

//usort($arr, $comparisonFn);

usort($arr, 'comparisonFn');

usort($arr, new Comparator('weight'));

//var_export($arr);

/******************************************/

abstract class Being
{

    protected $isAlive = true;

    public function isAlive()
    {
        echo $this->isAlive ? "Being status: ALIVE\n" : "Being status: NOT ALIVE\n";
    }

    public function kill()
    {
        $this->isAlive = false;
    }
}

/* Value Object */

class Age
{

    private $age;

    public function __construct(int $age)
    {
        if ($age < 1) {
            throw new Exception('Age must be 1 or grater.');
        }
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
}

abstract class Animal extends Being
{

    protected $age;

    public function __construct(Age $age)
    {
        $this->age = $age->getAge();
    }

    protected function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }
}

class Cat extends Animal
{

    private $name;

    public function __construct($name, $age)
    {
        $this->name = $name;
        parent::__construct($age);
    }

    public function getName()
    {

        return $this->name;
    }
}

try {
    $cat = new Cat("Cici", new Age(1));
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($cat) && $cat instanceof Cat) {
    $cat->isAlive();
    echo $cat->getName() . " is " . $cat->getAge() . " year(s) old\n";
}


function oops()
{
    $a = 1;
    $a += 2;
    echo $a;
}


/*
 * Null-safe vs null coalescing operator
 */

$nsarray = [];
//var_dump($array['key']?->foo); // Will error out Warning: Undefined array key "key"
//var_dump($nsarray['key']->foo ?? null); // Will output NULL
//var_dump($kuki ?? null); // Will output NULL
//var_dump($kuki); //Warning: Undefined variable $kuki in C:\wamp64_323\www\_sandbox\_sandbox.php on line 138

class Invoice
{
    public function getDate()
    {

    }
}

$invoice = new Invoice();
//var_dump($invoice);
echo '$invoice->getDate()?->format(\'Y-m-d\') is ';
var_dump($invoice->getDate()?->format('Y-m-d'));


/**** FUNC_GET_ARGS ****/

function func_param($p1)
{
    return $p1 + 1;
}

function my_function()
{
    $fg = func_get_args();
    return implode('|', $fg);
}

echo my_function('józsika', func_param(3));

function oddNumbers($l, $r)
{
    // Write your code here
    if ($l < 1 || $r > 10 ** 5) {
        return 'Please specify a range of integers between 1 and 100000.';
    }

    $resultArray = array();

    foreach (range($l, $r) as $num) {
        if ($num % 2 != 0) {
            $resultArray[] = $num;
        }
    }

    return $resultArray;
}

var_dump(oddNumbers(2, 5));


/*** Linked Lists ***/

function singlyLinkedLists($listHead)
{

    //Define some auxiliary variables
    $current = $listHead;
    $auxiliary = null;
    $back = null;
    //iterating linked list elements
    while ($current != null) {
        if ($current->data % 2 != 0) {
            //When get odd node
            $auxiliary = $current;
        } else {
            $back = $current;
        }
        //visit to next node
        $current = $current->next;
        if ($auxiliary != null) {
            //When Deleted node exists
            if ($back == null) {
                // When front node is odd node
                // head visit to next node
                $listHead = $current;
            } else {
                // Deleted node are exist in intermediate or last position of linked list
                // Before delete node, there left node is connecting to next upcoming node
                $back->next = $current;
            }
            //unlink deleted node
            $auxiliary->next = null;
            $auxiliary = null;
        }
    }
}

/*** Read Standard Input Object - STDIN ***/

//$meal_cost = doubleval(trim(fgets(STDIN)));
//$tip_percent = intval(trim(fgets(STDIN)));

/*$dataLines = [];
while($f = fgets(STDIN)){
    $dataLines[] = preg_replace('/[\n|\r]/', '', $f);
}*/

//$fptr = fopen(getenv("OUTPUT_PATH"), "w");


$option = new \stdClass();
$option->response = [];
$option->response['kutykurutty'] = new \stdClass();

$option2 = (object)['response' => ['asdasd' => (object)[]]];
var_dump($option);
var_dump($option2);


$emptyTest = (int)0;

var_dump($emptyTest, empty($emptyTest));


/*
 function hourglassSum($arr) {
    for($i = 0; $i <= count($arr) - 3; $i++) {
        for($j = 0; $j <= count($arr[$i]) - 3; $j++) {
            $result[] = intval($arr[$i][$j] + $arr[$i][$j+1] + $arr[$i][$j+2]
                + $arr[$i+1][$j+1]
                + $arr[$i+2][$j] + $arr[$i+2][$j+1] + $arr[$i+2][$j+2]);
        }
    }

    return max($result);
} */


/*try {
    new ReflectionClass('ReflectionClass' . ((int)$S . "" !== $S));
    echo $S;
} catch (Exception $e) {
    echo "Bad String";
}*/