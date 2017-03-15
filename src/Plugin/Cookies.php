<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Cookies
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'cookies')
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
            return $this->service->plugin('cookie');
        };
    }
}
