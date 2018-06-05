<?php
/**
 *
 */

namespace Valar\Test;

use PHPUnit\Framework\TestCase;
use Valar\JsonExceptionResponse;

class JsonExceptionResponseTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $response = new JsonExceptionResponse(new \Exception('Foobar'));

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(500, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertEquals('', $result->message);
    }

    /**
     *
     */
    function test_trace()
    {
        $response = new JsonExceptionResponse(new \Exception('Foobar'), true);

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(500, $response->getStatusCode());
        $this->assertEquals('Foobar', $result->message);
    }
}
