<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Http\Headers\Config as HttpHeaders;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\ServerRequestFactory as Factory;

class Headers
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'headers')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            /** @var \Valar\ServerRequest $this */
            $headers = Factory::marshalHeaders($this[Arg::SERVER]);

            !isset($headers[Arg::HOST]) && ($uri = $this[Arg::URI]) && ($host = $uri->getHost()) &&
                $headers[Arg::HOST] = [$host . (($port = $uri->getPort()) ? ':' . $port : '')];

            return new HttpHeaders($headers);
        };
    }
}
