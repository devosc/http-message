<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Method;
use Valar\ServerRequest;

class MethodTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['method' => new Method];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals('GET', $request->getMethod());
    }
}
