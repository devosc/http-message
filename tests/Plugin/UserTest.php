<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Model;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\User;
use Valar\Plugin\ServerRequest;

class UserTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['user' => new User];

        $service = new App(['services' => ['user' => new Model]]);

        $request = $service(new ServerRequest($plugins));

        $this->assertInstanceOf(Model::class, $request->user());
    }
}
