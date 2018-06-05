<?php
/**
 *
 */

namespace Valar\Test;

use Mvc5\App;
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
        $request = new ServerRequest(null, new App);

        $this->assertInstanceOf(StreamInterface::class, $request->getBody());
    }
}
