<?php

namespace KWD_Sandbox\Tests;

use KWD_Sandbox\Foo;
use PHPUnit\Framework\TestCase;
use Mockery;

abstract class PluginTestCase extends TestCase
{

    protected $foo;

    /**
     * Runs before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->foo = new Foo;

        /*$this->foo = Mockery::mock( Foo::class )
            ->shouldAllowMockingProtectedMethods()
            ->makePartial();*/
        //Monkey\setUp();

    }

    /*public function testFalse(): void {
        $this->foo
            // The function we want to mock.
            ->expects( 'bar' )
            // The amount of times we expect the function to be called.
            ->once()
            // The value the function should return.
            ->andReturn( 'kjh' );

        $this->assertEquals( 'Foo::bar()',  $this->foo->bar() );
    }*/
}