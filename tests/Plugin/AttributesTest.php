<?php
/**
 *
 */

namespace Valar\Test\Plugin;

use Mvc5\App;
use PHPUnit\Framework\TestCase;
use Valar\Plugin\Attributes;
use Valar\ServerRequest;

class AttributesTest
    extends TestCase
{
    /**
     *
     */
    function test()
    {
        $plugins = ['attributes' => new Attributes];

        $config = new App(['services' => $plugins], null, true, true);

        $request = new ServerRequest($config);
        $config->scope($request);

        $this->assertEquals([], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bar');

        $this->assertEquals(['foo' => 'bar'], $request->getAttributes());

        $request = $request->withAttribute('foo', 'bat');

        $this->assertEquals('bat', $request->getAttribute('foo'));

        $request = $request->withoutAttribute('foo');

        $this->assertEquals([], $request->getAttributes());
    }
}
