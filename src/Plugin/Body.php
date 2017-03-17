<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Call;
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
        parent::__construct($name, new Call($this));
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
