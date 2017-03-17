<?php
/**
 *
 */

namespace Valar\Plugin;

use Valar\Http\Headers as HttpHeaders;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

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
            $headers = $this->http->headers->all();

            if (!isset($headers['host']) && ($uri = $this['uri'] ?? null) && ($host = $uri['host'] ?? null)) {
                $headers['host'] = [$host . (isset($uri['port']) ? ':' . $uri['port'] : '')];
            }

            return new HttpHeaders($headers);
        };
    }
}
