<?php
/**
 *
 */

namespace Valar;

use Mvc5\Service\Service;
use Mvc5\Request\Config\Request;

class ServerRequest
    extends Http\ServerRequest
    implements \Mvc5\Request\Request
{
    /**
     *
     */
    use Request;

    /**
     * @var Service
     */
    protected $service;

    /**
     * @param array|\ArrayAccess $config
     * @param Service $service
     */
    function __construct($config, Service $service)
    {
        parent::__construct($config);
        $this->service = $service;
    }
}
