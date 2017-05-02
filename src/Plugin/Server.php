<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Plugin\Call;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\ServerRequestFactory as Factory;

class Server
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'server')
    {
        parent::__construct(
            $name, new Call('@' . Factory::class . '::normalizeServer', [new GlobalVar('_SERVER')])
        );
    }
}
