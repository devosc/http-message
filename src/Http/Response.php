<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;
use Mvc5\Http\Headers\Config as HttpHeaders;
use Mvc5\Http\Response as HttpResponse;
use Mvc5\Model;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Stream;

class Response
    extends Model
    implements HttpResponse, ResponseInterface
{
    /**
     *
     */
    use Config\Response;

    /**
     * @param array $config
     */
    function __construct($config = [])
    {
        !isset($config[Arg::BODY]) &&
            $config[Arg::BODY] = new Stream('php://memory', 'wb+');

        !isset($config[Arg::HEADERS]) &&
            $config[Arg::HEADERS] = new HttpHeaders;

        is_array($config[Arg::HEADERS]) &&
            $config[Arg::HEADERS] = new HttpHeaders($config[Arg::HEADERS]);

        $this->config = $config;
    }
}
