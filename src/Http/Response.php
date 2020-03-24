<?php
/**
 *
 */

namespace Valar\Http;

use Laminas\Diactoros\Stream;
use Mvc5\Http\HttpHeaders;
use Mvc5\Model;
use Psr\Http\Message\ResponseInterface;

use function is_array;

use const Mvc5\{ BODY, HEADERS };

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
        $config[BODY] ??= new Stream('php://memory', 'wb+');

        $config[HEADERS] ??= new HttpHeaders;
        is_array($config[HEADERS]) &&
            $config[HEADERS] = new HttpHeaders($config[HEADERS]);

        parent::__construct($config);
    }
}
