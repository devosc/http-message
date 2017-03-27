<?php
/**
 *
 */

namespace Valar;

use Mvc5\Service\Service;
use Mvc5\Request\Config\Request as _Request;
use Mvc5\Request\Request as Mvc5Request;

class ServerRequest
    extends Http\ServerRequest
    implements Mvc5Request
{
    /**
     *
     */
    use _Request;

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
