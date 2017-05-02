<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class UserAgent
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'user_agent')
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
            return $this[Arg::SERVER]['HTTP_USER_AGENT'] ?? '';
        };
    }
}
