<?php
/**
 *
 */

namespace Valar;

use Mvc5\Response\Config\Response as _Config;
use Mvc5\Response\Response as Mvc5Response;
use Psr\Http\Message\ResponseInterface;

class Response
    implements Mvc5Response, ResponseInterface
{
    /**
     *
     */
    use _Config;
    use Http\Config\Response;
}
