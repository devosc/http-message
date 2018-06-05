<?php
/**
 *
 */

namespace Valar\Test\Http;

use PHPUnit\Framework\TestCase;
use Valar\Http\JsonResponse;

class JsonResponseTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $response = new JsonResponse(['foo' => 'bar']);

        $result = json_decode((string) $response->getBody());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertEquals('bar', $result->foo);
    }
}
