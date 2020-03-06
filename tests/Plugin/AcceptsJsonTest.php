<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\AcceptsJson;
use Valar\Plugin\ServerRequest;

class AcceptsJsonTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test_accepts_json()
    {
        $plugins = [
            'headers' => new Value(['accept' => 'application/json']),
            'accepts_json' => new AcceptsJson
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertTrue($request->acceptsJson());
    }

    /**
     * @throws \Throwable
     */
    function test_does_not_accept_json()
    {
        $plugins = [
            'headers' => new Value(['accept' => '*/*']),
            'accepts_json' => new AcceptsJson
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertFalse($request->acceptsJson());
    }
}
