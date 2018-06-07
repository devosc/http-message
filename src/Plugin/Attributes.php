<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Shared;
use Mvc5\Plugin\Value;

class Attributes
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'attributes')
    {
        parent::__construct($name, new Value([]));
    }
}
