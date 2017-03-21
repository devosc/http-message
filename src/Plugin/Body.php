<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\PhpInputStream;

class Body
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'body')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            return new PhpInputStream;
        };
    }
}
