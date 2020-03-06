<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Args;
use Valar\Plugin\ServerRequest;

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

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals(['foo' => 'bar'], $request->args());
    }
}
