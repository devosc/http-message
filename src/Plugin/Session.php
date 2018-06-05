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
     * @param $name
     */
    function __construct($name = 'session')
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
            return $this->service ? $this->service->plugin('session') : null;
        };
    }
}
