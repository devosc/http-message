<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\UserAgent;
use Valar\ServerRequest;

class UserAgentTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = [
            'server' => new Value(['HTTP_USER_AGENT' => 'foobar']),
            'user_agent' => new UserAgent
        ];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals('foobar', $request->userAgent());
    }
}
