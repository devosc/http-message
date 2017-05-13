<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Model;
use Psr\Http\Message\UriInterface;

class Uri
    extends Model
    implements \Mvc5\Http\Uri, UriInterface
{
    /**
     *
     */
    use Config\Uri;
}
