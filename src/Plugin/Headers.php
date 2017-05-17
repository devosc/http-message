<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Http\HttpHeaders;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Zend\Diactoros\ServerRequestFactory;

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
     * @param $server
     * @param $headers
     * @return string
     */
    protected static function hostAndPortFromServer($server, $headers)
    {
        $accumulator = (object) ['host' => '', 'port' => null];

        ServerRequestFactory::marshalHostAndPortFromHeaders($accumulator, $server, $headers);

        return $accumulator->host ? $accumulator->host . ($accumulator->port ? ':' . $accumulator->port : '')  : '';
    }

    /**
     * @param array $server
     * @return HttpHeaders
     */
    static function headersFromServer(array $server)
    {
        $headers = ServerRequestFactory::marshalHeaders($server);

        !isset($headers[Arg::HOST]) && ($host = static::hostAndPortFromServer($server, $headers)) &&
            $headers[Arg::HOST] = $host;

        return new HttpHeaders($headers);
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            return Headers::headersFromServer($this[Arg::SERVER]);
        };
    }
}
