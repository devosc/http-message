<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
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

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('GET', $request->getMethod());
    }
}
