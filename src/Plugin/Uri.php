<?php
/**
 *
 */

namespace Valar\Plugin;

use Mvc5\Http\Headers;
use Mvc5\Plugin\ScopedCall;
use Mvc5\Plugin\Shared;
use Valar\Http\Uri as HttpUri;

use function rawurldecode;
use function urldecode;
use function Laminas\Diactoros\marshalUriFromSapi;

use const Mvc5\{ HEADERS, SERVER };

class Uri
    extends Shared
{
    /**
     * @param string $name
     */
    function __construct(string $name = 'uri')
    {
        parent::__construct($name, new ScopedCall($this));
    }

    /**
     * @param array $server
     * @param Headers $headers
     * @return HttpUri
     */
    static function uri(array $server, Headers $headers) : HttpUri
    {
        $uri = marshalUriFromSapi($server, $headers->all());

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
    function __invoke() : \Closure
    {
        return fn() => Uri::uri($this[SERVER], $this[HEADERS]);
    }
}
