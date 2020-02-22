<?php
/**
 *
 */

namespace Valar\Http;

use Laminas\Diactoros\Stream;
use Mvc5\Arg;
use Mvc5\Http\HttpHeaders;
use Mvc5\Model;
use Psr\Http\Message\ResponseInterface;

use function is_array;

class Response
    extends Model
    implements \Mvc5\Http\Response, ResponseInterface
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

        parent::__construct($config);
    }
}
