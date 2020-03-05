<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Version;
use Valar\ServerRequest;

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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals('2.2', $request->getProtocolVersion());
    }
}
