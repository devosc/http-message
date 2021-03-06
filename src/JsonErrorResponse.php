<?php
/**
 *
 */

namespace Valar;

use Mvc5\Http\Error;

final class JsonErrorResponse
    extends JsonResponse
{
    /**
     * @param Error $error
     * @throws \Throwable
     */
    function __construct(Error $error)
    {
        parent::__construct($error, $error->status());
    }
}
