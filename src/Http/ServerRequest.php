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
        $config[SERVER] ??= normalizeServer($_SERVER);

        $server = $config[SERVER];

        $config[HEADERS] ??= marshalHeadersFromSapi($server);

        is_array($config[HEADERS]) &&
            $config[HEADERS] = new HttpHeaders($config[HEADERS]);

        $config[URI] ??= new Uri(marshalUriFromSapi($server, $config[HEADERS]->all()));

        $config[COOKIES] ??= new HttpCookies(isset($config[HEADERS]['cookie']) ?
            parseCookieHeader($config[HEADERS]['cookie']) : $_COOKIE);

        is_array($config[COOKIES]) &&
            $config[COOKIES] = new HttpCookies($config[COOKIES]);

        $config[ARGS] ??= $_GET;
        $config[ATTRIBUTES] ??= [];
        $config[BODY] ??= new PhpInputStream;
        $config[DATA] ??= $_POST;
        $config[FILES] ??= normalizeUploadedFiles($_FILES);
        $config[METHOD] ??= $server['REQUEST_METHOD'] ?? 'GET';
        $config[VERSION] ??= substr($server['SERVER_PROTOCOL'] ?? 'HTTP/1.1', strlen('HTTP/'));

        parent::__construct($config);
    }
}
