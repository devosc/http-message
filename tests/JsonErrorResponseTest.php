<?php
/**
 *
 */

namespace Valar\Test;

use Mvc5\Http\Error\NotFound;
use PHPUnit\Framework\TestCase;
use Valar\JsonErrorResponse;

class JsonErrorResponseTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $response = new JsonErrorResponse(new NotFound);

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertEquals('Not Found', $result->message);
        $this->assertEquals('The server can not find the requested resource.', $result->description);
    }
}
