<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Model;
use Mvc5\Plugin\Shared;

class Attributes
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'attributes')
    {
        parent::__construct($name, new Model);
    }
}
