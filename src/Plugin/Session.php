<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Session
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'session')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            return $this->service ? $this->service->plugin('session') : null;
        };
    }
}
