<?php
/**
 *
 */

namespace Valar\Test\Stream;

use PHPUnit\Framework\TestCase;
use Valar\Stream\JsonStream;

class JsonStreamTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $stream = new JsonStream(['foo' => 'bar']);

        $result = json_decode((string) $stream);

        $this->assertEquals('bar', $result->foo);
    }
}
