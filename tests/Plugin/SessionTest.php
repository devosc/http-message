<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Session\PHPSession;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Session;
use Valar\ServerRequest;

class SessionTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = ['session' => new Session];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config, new App(['services' => ['session' => PHPSession::class]]));
        $config->scope($request);

        $this->assertInstanceOf(PHPSession::class, $request->session());
    }
}
