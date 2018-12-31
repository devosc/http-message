<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\User\Model as User;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Authenticated;
use Valar\ServerRequest;

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

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

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

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertFalse($request->authenticated());
    }
}
