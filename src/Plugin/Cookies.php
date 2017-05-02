<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;

class Cookies
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'cookies')
    {
        parent::__construct($name, new GlobalVar('_COOKIE'));
    }
}
