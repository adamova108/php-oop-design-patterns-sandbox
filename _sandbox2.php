<?php

namespace KWD_Sandbox;

class BookTitle
{
    private $titleString;

    public function __construct($titleString)
    {
        if (empty($titleString)) {
            throw new \Exception('Title cannot be empty!');
        }
        $this->titleString = $titleString;
    }

    /**
     * @return mixed
     */
    public function getTitleString()
    {
        return $this->titleString;
    }
}


class Solution
{
    // Write your code here

    public $stack = [];
    public $queue = [];

    public function pushCharacter($s)
    {
        array_unshift($this->stack, $s);
    }

    public function popCharacter()
    {
        return array_shift($this->stack);
    }

    public function enqueueCharacter($s)
    {
        array_push($this->queue, $s);
    }

    public function dequeueCharacter()
    {
        return array_shift($this->queue);
    }
}

$s = 'racecar';

// create the Solution class object p
$obj = new Solution();

$len = strlen($s);
$isPalindrome = true;

// push/enqueue all the characters of string s to stack
for ($i = 0; $i < $len; $i++) {
    $obj->pushCharacter($s[$i]);
    $obj->enqueueCharacter($s[$i]);
}

var_dump($obj->stack, $obj->queue);

for ($i = 0; $i < $len / 2; $i++) {
    if ($obj->popCharacter() != $obj->dequeueCharacter()) {
        $isPalindrome = false;

        break;
    }
}

//finally print whether string s is palindrome or not.
if ($isPalindrome)
    echo "The word, " . $s . ", is a palindrome.";
else
    echo "The word, " . $s . ", is not a palindrome.";