<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Server;
use Valar\Plugin\ServerRequest;

class ServerTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $GLOBALS['_SERVER']['foo'] = 'bar';

        $plugins = ['server' => new Server];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('bar', $request->getServerParams()['foo']);
    }
}
