<?php

require '../vendor/autoload.php';

use KWD_Sandbox\BookTitle;
use PHPUnit\Framework\TestCase;


class BookTitleTest extends TestCase
{
    /**
     * @test
     */
    public function testBookTitle()
    {
        $bookTitle = new BookTitle("The Full Potential Within");
        $this->assertEquals("The Full Potential Within", $bookTitle->getTitleString());
    }

    /**
     * @test
     */
    public function testEmptyBookTitle()
    {
        $this->expectException(\Exception::class);
        new BookTitle("");
    }
}
