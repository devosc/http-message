<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\AcceptsJson;
use Valar\ServerRequest;

class AcceptsJsonTest
    extends TestCase
{
    /**
     *
     */
    function test_accepts_json()
    {
        $plugins = [
            'headers' => new Value(['accept' => 'application/json']),
            'accepts_json' => new AcceptsJson
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertTrue($request->acceptsJson());
    }

    /**
     *
     */
    function test_does_not_accept_json()
    {
        $plugins = [
            'headers' => new Value(['accept' => '*/*']),
            'accepts_json' => new AcceptsJson
        ];

        $config = new App(['services' => $plugins]);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertFalse($request->acceptsJson());
    }
}
