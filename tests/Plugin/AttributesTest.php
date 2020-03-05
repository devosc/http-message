<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use Mvc5\Plugin\Scope;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Attributes;
use Valar\ServerRequest;

class AttributesTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['attributes' => new Attributes];

        $app = new App(['services' => $plugins], null, true, true);

        $request = (new App)(new Scope($app, ServerRequest::class));

        $this->assertEquals([], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bar');

        $this->assertEquals(['foo' => 'bar'], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bat');

        $this->assertEquals('bat', $request->getAttribute('foo'));

        $request = $request->withoutAttribute('foo');

        $this->assertEquals([], $request->getAttributes());
    }
}
