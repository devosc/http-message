<?php
/**
 *
 */

use Mvc5\Plugin\Args;
use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Plugin;
use Symfony\Component\HttpFoundation\ApacheRequest;
use Valar\Plugin\ServerRequest;
use Zend\Diactoros\Stream;

return [
    'http\request' => [Valar\Http\Request::class, new Args([
        'body'    => new Stream('php://temp', 'wb+'),
        'headers' => new Mvc5\Http\Headers\Config,
        'method'  => 'POST',
        //'target'  => '/foo?bar=baz',
        'uri'     => new Plugin('http\uri', [[
            'host' => 'localhost',
            'path' => '/foo',
            'port' => '8080',
            'query' => 'bar=baz'
        ]]),
        'version' => '1.1'
    ])],
    'http\uri' => Valar\Http\Uri::class,
    'http-foundation\request' => new Plugin(
        ApacheRequest::class, [new GlobalVar('_GET'), new GlobalVar('_POST'), [], [], [], new GlobalVar('_SERVER')]
    ),
    'request' => new ServerRequest(include __DIR__ . '/request.php', new Plugin('http-foundation\request')),
    'response' => Valar\Response::class,
    //'response' => [Valar\Response::class, new Plugin(Stream::class, ['php://memory', 'wb+'])],
    'response\json' => Valar\JsonResponse::class,
    //'response\json' => Valar\Http\JsonResponse::class,
    'response\redirect' => Valar\RedirectResponse::class,
    //'response\redirect' => Valar\Http\RedirectResponse::class,
];
