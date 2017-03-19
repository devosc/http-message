<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Plugin;
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
        parent::__construct($name, new Plugin(PhpInputStream::class));
    }
}
