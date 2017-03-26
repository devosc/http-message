<?php
/**
 *
 */

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Plugin;
use Symfony\Component\HttpFoundation\ApacheRequest;
use Valar\Plugin\ServerRequest;

return [
    'http-foundation\request' => new Plugin(
        ApacheRequest::class, [new GlobalVar('_GET'), new GlobalVar('_POST'), [], [], [], new GlobalVar('_SERVER')]
    ),
    'request' => new ServerRequest(include __DIR__ . '/request.php', new Plugin('http-foundation\request')),
    //'request' => Valar\Http\ServerRequest::class,
    'response' => Valar\Response::class,
    //'response' => Valar\Http\Response::class,
    'response\json' => Valar\JsonResponse::class,
    //'response\json' => Valar\Http\JsonResponse::class,
    'response\redirect' => Valar\RedirectResponse::class,
    //'response\redirect' => Valar\Http\RedirectResponse::class,
];
