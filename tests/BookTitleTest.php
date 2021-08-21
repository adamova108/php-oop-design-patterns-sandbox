<?php

use KWD_Sandbox\BookTitle;
use PHPUnit\Framework\TestCase;

require './_sandbox2.php'; // Both this line and "use KWD_Sandbox\BookTitle" are needed IF "namespace KWD_Sandbox" is defined in _sandbox2.php

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
