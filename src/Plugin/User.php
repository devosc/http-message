<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class User
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'user')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke() : \Closure
    {
        return fn() => $this->service ? $this->service->plugin('user') : null;
    }
}
