<?php
/**
 *
 */

namespace Valar;

use Mvc5\Service\Service;
use Mvc5\Request\Config\Request as _Request;
use Mvc5\Request\Request as Mvc5Request;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class ServerRequest
    extends Http\ServerRequest
    implements Mvc5Request
{
    /**
     *
     */
    use _Request;

    /**
     * @var HttpRequest
     */
    protected $http;

    /**
     * @var Service
     */
    protected $service;

    /**
     * @param array|\ArrayAccess $config
     * @param Service $service
     * @param HttpRequest $http
     */
    function __construct($config, Service $service, HttpRequest $http)
    {
        $this->config = $config;
        $this->http = $http;
        $this->service = $service;
    }
}
