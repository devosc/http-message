<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\ServerRequest;
use Valar\ServerRequest as Request;

class ServerRequestTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $app = new App(['services' => ['request' => new ServerRequest]]);

        $this->assertInstanceOf(Request::class, $app['request']);
    }

    /**
     * @throws \Throwable
     */
    function test_with_plugins()
    {
        $plugin = ServerRequest::with(['foo' => fn() => 'bar']);

        $app = new App(['services' => ['request' => $plugin]]);

        $this->assertEquals('bar', $app['request']['foo']);
    }
}
