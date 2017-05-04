<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Http\Uri as HttpUri;
use Mvc5\Model;
use Psr\Http\Message\UriInterface;

class Uri
    extends Model
    implements HttpUri, UriInterface
{
    /**
     *
     */
    use Config\Uri;
}
