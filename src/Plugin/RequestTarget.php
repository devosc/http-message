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

            $query = $this[Arg::URI][Arg::QUERY];
            $target = $this[Arg::URI][Arg::PATH];

            $query && $target .= '?' . $target;

            return empty($target) ? '/' : $target;
        };
    }
}
