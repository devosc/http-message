<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Session\PHPSession;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Session;
use Valar\Plugin\ServerRequest;

class SessionTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['session' => new Session];

        $service = new App(['services' => ['session' => PHPSession::class]]);

        $request = $service(new ServerRequest($plugins));

        $this->assertInstanceOf(PHPSession::class, $request->session());
    }
}
