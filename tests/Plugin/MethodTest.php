<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Method;
use Valar\Plugin\ServerRequest;

class MethodTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['method' => new Method];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('GET', $request->getMethod());
    }
}
