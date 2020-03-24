<?php
/**
 *
 */

namespace Valar\Http;

use Laminas\Diactoros\PhpInputStream;
use Mvc5\Cookie\HttpCookies;
use Mvc5\Http\HttpHeaders;
use Psr\Http\Message\ServerRequestInterface;

use function is_array;
use function strlen;
use function substr;
use function Laminas\Diactoros\ {
    marshalHeadersFromSapi,
    marshalUriFromSapi,
    normalizeServer,
    normalizeUploadedFiles,
    parseCookieHeader
};

use const Mvc5\{ ARGS, ATTRIBUTES, BODY, DATA, FILES, COOKIES, HEADERS, METHOD, SERVER, URI, VERSION };

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
        !isset($config[SERVER]) &&
            $config[SERVER] = normalizeServer($_SERVER);

        $server = $config[SERVER];

        !isset($config[HEADERS]) &&
            $config[HEADERS] = marshalHeadersFromSapi($server);

        is_array($config[HEADERS]) &&
            $config[HEADERS] = new HttpHeaders($config[HEADERS]);

        !isset($config[URI]) &&
            $config[URI] = new Uri(marshalUriFromSapi($server, $config[HEADERS]->all()));

        !isset($config[COOKIES]) &&
            $config[COOKIES] = new HttpCookies(isset($config[HEADERS]['cookie']) ?
                parseCookieHeader($config[HEADERS]['cookie']) : $_COOKIE);

        is_array($config[COOKIES]) &&
            $config[COOKIES] = new HttpCookies($config[COOKIES]);

        !isset($config[ARGS]) && $config[ARGS] = $_GET;
        !isset($config[ATTRIBUTES]) && $config[ATTRIBUTES] = [];
        !isset($config[BODY]) && $config[BODY] = new PhpInputStream;
        !isset($config[DATA]) && $config[DATA] = $_POST;
        !isset($config[FILES]) && $config[FILES] = normalizeUploadedFiles($_FILES);
        !isset($config[METHOD]) && $config[METHOD] = $server['REQUEST_METHOD'] ?? 'GET';
        !isset($config[VERSION]) && $config[VERSION] = substr($server['SERVER_PROTOCOL'] ?? 'HTTP/1.1', strlen('HTTP/'));

        parent::__construct($config);
    }
}
