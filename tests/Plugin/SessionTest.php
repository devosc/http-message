<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use Mvc5\Session\PHPSession;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Session;
use Valar\ServerRequest;

class SessionTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['session' => new Session];

        $app = new App(['services' => $plugins], null, true, true);
        $service = new App(['services' => ['session' => PHPSession::class]]);

        $request = ($service)(new Scope($app, ServerRequest::class));

        $this->assertInstanceOf(PHPSession::class, $request->session());
    }
}
