<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Headers;
use Valar\ServerRequest;

class HeadersTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'headers' => new Headers,
            'server' => new Value([
                'HTTP_CONTENT_TYPE' => 'application/json',
                'SCRIPT_NAME' => __FILE__,
                'SERVER_NAME' => 'phpdev'
            ])
        ];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['content-type' => ['application/json'], 'host' => ['phpdev']], $request->getHeaders());
    }
}
