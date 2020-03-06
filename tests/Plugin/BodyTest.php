<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Valar\Plugin\Body;
use Valar\Plugin\ServerRequest;

class BodyTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['body' => new Body];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertInstanceOf(StreamInterface::class, $request->getBody());
    }
}
