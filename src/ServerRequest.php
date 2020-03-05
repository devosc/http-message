<?php
/**
 *
 */

namespace Valar;

use Mvc5\Service\Service;
use Mvc5\Request\Request;

class ServerRequest
    extends Http\ServerRequest
    implements Request
{
    /**
     *
     */
    use \Mvc5\Request\Config\Request;

    /**
     * @var Service|null
     */
    protected ?Service $service;

    /**
     * @param array|\ArrayAccess $config
     * @param Service|null $service
     */
    function __construct($config = [], Service $service = null)
    {
        parent::__construct($config);
        $this->service = $service;
    }
}
