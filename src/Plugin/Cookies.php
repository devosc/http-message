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
     * @param string $name
     */
    function __construct(string $name = 'cookies')
    {
        parent::__construct($name, new GlobalVar('_COOKIE'));
    }
}
