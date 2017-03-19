<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;
use Mvc5\Http\Headers\Config as HttpHeaders;
use Mvc5\Http\Request as HttpRequest;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\Stream;

class Request
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

        !isset($config[Arg::HEADERS][Arg::HOST]) &&
            ($uri = $config[Arg::URI] ?? null) && ($host = $uri->getHost()) &&
                $config[Arg::HEADERS][Arg::HOST] = [$host . (($port = $uri->getPort()) ? ':' . $port : '')];

        $this->config = $config;
    }
}
