<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Version;
use Valar\Plugin\ServerRequest;

class VersionTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'server' => new Value(['SERVER_PROTOCOL' => 'HTTP/2.2']),
            'version' => new Version
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('2.2', $request->getProtocolVersion());
    }
}
