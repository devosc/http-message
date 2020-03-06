<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Headers;
use Valar\Plugin\ServerRequest;

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

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals(['content-type' => ['application/json'], 'host' => ['phpdev']], $request->getHeaders());
    }
}
