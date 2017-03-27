<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;

class Args
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'args')
    {
        parent::__construct($name, new GlobalVar('_GET'));
    }
}
