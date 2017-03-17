<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Response as HttpResponse;
use Psr\Http\Message\ResponseInterface;

class Response
    implements HttpResponse, ResponseInterface
{
    /**
     *
     */
    use Config\Response;
}
