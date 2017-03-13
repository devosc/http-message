<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

class Accept
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'accept')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\Request\Config $this */
            return $this->http->getAcceptableContentTypes();
        };
    }
}
