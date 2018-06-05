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
     *
     */
    function test()
    {
        $app = new App(['services' => ['request' => new ServerRequest]], null, true);

        $this->assertInstanceOf(Request::class, $app['request']);
    }
}
