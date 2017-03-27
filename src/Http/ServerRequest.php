<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;
use Mvc5\Http\Headers\Config as HttpHeaders;
use Mvc5\Immutable as Attributes;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\PhpInputStream;
use Zend\Diactoros\ServerRequestFactory as Factory;

class ServerRequest
    extends Request
    implements ServerRequestInterface
{
    /**
     *
     */
    use Config\ServerRequest;

    /**
     * @param array $config
     */
    function __construct($config = [])
    {
        !isset($config[Arg::SERVER]) &&
            $config[Arg::SERVER] = Factory::normalizeServer($_SERVER);

        $server = $config[Arg::SERVER];

        !isset($config[Arg::ARGS]) && $config[Arg::ARGS] = $_GET;
        !isset($config[Arg::ATTRIBUTES]) && $config[Arg::ATTRIBUTES] = new Attributes;
        !isset($config[Arg::BODY]) && $config[Arg::BODY] = new PhpInputStream;
        !isset($config[Arg::COOKIES]) && $config[Arg::COOKIES] = $_COOKIE;
        !isset($config[Arg::DATA]) && $config[Arg::DATA] = $_POST;
        !isset($config[Arg::FILES]) && $config[Arg::FILES] = Factory::normalizeFiles($_FILES);
        !isset($config[Arg::HEADERS]) && $config[Arg::HEADERS] = new HttpHeaders(Factory::marshalHeaders($server));
        !isset($config[Arg::METHOD]) && $config[Arg::METHOD] = $server['REQUEST_METHOD'] ?? 'GET';
        !isset($config[Arg::URI]) && $config[Arg::URI] = new Uri((string) Factory::marshalUriFromServer($server, $config[Arg::HEADERS]));
        !isset($config[Arg::VERSION]) && $config[Arg::VERSION] = substr($server['SERVER_PROTOCOL'] ?? 'HTTP/1.1', strlen('HTTP/'));

        parent::__construct($config);
    }
}
