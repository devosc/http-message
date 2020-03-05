<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Model;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\User;
use Valar\ServerRequest;

class UserTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['user' => new User];

        $config = new App(['services' => $plugins], null, true, true);

        $app = new App(['services' => $plugins], null, true, true);
        $service = new App(['services' => ['user' => new Model]]);

        $request = ($service)(new Scope($app, ServerRequest::class));

        $this->assertInstanceOf(Model::class, $request->user());
    }
}
