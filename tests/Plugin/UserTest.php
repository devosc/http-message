<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Model;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\User;
use Valar\ServerRequest;

class UserTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = ['user' => new User];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config, new App(['services' => ['user' => new Model]]));
        $config->scope($request);

        $this->assertInstanceOf(Model::class, $request->user());
    }
}
