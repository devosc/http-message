<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Uri as HttpUri;
use Psr\Http\Message\UriInterface as PsrInterface;

interface Uri
    extends HttpUri, PsrInterface
{
}
