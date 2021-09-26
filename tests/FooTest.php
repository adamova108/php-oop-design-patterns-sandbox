<?php

declare(strict_types=1);

namespace KWD_Sandbox\Tests;

use Brain\Monkey\Functions;

class Storage
{

    public function save(string $title)
    {
        $id = wp_insert_post(
            ['post_title' => $title]
        );
        if (!is_numeric($id)) {
            throw new \Exception('Could not create');
        }
        return $id;
    }
}

class FooTest extends PluginTestCase
{

    public function testTrue(): void
    {
        $this->assertTrue($this->foo->is_true());
    }

    public function testFooBar(): void
    {
        $this->assertEquals('Foo::bar()', $this->foo->bar());
    }

    public function testNumeric(): void
    {
        $this->assertIsNumeric(1);
    }

    public function testRegisterAndEnqueue(): void
    {
        Functions\when('wp_insert_post')->justReturn(1);
        $this->assertIsNumeric(
            (new Storage())->save('Hello Royvan')
        );
    }
}