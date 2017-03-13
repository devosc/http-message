<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Uri as HttpUri;
use Psr\Http\Message\UriInterface;

class Uri
    implements HttpUri, UriInterface
{
    /**
     *
     */
    use Config\Uri;
}
