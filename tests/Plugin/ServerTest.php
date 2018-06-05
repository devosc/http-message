<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
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

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('bar', $request->getServerParams()['foo']);
    }
}
