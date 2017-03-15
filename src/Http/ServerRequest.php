<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Config\Request as _Config;
use Mvc5\Http\Request as HttpRequest;
use Psr\Http\Message\ServerRequestInterface;

class ServerRequest
    implements HttpRequest, ServerRequestInterface
{
    /**
     *
     */
    use _Config;
    use Config\ServerRequest;
}
