<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Request as HttpRequest;
use Psr\Http\Message\ServerRequestInterface;

class ServerRequest
    implements HttpRequest, ServerRequestInterface
{
    /**
     *
     */
    use Config\ServerRequest;
}
