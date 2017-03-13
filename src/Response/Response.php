<?php
/**
 *
 */

namespace Valar\Response;

use Mvc5\Response\Response as Mvc5Response;
use Psr\Http\Message\ResponseInterface;

interface Response
    extends Mvc5Response, ResponseInterface
{
}
