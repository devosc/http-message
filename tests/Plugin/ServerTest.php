<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Server;
use Valar\ServerRequest;

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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals('bar', $request->getServerParams()['foo']);
    }
}
