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