<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use function strtoupper;

use const Mvc5\{ HEADERS, SERVER };

class Method
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'method')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => strtoupper(
                $this[HEADERS]['X-HTTP-METHOD-OVERRIDE'] ?? ($this[SERVER]['REQUEST_METHOD'] ?? 'GET')
        );
    }
}
