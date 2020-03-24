<?php
/**
 *
 */

namespace Valar\Http;

use Laminas\Diactoros\Stream;
use Mvc5\Http\HttpHeaders;
use Mvc5\Model;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use function is_array;

use const Mvc5\{ BODY, HEADERS, HOST, STATUS, URI };

class Request
    extends Model
    implements \Mvc5\Http\Request, RequestInterface
{
    /**
     *
     */
    use Config\Request;

    /**
     * @param array $config
     */
    function __construct($config = [])
    {
        !isset($config[BODY]) &&
            $config[BODY] = new Stream('php://temp', 'wb+');

        !isset($config[HEADERS]) &&
            $config[HEADERS] = new HttpHeaders;

        is_array($config[HEADERS]) &&
            $config[HEADERS] = new HttpHeaders($config[HEADERS]);

        isset($config[URI]) && !($config[URI] instanceof UriInterface) &&
            $config[URI] = new Uri($config[URI]);

        !isset($config[HEADERS][HOST]) && ($uri = $config[URI] ?? null) && ($host = $uri->getHost()) &&
            $config[HEADERS] = $config[HEADERS]->with(
                HOST, $host . ($uri->getPort() ? ':' . $uri->getPort() : '')
            );

        parent::__construct($config);
    }
}
