<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;

final class Args
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'args')
    {
        parent::__construct($name, new GlobalVar('_GET'));
    }
}
