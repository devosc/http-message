<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;
use Mvc5\Http\Headers\Config as HttpHeaders;
use Mvc5\Http\Request as HttpRequest;
use Mvc5\Model;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Stream;

class Request
    extends Model
    implements HttpRequest, RequestInterface
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
        !isset($config[Arg::BODY]) &&
            $config[Arg::BODY] = new Stream('php://temp', 'wb+');

        !isset($config[Arg::HEADERS]) &&
            $config[Arg::HEADERS] = new HttpHeaders;

        is_array($config[Arg::HEADERS]) &&
            $config[Arg::HEADERS] = new HttpHeaders($config[Arg::HEADERS]);

        isset($config[Arg::URI]) && !($config[Arg::URI] instanceof UriInterface) &&
            $config[Arg::URI] = new Uri($config[Arg::URI]);

        !isset($config[Arg::HEADERS][Arg::HOST]) && ($uri = $config[Arg::URI] ?? null) && ($host = $uri->getHost()) &&
            $config[Arg::HEADERS] = $config[Arg::HEADERS]->with(
                Arg::HOST, [$host . ($uri->getPort() ? ':' . $uri->getPort() : '')]
            );

        parent::__construct($config);
    }
}
