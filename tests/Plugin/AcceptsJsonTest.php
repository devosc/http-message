<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\AcceptsJson;
use Valar\ServerRequest;

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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

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

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertFalse($request->acceptsJson());
    }
}
