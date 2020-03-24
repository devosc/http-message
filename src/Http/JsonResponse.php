<?php
/**
 *
 */

namespace Valar\Http;

use Valar\Stream\JsonStream;

use const Mvc5\ { BODY, STATUS, HEADERS };

class JsonResponse
    extends Response
{
    /**
     * @param $data
     * @param int $status
     * @param array $headers
     * @throws \Throwable
     */
    function __construct($data, $status = 200, array $headers = [])
    {
        parent::__construct([
            BODY => new JsonStream($data),
            STATUS => $status,
            HEADERS => $headers + ['content-type' => 'application/json']
        ]);
    }
}
