<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;

class Stream
    extends ScopedCall
{
    /**
     *
     */
    function __construct()
    {
        parent::__construct($this);
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\Request\Config $this */
            return $this->http->getContent(true);
        };
    }
}
