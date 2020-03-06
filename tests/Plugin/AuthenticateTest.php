<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\User\Model as User;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Authenticated;
use Valar\Plugin\ServerRequest;

class AuthenticateTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test_authenticated()
    {
        $plugins = [
            'authenticated' => new Authenticated,
            'user' => new User(['authenticated' => true])
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertTrue($request->authenticated());
    }

    /**
     * @throws \Throwable
     */
    function test_not_authenticated()
    {
        $plugins = [
            'authenticated' => new Authenticated,
            'user' => new User
        ];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertFalse($request->authenticated());
    }
}
