<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Request as HttpRequest;
use Psr\Http\Message\RequestInterface;

class Request
    implements HttpRequest, RequestInterface
{
    /**
     *
     */
    use Config\Request;
}
