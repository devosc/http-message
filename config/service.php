<?php
/**
 *
 */

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Plugin;
use Symfony\Component\HttpFoundation\ApacheRequest;
use Valar\Plugin\ServerRequest;
use Zend\Diactoros\Stream;

return [
    'http-foundation\request' => new Plugin(ApacheRequest::class, [new GlobalVar('_GET'), new GlobalVar('_POST'), [], [], [], new GlobalVar('_SERVER')]),
    'request' => new ServerRequest(include __DIR__ . '/request.php', new Plugin('http-foundation\request')),
    //'response' => [Valar\Response::class, new Plugin('stream', ['php://memory', 'wb+'])],
    'response' => Valar\Response::class,
    'response\json' => Valar\JsonResponse::class,
    'response\redirect' => Valar\RedirectResponse::class,
    'stream' => Stream::class
];
