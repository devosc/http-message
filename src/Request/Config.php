<?php
/**
 *
 */

namespace Valar\Request;

use Mvc5\Service\Service;
use Symfony\Component\HttpFoundation\ApacheRequest as HttpRequest;

class Config
    implements Request
{
    /**
     *
     */
    use Config\Request;

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
     */
    function __construct($config, Service $service)
    {
        $this->config  = $config;
        $this->http    = new HttpRequest($_GET, $_POST, [], $_COOKIE, $_FILES, $_SERVER);
        $this->service = $service;
    }
}
