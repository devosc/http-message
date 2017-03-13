<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Config\Response as _Config;
use Mvc5\Http\Response as HttpResponse;
use Psr\Http\Message\ResponseInterface;

class Response
    implements HttpResponse, ResponseInterface
{
    /**
     *
     */
    use _Config;
    use Config\Response;
}
