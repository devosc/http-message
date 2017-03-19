<?php
/**
 *
 */

namespace Valar;

use Valar\Stream\JsonStream;

class JsonResponse
    extends Response
{
    /**
     * @param $data
     * @param int $status
     * @param array $headers
     */
    function __construct($data, $status = 200, array $headers = [])
    {
        parent::__construct(JsonStream::encode($data), $status, $headers + ['Content-Type' => 'application/json']);
    }
}
