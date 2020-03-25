<?php
/**
 *
 */

namespace Valar\Plugin;

use Closure;
use Mvc5\Http\HttpHeaders;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;

use function Laminas\Diactoros\ {
    marshalHeadersFromSapi,
    marshalUriFromSapi
};

use const Mvc5\{ HEADERS, HOST, SERVER };

class Headers
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = HEADERS)
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param array $server
     * @return HttpHeaders
     */
    static function headersFromServer(array $server) : HttpHeaders
    {
        $headers = marshalHeadersFromSapi($server);

        !isset($headers[HOST]) && ($host = static::hostAndPortFromServer($server)) &&
            $headers[HOST] = $host;

        return new HttpHeaders($headers);
    }

    /**
     * @param array $server
     * @return string
     */
    protected static function hostAndPortFromServer(array $server) : string
    {
        $uri = marshalUriFromSapi($server, []);
        return  $uri->getHost() . ($uri->getPort() ? ':' . $uri->getPort() : '');
    }

    /**
     * @return Closure
     */
    function __invoke() : Closure
    {
        return fn() => Headers::headersFromServer($this[SERVER]);
    }
}
