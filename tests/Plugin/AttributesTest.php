<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Attributes;
use Valar\Plugin\ServerRequest;

class AttributesTest
    extends TestCase
{
    /**
     * @throws \Throwable
     */
    function test()
    {
        $plugins = ['attributes' => new Attributes];

        $request = (new App)(new ServerRequest($plugins));

        $this->assertEquals([], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bar');

        $this->assertEquals(['foo' => 'bar'], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bat');

        $this->assertEquals('bat', $request->getAttribute('foo'));

        $request = $request->withoutAttribute('foo');

        $this->assertEquals([], $request->getAttributes());
    }
}
