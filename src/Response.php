<?php
/**
 *
 */

namespace Valar;

use Mvc5\Response\Config\HttpResponse;

class Response
    extends Http\Response
    implements \Mvc5\Response\Response
{
    /**
     *
     */
    use HttpResponse;
}
