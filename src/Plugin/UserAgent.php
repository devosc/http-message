<?php
/**
 *
 */

namespace Valar\Plugin;

use Closure;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use const Mvc5\SERVER;

class UserAgent
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'user_agent')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return Closure
     */
    function __invoke() : Closure
    {
        return fn() => $this[SERVER]['HTTP_USER_AGENT'] ?? '';
    }
}
