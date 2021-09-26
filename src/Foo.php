<?php
/**
 * Foo class, does foo
 *
 * @package      AL_Inpsyde
 * @license      GPL-2.0+
 */

declare(strict_types=1);

namespace KWD_Sandbox;



/**
 * Foo class.
 */
class Foo
{
    /**
     * Bar.
     *
     * @return string
     */
    public function bar(): string
    {
        return 'Foo::bar()';
    }

    /**
     * Returns true, always.
     *
     * @return true
     */
    public function is_true(): bool
    {
        return true;
    }

    public function is_false(): bool
    {
        return false;
    }
}