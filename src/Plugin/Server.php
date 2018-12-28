<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Call;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;

class Server
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'server')
    {
        parent::__construct(
            $name, new Call('@Zend\Diactoros\normalizeServer', [new GlobalVar('_SERVER')])
        );
    }
}
