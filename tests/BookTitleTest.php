<?php

// This used to be a standalone file directly extending PHPUnit\Framework\TestCase
//require '../vendor/autoload.php';

use KWD_Sandbox\Tests\PluginTestCase;
use KWD_Sandbox\BookTitle;
use KWD_Sandbox\Foo;


class BookTitleTest extends PluginTestCase
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

    public function testTrue(): void
    {
        $this->assertTrue($this->foo->is_true());
    }

    public function testFooBar(): void
    {
        $this->assertEquals('Foo::bar()', $this->foo->bar());
    }

    public function testFalse(): void
    {
        $this->assertFalse($this->foo->is_false());
    }
}
