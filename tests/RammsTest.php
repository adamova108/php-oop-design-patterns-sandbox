<?php
declare(strict_types=1);

namespace KWD_Sandbox\Tests;

use Brain\Monkey\Functions;
use KWD_Sandbox\Hello_Rammstein;

class Some
{

    public function create_cap()
    {
        $wp_roles = wp_roles();
        $wp_roles->add_cap('testrole');
        $wp_roles->add_cap('testrole');

    }

}

class RammsTest extends PluginTestCase
{

    public function test_get_random_lyric()
    {
        $this->hR
            // The function we want to mock.
            ->expects('get_random_number')
            // The amount of times we expect the function to be called.
            ->once()
            // The value the function should return.
            ->andReturn(6);

        $expected = "Sie lieben auch in schlechten Tagen";
        //Functions\when('wptexturize' )->justReturn($expected);
        Functions\when('wptexturize')->returnArg();
        $actual = $this->hR->get_random_lyric();

        $this->assertEquals($expected, $actual);
    }

    public function test_something()
    {
        // Our code calls `wp_roles` so we mock it
        $wp_roles = \Mockery::mock('\WP_Roles');
        $wp_roles->shouldReceive('add_cap')
            ->times(2);
        Functions\expect('wp_roles')
            ->once()
            ->withNoArgs()
            ->andReturn($wp_roles);
        // Act
        // Assume `create_cap` calls `wp_roles` in some way.
        // Then it calls `add_cap` 5 times.
        $this->assertEmpty((new Some())->create_cap());
    }

    public function test_construct()
    {
        // arrange
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = ['foo' => '\\\'asas'];
        // We expect wp_unslash to be called during bootstrap
        /*Functions\expect( 'wp_unslash' )
            ->once()
            ->with( $_POST )
            ->andReturnFirstArg();*/

        // Fire
        $stub = $this->getMockForAbstractClass(Hello_Rammstein::class);
        $stub_class = get_class($stub);
        // $base = new \EFormStub\StubAdminBase();
        $stub->register_hooks();
        // We expect admin_head action to have been added when calling register
        $this->assertEquals(10, has_action('admin_head', "{$stub_class}->output_css()"));
        //$this->assertEquals( 10, has_action( 'admin_notices', "{$stub_class}->output_css()" ) );
        // Assert
        //$this->assertEquals( $_POST, $stub->get_post() );
    }
}