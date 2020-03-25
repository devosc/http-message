<?php
/**
 *
 */

namespace Valar\Plugin;

use Closure;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use const Mvc5\{ PATH, QUERY, URI };

class RequestTarget
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'target')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return Closure
     */
    function __invoke() : Closure
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            $uri = $this[URI];
            $query = $uri[QUERY] ?? '';
            $path = $uri[PATH] ?? '';
            return ($path ?: '/') . ($query ? '?' . $query : '');
        };
    }
}
