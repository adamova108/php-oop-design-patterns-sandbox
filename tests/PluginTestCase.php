<?php

namespace KWD_Sandbox\Tests;

use KWD_Sandbox\Foo;
use PHPUnit\Framework\TestCase;

use KWD_Sandbox\Hello_Rammstein;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

use Brain\Monkey;

abstract class PluginTestCase extends TestCase
{

    //use MockeryPHPUnitIntegration;

    protected $foo;

    protected $hR;

    /**
     * Runs before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        Monkey\setUp();
        $this->foo = new Foo;

        $this->hR = \Mockery::mock(Hello_Rammstein::class)
            ->shouldAllowMockingProtectedMethods()
            ->makePartial();
    }

    /**
     * Runs after each test.
     */
    protected function tearDown(): void
    {
        Monkey\tearDown();
        parent::tearDown();
    }
}