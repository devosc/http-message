<?php
/**
 *
 */

namespace Valar\Test;

use Valar\ServerRequest;
use Psr\Http\Message\StreamInterface;
use PHPUnit\Framework\TestCase;

class ServerRequestTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $this->assertInstanceOf(StreamInterface::class, (new ServerRequest)->getBody());
    }
}
