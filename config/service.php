<?php
/**
 *
 */

use Mvc5\Plugin\GlobalVar;
use Mvc5\Plugin\Plugin;
use Valar\Plugin\ServerRequest;

return [
    'request' => new ServerRequest(include __DIR__ . '/request.php'),
    //'request' => Valar\Http\ServerRequest::class,
    'response' => Valar\Response::class,
    //'response' => Valar\Http\Response::class,
    'response\json' => Valar\JsonResponse::class,
    //'response\json' => Valar\Http\JsonResponse::class,
    'response\redirect' => Valar\RedirectResponse::class,
    //'response\redirect' => Valar\Http\RedirectResponse::class,
];
