<?php
/**
 *
 */

namespace Valar\Plugin;

use Closure;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use const Mvc5\{ AUTHENTICATED, USER };

class Authenticated
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'authenticated')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return Closure
     */
        function __invoke() : Closure
    {
        return fn() => $this[USER][AUTHENTICATED] ?? false;
    }
}
