<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;

class Data
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'data')
    {
        parent::__construct($name, new GlobalVar('_POST'));
    }
}
