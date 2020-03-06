<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Value;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\UserAgent;
use Valar\Plugin\ServerRequest;

class UserAgentTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = [
            'server' => new Value(['HTTP_USER_AGENT' => 'foobar']),
            'user_agent' => new UserAgent
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals('foobar', $request->userAgent());
    }
}
