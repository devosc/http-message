<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Version;
use Valar\ServerRequest;

class VersionTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = [
            'server' => new Value(['SERVER_PROTOCOL' => 'HTTP/2.2']),
            'version' => new Version
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('2.2', $request->getProtocolVersion());
    }
}
