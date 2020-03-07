<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

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
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => $this[Arg::USER][Arg::AUTHENTICATED] ?? false;
    }
}
