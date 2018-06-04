<?php
/**
 *
 */

use Mvc5\Plugin\Param;
use Valar\Plugin\ServerRequest;

return [
    //'request' => Valar\Http\ServerRequest::class,
    'request' => new ServerRequest(include __DIR__ . '/request.php'),

    //'response' => Valar\Http\Response::class,
    'response' => Valar\Response::class,

    //'response\json' => Valar\Http\JsonResponse::class,
    'response\json' => Valar\JsonResponse::class,

    //'response\json\error'  => Valar\Http\JsonErrorResponse::class,
    'response\json\error'  => Valar\JsonErrorResponse::class,

    //'response\json\exception' => [Valar\Http\JsonExceptionResponse::class, 'trace' => new Param('debug')],
    'response\json\exception' => [Valar\JsonExceptionResponse::class, 'trace' => new Param('debug')],

    //'response\redirect' => Valar\Http\RedirectResponse::class,
    'response\redirect' => Valar\RedirectResponse::class,
];
