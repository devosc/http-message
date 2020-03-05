<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Args;
use Valar\ServerRequest;

class ArgsTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $GLOBALS['_GET'] = ['foo' => 'bar'];

        $plugins = ['args' => new Args];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals(['foo' => 'bar'], $request->args());
    }
}
