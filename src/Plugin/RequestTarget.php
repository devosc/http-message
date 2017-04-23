<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class RequestTarget
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'target')
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
            $uri = $this[Arg::URI];
            $query = $uri[Arg::QUERY] ?? '';
            $path = $uri[Arg::PATH] ?? '';
            return ($path ?: '/') . ($query ? '?' . $query : '');
        };
    }
}
