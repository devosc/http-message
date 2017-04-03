<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Arg;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Valar\Http\Uri as HttpUri;
use Zend\Diactoros\ServerRequestFactory as Factory;

class Uri
    extends Shared
{
    /**
     * @param $name
     */
    function __construct($name = 'uri')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param array $server
     * @param array $headers
     * @return HttpUri
     */
    static function uri($server, $headers)
    {
        $uri = Factory::marshalUriFromServer($server, $headers);

        return new HttpUri([
            'scheme' => $uri->getScheme(),
            'host'   => $uri->getHost(),
            'port'   => $uri->getPort(),
            'user'   => $headers['PHP_AUTH_USER'] ?? null,
            'pass'   => $headers['PHP_AUTH_PW'] ?? null,
            'path'   => rawurldecode($uri->getPath()),
            'query'  => urldecode($uri->getQuery()),
        ]);
    }

    /**
     * @return \Closure
     */
    function __invoke()
    {
        return function() {
            return Uri::uri($this[Arg::SERVER], \iterator_to_array($this[Arg::HEADERS]));
        };
    }
}
