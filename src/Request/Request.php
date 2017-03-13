<?php
/**
 *
 */

namespace Valar\Request;

use Mvc5\Request\Request as Mvc5Request;
use Psr\Http\Message\RequestInterface as PsrRequest;

interface Request
    extends Mvc5Request, PsrRequest
{
}
