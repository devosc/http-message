<?php
/**
 *
 */

namespace Valar;

use Mvc5\Http\Error;

class JsonErrorResponse
    extends JsonResponse
{
    /**
     * @param Error $error
     */
    function __construct(Error $error)
    {
        parent::__construct($error, $error->status());
    }
}
