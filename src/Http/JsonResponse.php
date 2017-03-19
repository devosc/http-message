<?php
/**
 *
 */

namespace Valar\Http;

use Mvc5\Arg;

class JsonResponse
    extends Response
{
    /**
     * @param array $data
     * @param int $status
     * @param array $headers
     */
    function __construct($data, $status = 200, array $headers = [])
    {
        parent::__construct([
            Arg::BODY => new JsonStream($data),
            Arg::STATUS => $status,
            Arg::HEADERS => $headers + ['Content-Type' => 'application/json']
        ]);
    }
}
