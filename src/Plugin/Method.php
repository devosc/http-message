<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Method
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'method')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            return strtoupper(
                $this[Arg::HEADERS]['X-HTTP-METHOD-OVERRIDE'] ?? ($this[Arg::SERVER]['REQUEST_METHOD'] ?? 'GET')
            );
        };
    }
}
